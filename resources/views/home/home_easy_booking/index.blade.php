@extends('layouts.dashboard-layout-v2')

@section('title', 'Easy Booking Sections')

@section('content-header')
    {{-- <h1>Easy Booking Sections</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Easy Booking Sections</li>
    </ol> --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border d-flex justify-content-between align-items-center my-4 ">
                    <h3 class="box-title">Home Easy Booking Sections</h3>
                    @if ($HomeEasyBook->count() == 0)
                    <a href="{{ route('dashboard.home-easy-section.create') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                    @endif
                </div>
                <!-- Table -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Headline Text</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($HomeEasyBook as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->head_text }}</td>
                                    <td>{{ Str::limit($section->description, 50) }}</td>
                                    <td>
                                        @if ($section->image)
                                            <img src="{{ asset('images/home/home_easy_booking/' . $section->image) }}" 
                                                 alt="Section Image" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.home-easy-section.edit', $section->id) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('dashboard.home-easy-section.destroy', $section->id) }}" 
                                              method="POST" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="box-footer">
                    {{ $HomeEasyBook->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
