@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Team Member</h3>
            </div>
            <form action="{{ route('dashboard.about_team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name_person">Name</label>
                        <input type="text" name="name_person" class="form-control" id="name_person" placeholder="Enter Name" value="{{ old('name_person') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Enter Job Title" value="{{ old('job_title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="about_person">About</label>
                        <textarea name="about_person" id="about_person" class="form-control" rows="5" placeholder="Write something about the person" required>{{ old('about_person') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="linkedin_username">LinkedIn</label>
                        <input type="text" name="linkedin_username" class="form-control" id="linkedin_username" placeholder="LinkedIn Username" value="{{ old('linkedin_username') }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram_username">Instagram</label>
                        <input type="text" name="instagram_username" class="form-control" id="instagram_username" placeholder="Instagram Username" value="{{ old('instagram_username') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('dashboard.about_team.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
