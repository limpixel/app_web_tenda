@extends('layouts.dashboard-layout-v2') {{-- Gunakan layout AdminLTE --}}

@section('title', 'Edit Easy Booking Section')

@section('content-header')
    {{-- <h1>Edit Easy Booking Section</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.home-easy-book-section.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Easy Booking Section</li>
    </ol> --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Section</h3>
                </div>
                <!-- Form Start -->
                <form action="{{ route('dashboard.home-easy-section.update', $homeEasyBooking->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="head_text">Headline Text</label>
                            <input type="text" name="head_text" id="head_text" class="form-control" 
                                   value="{{ old('head_text', $homeEasyBooking->head_text) }}" placeholder="Enter Headline Text">
                            @error('head_text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Description">{{ old('description', $homeEasyBooking->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <small class="text-muted">Leave blank if you don't want to change the image.</small>
                            <br>
                            @if ($homeEasyBooking->image)
                                <img src="{{ asset('images/home/home_easy_booking/' . $homeEasyBooking->image) }}" 
                                     alt="Current Image" class="img-thumbnail" width="150">
                            @endif
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="{{ route('dashboard.home-easy-section.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
