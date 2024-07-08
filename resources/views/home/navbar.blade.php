<nav>
    <div class="navbar">
        <div class="logo"><a href="#">N_COOP</a></div>
        <ul class="menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item">
                <button type="button" class="badge rounded-pill bg-light text-dark text-decoration-none"
                    data-bs-toggle="modal" data-bs-target="#loginModal">Login
                    <i class='bx bx-log-in-circle bx-burst'></i>
                </button>
            </li>
        </ul>
    </div>
</nav>


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

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <div class="loginregis">

                    <div class="login_form">
                        <!-- Login form container -->
                        <form action="{{ route('login.authenticated') }}" method="post">
                            @csrf
                            <h3>Log in </h3>
                            <!-- Email input box -->
                            <div class="input_box">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter email address"
                                    autofocus required />
                            </div>
                            <!-- Paswwrod input box -->
                            <div class="input_box">
                                <div class="password_title">
                                    <label for="password">Password</label>
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <input type="password" id="password" name="password" placeholder="Enter your password"
                                    required />
                            </div>
                            <!-- Login button -->
                            <button type="submit">Log In</button>
                            <p class="mt-2">Dont't have an account? <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#registerModal" data-bs-dismiss="modal">Registrasi</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="regis">

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
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter email address"
                                    required />
                            </div>
                            <div class="input_box">
                                <div class="password_title">
                                    <label for="password">Password</label>
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <input type="password" name="password" id="password"
                                    placeholder="Enter your password" required />
                            </div>
                            <!-- Registration button -->
                            <button type="submit">Register</button>
                            <p class="mt-2">Already have an account? <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
                var loginModal = new bootstrap.Modal(document.getElementById('loginModal'), {
                    backdrop: 'static',
                    keyboard: false
                });
                var registerModal = new bootstrap.Modal(document.getElementById('registerModal'), {
                    backdrop: 'static',
                    keyboard: false
                });

                // Menangani tautan "Log in" di dalam modal registrasi
                document.querySelector('#registerModal .mt-2 a').addEventListener('click', function(event) {
                    event.preventDefault();
                    registerModal.hide(); // Menutup modal registrasi
                    loginModal.show(); // Menampilkan modal login
                });
</script>
