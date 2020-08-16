<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use App\User;

class UserController extends Controller
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

    public function user()
    {

        $name = Auth::user()->name;
        $email = Auth::user()->email;

        $user_id = Auth::user()->id;
        $books = Book::where('user_id', $user_id)->get();

        if ($books->isEmpty()){
            $books = null;
        } 

        return view('user', ['books' => $books, 'name' => $name, 'email' => $email]);
    }

    public function saveUser()
    {

        $user = User::find(Auth::id());

        $user->fill([
            'name' => request('name'),
            'email' => request('email')
        ]);

        $user->save();

        return redirect('/user');

    }

}
