@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border d-flex justify-content-between align-items-center my-4">
                <h3 class="box-title">About Hero Section</h3>
                @if ($aboutHeroSection->count() != 1)
                    <a href="{{ route('dashboard.about_hero_section.create') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                @endif
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Headline Text</th>
                            <th>About</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aboutHeroSection as $section)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $section->head_text }}</td>
                                <td>{{ Str::limit($section->about, 50) }}</td>
                                <td>
                                    <a href="{{ route('dashboard.about_hero_section.edit', $section->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dashboard.about_hero_section.destroy', $section->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
