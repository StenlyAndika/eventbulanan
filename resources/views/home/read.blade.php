@extends('layout.main')

@section('container')
    <section class="mx-auto col-md-10 section blog-single mb-3">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <article class="single-post">
                        <div class="post-body">
                            <div class="feature-image">
                                <img class="img-fluid" src="{{ asset('storage/'.$singleevent->gambar) }}" alt="feature-image">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-secondary">Diselenggarakan Oleh :</h5>
                                    <h5>{{ $singleevent->oleh }}</h5>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-secondary">Tanggal Event :</h5>
                                    <h5>{{ Carbon\Carbon::parse($singleevent->tgl)->isoFormat('D MMMM Y') }}</h5>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-secondary">Waktu Event :</h5>
                                    <h5>{{ $singleevent->jam }}</h5>
                                </div>
                                <div class="col-md-9">
                                    <h5 class="text-secondary">Lokasi Event :</h5>
                                    <h5>{{ $singleevent->lokasi }}</h5>
                                </div>
                                <div class="col-md-3">
                                    <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank" class="btn mr-2"><h3><i class="bi bi-facebook text-primary"></i></h3></a>
                                    <a href="https://api.whatsapp.com/send?text=Baca%20Event%20*%20{{ $singleevent->judul }}%20*%20dengan%20klik%20{{ url()->current() }}" target="_blank" class="btn mr-2 text-success"><h3><i class="bi bi-whatsapp"></i></h3></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank" class="btn mr-2"><h3><i class="bi bi-twitter text-info"></i></h3></a>
                                </div>
                            </div>
                            <hr>
                            <p>{!! $singleevent->deskripsi !!}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection