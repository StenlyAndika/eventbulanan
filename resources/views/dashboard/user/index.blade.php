@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.user.create') }}" class="d-inline align-middle btn btn-sm btn-success mb-2"><i class="bi bi-plus-lg"></i></a>
                            <h3 class="mt-3 d-inline align-middle">Data User</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Username</th>
                                            <th style="text-align: center;">Nama</th>
                                            @can('root')
                                                <th style="text-align: center;">Admin Level</th>
                                                <th style="text-align: center;">Root Level</th>
                                                <th style="text-align: center;">Opsi</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $row->username }}</td>
                                            <td style="text-align: center;">{{ $row->nama }}</td>
                                            @can('root')
                                                <td style="text-align: left;">
                                                    @if ($row->is_admin == 1)
                                                        <form action="{{ route('admin.user.set_admin', $row->id) }}" method="post" class="d-inline">
                                                            @method('patch')
                                                            @csrf
                                                            <button type="submit" class="btn btn-block btn-sm btn-success">Ya</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.user.set_admin', $row->id) }}" method="post" class="d-inline">
                                                            @method('patch')
                                                            @csrf
                                                            <button type="submit" class="btn btn-block btn-sm btn-danger">Tidak</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td style="text-align: left;">
                                                    @if ($row->is_root == 1)
                                                        <form action="{{ route('admin.user.set_root', $row->id) }}" method="post" class="d-inline">
                                                            @method('patch')
                                                            @csrf
                                                            <button type="submit" class="btn btn-block btn-sm btn-success">Ya</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.user.set_root', $row->id) }}" method="post" class="d-inline">
                                                            @method('patch')
                                                            @csrf
                                                            <button type="submit" class="btn btn-block btn-sm btn-danger">Tidak</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.user.edit', $row->id) }}" class="btn btn-block btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('admin.user.destroy', $row->id) }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-block btn-sm btn-danger" onclick="return confirm('Hapus Data ini?');"><i class="bi bi-x-square"></i></button>
                                                    </form>
                                                </td>
                                            @endcan
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