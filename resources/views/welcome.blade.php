    @extends('home.main')

    @section('home')
        <!-- Bagian Hero -->
        <section id="home" class="py-5">
            <div class="container">
                <div class="row flex-column-reverse flex-md-row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                        <h1 class="brand">Selamat Datang di</h1>
                        <h2>Bersama Menuju Kemakmuran Finansial!</h2>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="/img/logo.png" alt="Logo" class="img-fluid hero-image">
                    </div>
                </div>
            </div>
        </section>

        <!-- Bagian Produk Layanan Kami -->
        <section id="layanan" class="py-5">
            <div class="container">
                <div class="text-center pb-5">
                    <h1>Produk Layanan Kami</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src="/img/simpanan Wajib.jpg" class="card-img-top " alt="Gambar Simpanan Wajib"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Simpanan Wajib</h5>
                                <p class="card-text">Simpanan yang harus dipenuhi oleh setiap anggota koperasi untuk
                                    keberlangsungan operasional.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src="/img/tabungan.jpg" class="card-img-top" alt="Gambar Tabungan Nasabah"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Tabungan Nasabah</h5>
                                <p class="card-text">Tabungan yang ditawarkan kepada anggota untuk menabung dengan bunga
                                    yang
                                    kecil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src="/img/pinjaman.jpg" class="card-img-top" alt="Gambar Pinjaman Nasabah"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Pinjaman Nasabah</h5>
                                <p class="card-text">Pinjaman yang diberikan kepada anggota dengan persyaratan yang mudah
                                    dan
                                    bunga yang kecil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bagian Tentang Kami -->
        <section id="about" class="py-5" style="background-color: #f9f9f9;">
            <div class="container">
                <div class="text-center pt-5 pb-5">
                    <h1>Tentang Kami</h1>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="/img/logo.png" alt="Logo Tentang Kami" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h3>Tentang Kami</h3>
                        <p>
                            Kami adalah koperasi simpan pinjam yang memprioritaskan akses keuangan yang mudah dan terjangkau
                            bagi semua. Dengan lebih dari dua dekade pengalaman, kami berkomitmen untuk membantu masyarakat
                            mencapai stabilitas finansial melalui layanan pinjaman yang kompetitif dan simpanan yang
                            menguntungkan.
                        </p>
                        <p>
                            Kami tidak hanya tentang memberikan pinjaman; kami juga mendorong pendidikan keuangan dan
                            pertumbuhan ekonomi lokal. Kami percaya bahwa semua orang berhak atas kesempatan untuk mengelola
                            keuangan mereka dengan cerdas dan bertanggung jawab.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bagian Hubungi Kami -->
        <section id="contact" class="py-5">
            <div class="container">
                <div class="text-center pt-5 pb-5">
                    <h1>Hubungi Kami</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Hubungi Kami</h3>
                        <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, silakan hubungi kami
                            melalui
                            formulir di bawah ini. Kami akan segera menghubungi Anda.</p>
                        <ul class="list-unstyled">
                            <li><strong>Alamat:</strong> Jl. Soekarno Hatta No.456 40266 Bandung Jawa Barat</li>
                            <li><strong>Email:</strong> nury4m4nn@gmail.com</li>
                            <li><strong>Telepon:</strong>085797563983</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <form action="/send-message" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" style="color: #f9f9f9; background-color:#143855 ">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer style="color: #f9f9f9; background-color:#143855 " class=" py-4">
            <div class="container">
                <div class="row">
                    <!-- Informasi Kontak -->
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h5>Kontak Kami</h5>
                        <ul class="list-unstyled">
                            <li><i class="bx bxs-map"></i> Jl. Soekarno Hatta No.456 40266 Bandung Jawa Barat </li>
                            <li><i class="bx bxs-envelope"></i> nury4m4nn@gmail.com</li>
                            <li><i class="bx bxs-phone"></i> 085797563983</li>
                        </ul>
                    </div>
                    <!-- Tautan Cepat -->
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h5>Tautan Cepat</h5>
                        <ul class="list-unstyled">
                            <li><a href="#home" class="text-white">Beranda</a></li>
                            <li><a href="#about" class="text-white">Tentang Kami</a></li>
                            <li><a href="#layanan" class="text-white">Layanan</a></li>
                            <li><a href="#contact" class="text-white">Hubungi Kami</a></li>
                        </ul>
                    </div>
                    <!-- Tautan Media Sosial -->
                    <div class="col-md-4">
                        <h5>Ikuti Kami</h5>
                        <div>
                            <a href="#" class="text-white me-2"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="text-white me-2"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="text-white me-2"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="text-white"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        <p class="mb-0">&copy; 2024 N-COOP | Nurademy</p>
                    </div>
                </div>
            </div>
        </footer>
    @endsection
