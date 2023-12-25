<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $followingIds = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingIds)->orderBy("created_at", "DESC");

        if (request()->has("search")) {
            //Поиск в БД всех записей содержащих строку поиска в контенте
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%', '');
        }

        return view("dashboard", [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
