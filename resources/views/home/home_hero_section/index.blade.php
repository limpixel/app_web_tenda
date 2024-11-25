{{-- resources/views/home/home_hero_section/index.blade.php --}}
@extends('layouts.dashboard-layout-v2')

@section('content-header')
    <h1>Home Hero Sections</h1>
@endsection

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header d-flex justify-content-between align-items-center mb-2">
                <h3 class="box-title">Hero Section List</h3>
                @if($heroSections->count()== 0 )
                <a href="{{ route('dashboard.home-hero-section.create') }}" class="btn btn-primary pull-right">Add New Hero Section</a>
                @endif
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Head Text</th>
                            <th>Title Text</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($heroSections as $heroSection)
                            <tr>
                                <td>{{ $heroSection->head_text }}</td>
                                <td>{{ $heroSection->title_text }}</td>
                                <td>{{ $heroSection->description }}</td>
                                <td><img src="{{ asset('images/home/home_hero_section/' . $heroSection->image) }}" alt="Image" width="100"></td>
                                <td>
                                   
                                    <a href="{{ route('dashboard.home-hero-section.edit', $heroSection->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('dashboard.home-hero-section.destroy', $heroSection->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
