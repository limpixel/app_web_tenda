@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Create Blog</h3>
    </div>
    <div class="box-body">
        <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required onchange="previewImage(event)">
                <img id="image-preview" src="#" alt="Image Preview" style="display: none; width: 200px; margin-top: 10px;">
            </div>
            <div class="form-group">
                <label for="judul_blog">Title</label>
                <input type="text" name="judul_blog" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="desc_blog">Description</label>
                <textarea name="desc_blog" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save Blog</button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const image = document.getElementById('image-preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    }
</script>
@endsection
