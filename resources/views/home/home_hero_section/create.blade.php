{{-- resources/views/home/home_hero_section/create.blade.php --}}
@extends('layouts.dashboard-layout-v2')

@section('content-header')
    <h1>Create Hero Section</h1>
@endsection

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="{{ route('dashboard.home-hero-section.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="head_text">Head Text</label>
                        <input type="text" name="head_text" id="head_text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title_text">Title Text</label>
                        <input type="text" name="title_text" id="title_text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('dashboard.home-hero-section.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
@endsection
