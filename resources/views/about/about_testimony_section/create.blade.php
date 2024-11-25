@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Testimony</h3>
            </div>
            <div class="box-body" style="padding: 20px;">
                <form action="{{ route('dashboard.about_testimoni_section.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name_person">Name</label>
                        <input type="text" name="name_person" id="name_person" 
                               class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="testimony_text">Testimony</label>
                        <textarea name="testimony_text" id="testimony_text" 
                                  class="form-control" rows="9" placeholder="Enter testimony" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('dashboard.about_testimoni_section.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
