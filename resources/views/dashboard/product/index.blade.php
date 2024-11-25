@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="box">
    <div class="box-header with-border d-flex justify-content-between align-items-center my-4">
        <h3 class="box-title">Daftar Produk</h3>
        <a href="{{ route('dashboard.product_web.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i> Tambah Produk
        </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="productTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Tipe Produk</th>
                    <th>Ukuran</th>
                    <th>Waktu Harian</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ 'Rp' . ' ' . number_format($product->harga, 0, ',', '.') }}</td>
                        <td>{{ $product->tipe_produk }}</td>
                        <td>{{ $product->ukuran }}</td>
                        <td>{{ $product->waktu_harian }} hari</td>
                        <td>
                            @if ($product->image_produk)
                                <img src="{{ asset('images/produk/' . $product->image_produk) }}" alt="Gambar Produk" width="80" height="80">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dashboard.product_web.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.product_web.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{-- <tr>
                        <td colspan="8" class="text-center">Tidak ada data produk</td>
                    </tr> --}}
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
@endsection
