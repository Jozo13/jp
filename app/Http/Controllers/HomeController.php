<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userBook = Auth::user()->taken_book_id;
        $book = Book::where('id', $userBook)->get();

        if ($book->isEmpty()){
            return view('home', ['book' => null]);
        } else {
            return view('home', ['book' => $book]);
        }
    }
}
