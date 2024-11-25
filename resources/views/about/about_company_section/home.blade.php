@extends('layouts.dashboard-layout-v2')

@section('title', 'About Company Section')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border flex justify-content-between align-items-center my-4">
                <h3 class="box-title">About Company Section</h3>
                @if ($items->count() != 2)
                    <a href="{{ route('dashboard.about_company_section.create') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                @endif
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Head Text</th>
                            <th>Description Text</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->head_text }}</td>
                                <td>{{ Str::limit($item->description_text, 50) }}</td>
                                <td>
                                    @if ($item->image_person)
                                        <img src="{{ asset('images/about/' . $item->image_person) }}" width="100" alt="Image">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.about_company_section.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dashboard.about_company_section.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
