@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h3 class="font-weight-bold mb-4" style="text-align: center;">{{ $pelayanan->jenis }}<br></h3>
                    <a href="#"><img src="{{ asset('storage/'.$pelayanan->gambar) }}" width="800px" alt="..."></a>
                    <div class="table-responsive" style="text-align: left;">    
                        <p class="mt-4">{!! $pelayanan->standar !!}</p>
                        <a class="btn btn-sm btn-success" href="{{ route('pelayanan') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection