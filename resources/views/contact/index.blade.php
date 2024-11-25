@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Kontak</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('dashboard.contact.create') }}" class="btn btn-primary">Tambah Kontak</a>
        </div>
    </div>

    <div class="box-body">
        @if($contact->isEmpty())
            <div class="alert alert-info">Belum ada kontak yang ditambahkan.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor Telepon</th>
                        <th>Gmail</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $contact)
                        <tr>
                            <td>{{ $contact->nomor_telfon }}</td>
                            <td>{{ $contact->gmail }}</td>
                            <td>{{ $contact->instagram }}</td>
                            <td>{{ $contact->facebook }}</td>
                            <td>{{ $contact->twitter }}</td>
                            <td>
                                <a href="{{ route('dashboard.contact.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Form delete with confirmation -->
                                <form action="{{ route('dashboard.contact.destroy', $contact->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
