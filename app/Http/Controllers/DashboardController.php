<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Mail\Mailables\Content;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard", [
            'ideas' => Idea::orderBy('created_at', 'DESC')->paginate(5)
        ]);

        //return view("dashboard");
    }
}
