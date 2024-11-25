@extends('layouts.dashboard-layout-v2') {{-- Gunakan layout AdminLTE --}}

@section('title', 'Create Easy Booking Section')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Section</h3>
                </div>
                <!-- Form Start -->
                <form action="{{ route('dashboard.home-easy-section.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="head_text">Headline Text</label>
                            <input type="text" name="head_text" id="head_text" class="form-control" 
                                   value="{{ old('head_text') }}" placeholder="Enter Headline Text">
                            @error('head_text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <small class="text-muted">Supported formats: jpg, jpeg, png, gif (Max: 2MB).</small>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="{{ route('dashboard.home-easy-section.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
