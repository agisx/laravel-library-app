<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    //
    public function index(): View {
        return view('books.index', ['books' => Book::all()]);
    }
}
