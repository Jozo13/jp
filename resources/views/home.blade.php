@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ __('Welcome to Booking Knjiga') }}</div>

                <div class="card-body">

                    {{ __('With this application you can offer your books to other people to read and take books other have offered.') }}

                </div>
            </div>

            <br>

            @if (null != $book)

            <div class="card">
                <div class="card-header">{{ __('You are currently reading') }}</div>

                <div class="card-body">

                    <div class="row mb-0">
                        
                        <div class="col-md-6">
                            <span>{{ __('Title: ') }}{{$book[0]->title}}</span>
                        </div>

                        <div class="col-md-6">
                            <span>{{ __('Author: ') }}{{$book[0]->author}}</span>
                        </div>

                    </div>

                </div>
            </div>

            @endif

        </div>
    </div>
</div>
@endsection
