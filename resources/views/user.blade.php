@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ __('User settings') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('saveUser') }}">
                        @csrf
                        
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus value="{{ $name }}">
                            </div>
                            
                        </div>

                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus value="{{ $email }}">
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <br>

            @if (null != $books)

            <div class="card">
                <div class="card-header">{{ __('Your books') }}</div>

                <div class="card-body">

                    @foreach($books as $book)
                    <div class="row">
                        
                        <div class="col-md-6">
                            <span>{{ __('Title: ') }}{{$book->title}}</span>
                        </div>

                        <div class="col-md-6">
                            <span>{{ __('Author: ') }}{{$book->author}}</span>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            @endif

        </div>
    </div>
</div>
@endsection
