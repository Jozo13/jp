@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Take book from the list') }}</div>

                <div class="card-body">
                    @if ("1" == session()->get('message'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert alert-success" role="alert">
                                {{ __('Book taken') }}
                            </div>  
                        </div>
                    </div>
                    @elseif ("0" == session()->get('message'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert alert-danger" role="alert">
                                {{ __('Error - failed to take book') }}
                            </div>  
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('searchBook') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Search by') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="title" name="type" value="1" checked>
                                <label for="title">Title</label><br>
                                <input type="radio" id="author" name="type" value="0">
                                <label for="author">Author</label><br>
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" required autofocus>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <br>

            @if (isset($books))

            <div class="card">
                <div class="card-header">{{ __('Search results') }}</div>
                <div class="card-body">
                    
                    @if ($books->isEmpty())
                        <span>{{ __('No book found') }}</span>
                    @else

                        @foreach($books as $key => $book)
                        <form method="POST" action="{{ route('takeBook') }}">
                            @csrf
                            
                            <div class="form-group row">
                            
                                <div class="col-md-4">
                                    <span>{{ __('Title: ') }}{{$book->title}}</span>
                                </div>

                                <div class="col-md-4">
                                    <span>{{ __('Author: ') }}{{$book->author}}</span>
                                </div>

                                <input id="id" type="text" class="form-control d-none" name="id" value="{{$book->id}}">

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Take') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                        @endforeach

                    @endif
                   
                </div>
            </div>

            @endif

        </div>
    </div>
</div>
@endsection
