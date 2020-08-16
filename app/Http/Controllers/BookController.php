<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Book;
use App\User;
use Auth;

class BookController extends Controller
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

    public function addPage()
    {
        return view('add');
    }

    public function addBook()
    {
        $book = new Book();

        $book->title = request('title');
        $book->author = request('author');
        $book->user_id = Auth::id();

        if ($book->save()){
            return redirect('/add')->with('message', '1');
        }
        else {
            return redirect('/add')->with('message', '0');
        }

    }

    public function take()
    {

        $userBook = Auth::user()->taken_book_id;

        if (NULL == $userBook){
            return view('take');
        } else {
            return redirect('/return');
        }

    }

    public function searchBook()
    {
        if ("1" == request('type')){

            $books = Book::where('title', 'like', '%' . request('text') . '%')->get();

            return view('take', ['books' => $books]);

        }
        elseif ("0" == request('type')){

            $books = Book::where('author', 'like', '%' . request('text') . '%')->get();

            return view('take', ['books' => $books]);

        }

    }

    public function takeBook()
    {

        $userBook = Auth::user()->taken_book_id;

        if (NULL == $userBook){
            
            $user = User::find(Auth::id());

            $user->fill([
                'taken_book_id' => request('id')
            ]);
    
            $user->save();

        }

        return redirect('/home');

    }

    public function return()
    {

        $userBook = Auth::user()->taken_book_id;

        if (NULL == $userBook){

            return view('return', ['book' => null]);

        } else {

            $book = Book::where('id', $userBook)->get();

            return view('return', ['book' => $book]);

        }

    }

    public function returnBook()
    {

        $userBook = Auth::user()->taken_book_id;

        if (request('id') == $userBook){
            
            $user = User::find(Auth::id());

            $user->fill([
                'taken_book_id' => NULL
            ]);

            $user->save();

        } 

        return redirect('/return');

    }

}
