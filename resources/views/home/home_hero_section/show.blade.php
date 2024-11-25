{{-- resources/views/home/home_hero_section/show.blade.php --}}
@extends('layouts.dashboard-layout-v2')

@section('content-header')
    <h1>View Hero Section</h1>
@endsection

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <strong>Head Text:</strong>
                    <p>{{ $heroSection->head_text }}</p>
                </div>

                <div class="form-group">
                    <strong>Title Text:</strong>
                    <p>{{ $heroSection->title_text }}</p>
                </div>

                <div class="form-group">
                    <strong>Description:</strong>
                    <p>{{ $heroSection->description }}</p>
                </div>

                <div class="form-group">
                    <strong>Image:</strong>
                    <img src="{{ asset('images/home/home_hero_section/' . $heroSection->image) }}" alt="Image" width="300">
                </div>

                <a href="{{ route('dashboard.home-hero-section.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('dashboard.home-hero-section.edit', $heroSection->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </section>
@endsection