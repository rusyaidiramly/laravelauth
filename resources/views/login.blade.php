@extends('layout.master')
@section('headDependencies')
<link rel="stylesheet" href="/css/login.css">
@endsection
@section('title','Welcome')
@section('content')
<div class="container-login">
    <div class="logo">
        <img class="logo-img" src="/img/logo.svg" alt="e-corp logo">
        <h1 class="motto">We don't make solution,<br>We make solution better.</h1>
    </div>
    <div class="card-login">
        <form action="/login" method="post">
            @csrf
            <div class="form-element">
                <p class="form-title">LOGIN</p>
            </div>
            <div class="form-element">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-element checkbox">
                <input type="checkbox" name="show-password" id="show-password">Show password
            </div>
            <div class="form-element action">
                <input type="submit" name="submit" value="Login">
                <a href="">Forgot password?</a>
            </div>
            <div class="form-element action">
                <input type="button" name="sign-up" id="sign-up" value="Sign Up"
                    onclick="window.location.href='/register'">
            </div>
        </form>
    </div>
</div>
@endsection
