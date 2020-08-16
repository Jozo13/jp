@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Return book') }}</div>

                <div class="card-body">

                @if ("1" == session()->get('message'))

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert alert-success" role="alert">
                            {{ __('Book returned') }}
                        </div>  
                    </div>
                </div>

                @elseif ("0" == session()->get('message'))

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert alert-danger" role="alert">
                            {{ __('Error - failed to return book') }}
                        </div>  
                    </div>
                </div>

                @endif

                @if (null == $book)
                        <span>{{ __('You do not have a book') }}</span>
                @else

                <form method="POST" action="{{ route('returnBook') }}">
                    @csrf
                    
                    <div class="form-group row mb-0">
                    
                        <div class="col-md-4">
                            <span>{{ __('Title: ') }}{{$book[0]->title}}</span>
                        </div>

                        <div class="col-md-4">
                            <span>{{ __('Author: ') }}{{$book[0]->author}}</span>
                        </div>

                        <input id="id" type="text" class="form-control d-none" name="id" value="{{$book[0]->id}}">

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Return') }}
                            </button>
                        </div>

                    </div>
                </form>

                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
