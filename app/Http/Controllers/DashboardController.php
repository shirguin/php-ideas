<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Mail\Mailables\Content;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        //return new WelcomeEmail(auth()->user()); //Способ просмотра электронного письма

        //$ideas = Idea::with('user', 'comments.user')->orderBy("created_at", "DESC"); //оптимизация запросов к базе данных

        //$ideas = Idea::withCount('likes')->orderBy("created_at", "DESC");//оптимизация запросов к базе данных

        $ideas = Idea::orderBy("created_at", "DESC");

        if (request()->has("search")) {
            //Поиск в БД всех записей содержащих строку поиска в контенте
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%', '');
        }

        return view("dashboard", [
            'ideas' => $ideas->paginate(5),
        ]);

        //return view("dashboard");
    }
}
