@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add About Hero Section</h3>
            </div>
            <form action="{{ route('dashboard.about_hero_section.store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="head_text">Headline Text</label>
                        <input type="text" name="head_text" class="form-control" id="head_text" placeholder="Enter Headline Text" value="{{ old('head_text') }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" class="form-control" rows="5" placeholder="Enter About">{{ old('about') }}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('dashboard.about_hero_section.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
