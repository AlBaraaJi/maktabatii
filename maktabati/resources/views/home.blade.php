@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      
                    {{ __('You are logged in!') }}
                    <form action="/index">
                    <button class="btn btn-success mb-3 mt-3" >BOOKS</button>
                    </form>
                    <form action="/create">
                    <button class="btn btn-primary" >CREATE BOOKS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
