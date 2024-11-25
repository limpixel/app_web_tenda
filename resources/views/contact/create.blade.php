@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Kontak</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('dashboard.contact.index') }}" class="btn btn-default">Kembali</a>
        </div>
    </div>

    <div class="box-body">
        <form action="{{ route('dashboard.contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomor_telfon">Nomor Telepon</label>
                <input type="text" class="form-control @error('nomor_telfon') is-invalid @enderror" id="nomor_telfon" name="nomor_telfon" value="{{ old('nomor_telfon') }}">
                @error('nomor_telfon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gmail">Gmail</label>
                <input type="email" class="form-control @error('gmail') is-invalid @enderror" id="gmail" name="gmail" value="{{ old('gmail') }}">
                @error('gmail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram') }}">
                @error('instagram')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook') }}">
                @error('facebook')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ old('twitter') }}">
                @error('twitter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
