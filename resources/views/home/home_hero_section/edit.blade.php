{{-- resources/views/home/home_hero_section/edit.blade.php --}}
@extends('layouts.dashboard-layout-v2')

@section('content-header')
    <h1>Edit Hero Section</h1>
@endsection

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('dashboard.home-hero-section.update', $heroSection->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="head_text">Head Text</label>
                        <input type="text" name="head_text" id="head_text" class="form-control" value="{{ $heroSection->head_text }}" required>
                    </div>

                    <div class="form-group">
                        <label for="title_text">Title Text</label>
                        <input type="text" name="title_text" id="title_text" class="form-control" value="{{ $heroSection->title_text }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ $heroSection->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small>Current Image:</small>
                        <img src="{{ asset('images/home/home_hero_section/' . $heroSection->image) }}" alt="Image" width="100">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('dashboard.home-hero-section.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
@endsection
