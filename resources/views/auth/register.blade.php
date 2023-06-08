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
            <form class="login-form" action="{{ route('auth.register') }}" method="post">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                @include('layouts.includes.partials._messages')

                <div class="form-group">
                    <input class="form-control" type="text" name="user_name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="user_email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="user_phone" placeholder="Mobile" autofocus required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-save fa-lg fa-fw"></i>Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
