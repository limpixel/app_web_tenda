@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Produk</h3>
    </div>
    <form action="{{ route('dashboard.product_web.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <!-- Nama Produk -->
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}" placeholder="Masukkan nama produk">
                @error('nama_produk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Harga -->
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga', $product->harga) }}" placeholder="Masukkan harga produk">
                @error('harga')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Tipe Produk -->
            <div class="form-group">
                <label for="tipe_produk">Tipe Produk</label>
                <input type="text" name="tipe_produk" id="tipe_produk" class="form-control" value="{{ old('tipe_produk', $product->tipe_produk) }}" placeholder="Masukkan tipe produk">
                @error('tipe_produk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Ukuran -->
            <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran" class="form-control" value="{{ old('ukuran', $product->ukuran) }}" placeholder="Masukkan ukuran produk">
                @error('ukuran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Waktu Harian -->
            <div class="form-group">
                <label for="waktu_harian">Waktu Harian</label>
                <input type="text" name="waktu_harian" id="waktu_harian" class="form-control" value="{{ old('waktu_harian', $product->waktu_harian) }}" placeholder="Masukkan waktu harian">
                @error('waktu_harian')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Gambar Produk -->
            <div class="form-group">
                <label for="image_produk">Gambar Produk</label>
                <input type="file" name="image_produk" id="image_produk" class="form-control">
                @if($product->image_produk)
                    <div class="mt-2">
                        <img src="{{ asset('images/produk/' . $product->image_produk) }}" alt="Gambar Produk" width="150">
                    </div>
                @endif
                @error('image_produk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update Produk</button>
            <a href="{{ route('dashboard.product_web.index') }}" class="btn btn-default">Batal</a>
        </div>
    </form>
</div>
@endsection
