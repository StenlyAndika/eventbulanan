@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>DAFTAR PESAN DITERIMA</strong>
                        </div>
                        <div class="card-body card-block">
                            @foreach ($pesan as $row)
                                <div class="card cardx col-lg-12">
                                    <div class="card-body">
                                        <h6 class="card-title" style="text-align: left;">{{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}</h6>
                                        <h5 class="card-title" style="text-align: left;">{{ $row->nama }} : <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $row->email }}" target="_blank">{{ $row->email }}</a></h5>
                                        <h5 class="card-title" style="text-align: left;"><a href="https://wa.me/{{ $row->wa }}" target="_blank">{{ $row->wa }}</a></h5>
                                        <p class="card-text mt-2" style="text-align: left;">
                                            <?= $row['pesan'] ?>
                                        </p>
                                        </h6>
                                        <form action="{{ route('admin.dashboard.destroy', $row->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus pesan ini?');"><i class="bi bi-x-square"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection