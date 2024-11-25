@extends('layouts.dashboard-layout-v2')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Blog</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="judul_blog">Title</label>
                    <input type="text" name="judul_blog" class="form-control" value="{{ $blog->judul_blog }}" required>
                </div>
                <div class="form-group">
                    <label for="desc_blog">Description</label>
                    <textarea name="desc_blog" class="form-control" required>{{ $blog->desc_blog }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" required>{{ $blog->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update Blog</button>
            </form>
        </div>
    </div>
@endsection
