<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Mail\Mailables\Content;

class DashboardController extends Controller
{
    public function index()
    {
         $idea = new Idea([
             "content" => "hellow ideas",
         ]);

         $idea->save();

        return view("dashboard", ['ideas' => Idea::orderBy('created_at', 'DESC')->get()
    ]);

        //return view("dashboard");
    }
}
