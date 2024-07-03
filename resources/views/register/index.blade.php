@extends('layout.main')
@section('content')
    <div class="loginregis">

        <div class="login_form">
            <!-- Login form container -->
            <h3>Registration</h3>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="input_box">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Enter name" required />
                </div>
                <div class="input_box">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter name" required />
                </div>

                <div class="input_box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email address" required />
                </div>
                <div class="input_box">
                    <div class="password_title">
                        <label for="password">Password</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required />
                </div>
                <!-- Registration button -->
                <button type="submit">Register</button>
                <p class="sign_up">Have an account? <a href="{{ route('login.index') }}">Login</a></p>
            </form>
        </div>
    </div>
@endsection
