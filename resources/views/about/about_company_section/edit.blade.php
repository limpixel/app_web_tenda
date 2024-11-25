@extends('layouts.dashboard-layout-v2')

@section('title', 'Edit About Company Section')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit About Company Section</h3>
            </div>
            <form action="{{ route('dashboard.about_company_section.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="head_text">Head Text</label>
                        <input type="text" name="head_text" id="head_text" class="form-control" value="{{ $item->head_text }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description_text">Description Text</label>
                        <textarea name="description_text" id="description_text" class="form-control" rows="5" required>{{ $item->description_text }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_person">Image</label>
                        <input type="file" name="image_person" id="image_person" class="form-control">
                        @if ($item->image_person)
                            <img class="my-2" src="{{ asset('images/about/' . $item->image_person) }}" width="400" alt="Image">
                        @endif
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
