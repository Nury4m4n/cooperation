@extends('home.main')
@section('home')
    <section id="home">
        <div class="container">
            <div class="hero">
                <div class="title">
                    <h1>Selamat Datang di </h1>
                    <h2>Bersama Menuju Kemakmuran Finansial!</h2>
                </div>
                <div class="image">
                    <img src="/img/logo.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="layanan">
        <div class="continer ">
            <div class=" d-flex justify-content-center align-items-center text-center pt-5 pb-5">
                <h1>Layanan</h1>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 p-5" style="background-color: #143855">
                <div class="col">
                    <div class="card">
                        <img src="/img/Simpanan-Wajib.jpg" class="card-img-top" alt="..." style="height: 200px">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/img/Simpanan-Wajib.jpg" class="card-img-top" alt="..."style="height: 200px; ">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/img/Simpanan-Wajib.jpg" class="card-img-top" alt="..."style="height: 200px">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
