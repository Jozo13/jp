@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add book to the list') }}</div>

                <div class="card-body">
                    @if ("1" == session()->get('message'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert alert-success" role="alert">
                                {{ __('Book added') }}
                            </div>  
                        </div>
                    </div>
                    @elseif ("0" == session()->get('message'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert alert-danger" role="alert">
                                {{ __('Error - failed to add book') }}
                            </div>  
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('addBook') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" required autofocus>
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" required autofocus>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
