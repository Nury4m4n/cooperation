@extends('layout.main')
@section('content')
    @if (session()->has('loginError'))
        <div class="modal fade" id="success" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success text-bold text-center" id="successModalLabel">Success</h5>
                    </div>
                    <div class="modal-body text-success">
                        <p>{{ 'loginError' }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var successModal = new bootstrap.Modal(document.getElementById('success'), {
                    backdrop: 'static',
                    keyboard: false
                });
                successModal.show();
            });
        </script>
    @endif
    @if (session()->has('success'))
        <div class="modal fade" id="success" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success text-bold text-center" id="successModalLabel">Success</h5>
                    </div>
                    <div class="modal-body text-success">
                        <p>{{ 'success' }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var successModal = new bootstrap.Modal(document.getElementById('success'), {
                    backdrop: 'static',
                    keyboard: false
                });
                successModal.show();
            });
        </script>
    @endif
    <div class="loginregis">

        <div class="login_form">
            <!-- Login form container -->
            <form action="{{ route('login.authenticated') }}" method="post">
                @csrf
                <h3>Log in </h3>
                <!-- Email input box -->
                <div class="input_box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email address" autofocus
                        required />
                </div>
                <!-- Paswwrod input box -->
                <div class="input_box">
                    <div class="password_title">
                        <label for="password">Password</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required />
                </div>
                <!-- Login button -->
                <button type="submit">Log In</button>
                <p class="sign_up">Don't have an account? <a href="/register">Sign up</a></p>
            </form>
        </div>
    </div>
@endsection
