<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <a aria-label="home" href="/"><img src="/img/tablogo.webp" alt="" class="img-fluid" width="150px"></a>
                    <p>
                        Website Event Bulanan<br>
                        Menyediakan seputar informasi, event, acara dalam kota sungai penuh.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><a href="http://sungaipenuhkota.go.id">Website Kota Sungai Penuh</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Tentang Kami</h4>
                    <p>
                        Dinas Komunikasi Informatika dan Statistik
                        <br>
                        Jl. Prof. Dr. Sri Sidewi 
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter" id="kontakkami">
                    <h4>Kontak Kami</h4>
                    <form action="{{ route('kontak') }}" method="post" id="kontakweb">
                        @csrf
                        <input type="text" class="form-control mb-1" name="nama" value="{{ old('nama') }}" placeholder="Nama Anda">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" class="form-control mb-1" name="wa" value="{{ old('wa') }}" placeholder="Nomor Telp/WA">
                        @error('wa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" class="form-control mb-1" name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <textarea name="pesan" class="form-control mb-1" rows="4" aria-label="Pesan">
                            {{ old('pesan') }}
                        </textarea>
                        @error('pesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="btn btn-md btn-light text-danger fw-bold">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <a class="text-white" href="{{ route('login') }}">&copy;</a> Copyright <strong>Dinas Komunikasi Informatika & Statistik Kota Sungai Penuh</strong>. All Rights Reserved
        </div>
    <div class="credits">
        Developed by <a href="https://stenlyandika.github.io/" target="_blank">Tenaga Ahli Programmer 2022-2023</a>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>