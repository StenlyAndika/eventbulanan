@extends('layout.main')

@section('container')
    <section class="mx-auto col-md-11 section mb-3">
        <div class="card shadow">
            <div class="container">
                <div class="card-body row align-items-center">
                    <div class="col-md-11 order-1 order-md-1 text-md-center" data-aos="fade-right" data-aos-duration="500">
                        <h1 class="fw-bold" style="color: #000;">Event Bulanan <span class="fw-bold" style="color: #2e7eed;">Kota Sungai Penuh</span></h1>
                    </div>
                </div>
                <div class="container mb-4">
                    <div class="row">
                        @foreach ($event as $row)
                        <div class="col-md-4 mt-2">
                            <div class="card" style="width: 100%">
                                <div class="card news-card rounded" style="height: 200px;
                                overflow: hidden;">
                                @php
                                    $expirationDate = Carbon\Carbon::parse($row->tgl);
                                    $currentDate = Carbon\Carbon::now();
                                @endphp
                                @if ($expirationDate->isPast())
                                    <span style="--my-content-var : 'Berlalu'; --my-color-var: #BB2525;"></span>
                                @else
                                    <span style="--my-content-var : 'Tersedia'; --my-color-var: #1450A3;"></span>
                                @endif
                                    <a href="{{ route('event.read', $row->slug) }}">
                                        <div class="card-animated">
                                            <img class="card-img-top" src="{{ asset('storage/'.$row->gambar) }}" alt="Post-Image">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('event.read', $row->slug) }}"><h5 class="card-title">{{ $row->judul }}</h5></a>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $row->oleh }}</h6>
                                    <p class="card-text">
                                        @php
                                            $string = strip_tags($row->deskripsi);
                                            if (strlen($string) > 100) {
                                                $stringCut = substr($string, 0, 100);
                                                $endPoint = strrpos($stringCut, ' ');
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '...';
                                            }
                                            echo $string;
                                        @endphp
                                    </p>
                                    <a href="{{ route('event.read', $row->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-link"></i> Lihat selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center mt-4">
                            {{ $event->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection