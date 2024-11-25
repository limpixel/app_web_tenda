@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edit About Hero Section</h3>
            </div>
            <form action="{{ route('dashboard.about_hero_section.update', $aboutHeroSection->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="head_text">Headline Text</label>
                        <input type="text" name="head_text" class="form-control" id="head_text" value="{{ old('head_text', $aboutHeroSection->head_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" class="form-control" rows="5">{{ old('about', $aboutHeroSection->about) }}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('dashboard.about_hero_section.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
