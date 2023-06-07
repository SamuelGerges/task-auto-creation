@extends('auth.layouts.auth')
@section('content')
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1></h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ route('auth.login') }}" method="post">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                @include('layouts.includes.partials._errors')
                @if($error = session()->get('error'))
                    <div class="alert alert-danger">
                        <p class="mb-0">{{ $error }}</p>
                    </div>
                @endif
                <div class="form-group">
                    <input class="form-control" type="text" name="user_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">SIGN UP</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
                <br>
                <div class="form-group btn-container">
                    <a class="btn btn-info btn-block" href="{{route('auth.getRegister')}}"><i class="fa fa-user-plus fa-lg fa-fw"></i>SIGN UP</a>
                </div>
            </form>
        </div>
    </section>
@endsection
