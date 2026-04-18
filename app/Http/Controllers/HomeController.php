<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'bookCount' => Book::count(),
            'memberCount' => User::query()->where('role', 'member')->count(),
            'latestBooks' => Book::query()->latest()->take(6)->get(),
        ]);
    }

    public function dashboard(): View
    {
        return view('dashboard', [
            'bookCount' => Book::count(),
            'memberCount' => User::query()->where('role', 'member')->count(),
            'books' => Book::query()->latest()->take(5)->get(),
        ]);
    }
}
