@extends('layouts.master')

@section('content')
<div class="card_container">
    <div class="card box">
    @if (Route::is('login'))
        <h1 class="title card__title">Login</h1>
        <form class="form" action="/login" method="POST">
    @endif
    @if (Route::is('register'))
        <h1 class="title card__title">Register</h1>
        <form class="form" action="/register" method="POST">
    @endif
            @csrf
            {{-- @method('PUT') --}}
            @if (Route::is('register'))
            <div class="field form__item">
                <label class="label" for="name">Name</label>
                <div class="control has-icons-left">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input class="input" type="text" id="name" name="name">
                </div>
            </div>
            @endif

            <div class="field form__item">
                <label class="label" for="email">Email Address</label>
                <div class="control has-icons-left">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input class="input" type="email" id="email" name="email">
                </div>
            </div>

            <div class="field form__item">
                <label class="label" for="password">Password</label>
                <div class="control has-icons-left">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input class="input" type="password" id="password" name="password">
                </div>
            </div>


            <div class="form_buttons field is-grouped">
                <div class="control">
                    <button class="button is-link">
                        Submit
                    </button>
                </div>
                <div class="control">
                    <a href="/{{Route::is('login') ? 'register' : 'login'}}" class="button is-link is-light">
                        {{ Route::is('login') ? "Don't have an account?" : "Already have an account?" }}
                    </a>
                </div>
            </div>
        </form>

        @if(!$errors->isEmpty())
        <div class="errors notification is-danger">
            {{ $errors->first('email') }}
            {{ $errors->first('name') }}
            {{ $errors->first('password') }}
            {{ $errors->first('general') }}
        </div>
        @endif
    </div>
</div>
@endsection
