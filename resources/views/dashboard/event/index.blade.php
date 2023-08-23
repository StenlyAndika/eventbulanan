@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mt-3 d-inline align-middle">Event Bulanan</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Tanggal</th>
                                            <th style="text-align: center;">Judul Event</th>
                                            <th style="text-align: center;">Oleh</th>
                                            <th style="text-align: center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: left;">{{ $row->tgl }}</td>
                                            <td style="text-align: left;">{{ $row->judul }}</td>
                                            <td style="text-align: left;">{{ $row->oleh }}</td>
                                            <td class="text-center">
                                                @if ($row->status == 0)
                                                    <a href="{{ route('event.read', $row->slug) }}" target="_blank" class="btn btn-block btn-sm btn-primary">Detail Event</a>
                                                    <form action="{{ route('admin.event.set_accept', $row->slug) }}" method="post" class="d-inline">
                                                        @method('patch')
                                                        @csrf
                                                        <button type="submit" class="btn btn-block btn-sm btn-success">Konfirmasi</button>
                                                    </form>
                                                    <form action="{{ route('admin.event.set_denied', $row->slug) }}" method="post" class="d-inline">
                                                        @method('patch')
                                                        @csrf
                                                        <button type="submit" class="btn btn-block btn-sm btn-warning">Tolak</button>
                                                    </form>
                                                    <form action="{{ route('admin.event.destroy', $row->slug) }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-block btn-sm btn-danger" onclick="return confirm('Hapus Data ini?');">Hapus</button>
                                                    </form>
                                                @else
                                                    @if ($row->status == 1)
                                                        <button class="btn btn-block btn-sm btn-success">Divalidasi</button>
                                                    @else
                                                        <button class="btn btn-block btn-sm btn-danger">Ditolak</button>
                                                    @endif
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection