@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Team Member</h3>
            </div>
            <form action="{{ route('dashboard.about_team_section.update', $aboutTeam->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="name_person">Name</label>
                        <input type="text" name="name_person" class="form-control" id="name_person" placeholder="Enter Name" value="{{ old('name_person', $aboutTeam->name_person) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jobs_title">Job Title</label>
                        <input type="text" name="jobs_title" class="form-control" id="jobs_title" placeholder="Enter Job Title" value="{{ old('jobs_title', $aboutTeam->jobs_title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="about_person">About</label>
                        <textarea name="about_person" id="about_person" class="form-control" rows="5" placeholder="Write something about the person" required>{{ old('about_person', $aboutTeam->about_person) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="linkedin_username">LinkedIn</label>
                        <input type="text" name="linkedin_username" class="form-control" id="linkedin_username" placeholder="LinkedIn Username" value="{{ old('linkedin_username', $aboutTeam->linkedin_username) }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram_username">Instagram</label>
                        <input type="text" name="instagram_username" class="form-control" id="instagram_username" placeholder="Instagram Username" value="{{ old('instagram_username', $aboutTeam->instagram_username) }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload New Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*">
                    </div>
                    @if($aboutTeam->image)
                        <div class="form-group">
                            <label>Current Image</label>
                            <div>
                                <img src="{{ asset('images/about_team_section/' . $aboutTeam->image) }}" alt="Current Image" style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('dashboard.about_team_section.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
