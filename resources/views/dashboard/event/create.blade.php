@extends('layout.main')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card mb-3">
					<div class="card-header">
						<h3 class="mt-3">Form Event Bulanan</h3>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="judul" value="{{ old('judul') }}">
                                <label for="judul">Judul Event</label>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" name="slug" value="{{ old('slug') }}" readonly>
                                <label for="slug">Slug</label>
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl" placeholder="tgl" value="{{ old('tgl') }}">
                                <label for="tgl">Tanggal</label>
                                @error('tgl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" placeholder="jam" value="{{ old('jam') }}">
                                <label for="jam">Jam</label>
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('oleh') is-invalid @enderror" id="oleh" name="oleh" placeholder="oleh" value="{{ old('oleh') }}">
                                <label for="oleh">Diselenggarakan Oleh</label>
                                @error('oleh')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" placeholder="lokasi" value="{{ old('lokasi') }}">
                                <label for="lokasi">Lokasi</label>
                                @error('lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="deskripsi">Deskripsi Event</label>
                                <input type="hidden" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                                <trix-editor input="deskripsi"></trix-editor>
                            </div>
                            <div class="form-group mb-1">
                                <input type="file" id="gambar" class="form-control @error('gambar') is-invalid @enderror" name="gambar" onchange="previewImage()">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-lg-8 mt-2">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('home') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    const judul = document.querySelector('#judul');
    const slugs = document.querySelector('#slug');
    
    judul.addEventListener('change', function(e) {
        fetch('/event/checkSlug/' + judul.value)
        .then(response => response.json())
        .then(data => slugs.value = data.slug)
    })

    function previewImage() {
        const image = document.querySelector('#gambar');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imagePreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection