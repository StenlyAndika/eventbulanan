@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Profil User</h1>
					</div>
					<div class="card-body card-block">
                        <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ $user->username }}">
                                <label for="username">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ $user->password }}">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ $user->nama }}">
                                <label for="nama">Nama</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.user.index') }}">Kembali</a>
                            </div>
                        </form>
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="post" class="mt-1">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus akun anda?');">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection