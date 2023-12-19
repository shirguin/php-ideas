<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Mail\Mailables\Content;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy("created_at", "DESC");

        if (request()->has("search")) {
            //Поиск в БД всех записей содержащих строку поиска в контенте
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%', '');
        }

        return view("dashboard", [
            'ideas' => $ideas->paginate(5)
        ]);

        //return view("dashboard");
    }
}
