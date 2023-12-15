<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Mail\Mailables\Content;

class DashboardController extends Controller
{
    public function index()
    {
        // $idea = new Idea([
        //     "content" => "test",
        // ]);

        // $idea->save();
        //Остановился здесь
        dump(Idea::all());
        return view("dashboard", ['ideas' => Idea::all()]);
    }
}
