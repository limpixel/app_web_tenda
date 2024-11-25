@extends('layouts.dashboard-layout-v2')

@section('content')
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center mb-2">
            <h3 class="box-title">Blogs</h3>
            <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-primary">Create Blog</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td><img src="{{ asset('images/blogs/' . $blog->image) }}" width="50" height="50" /></td>
                            <td>{{ $blog->judul_blog }}</td>
                            <td>{{ $blog->desc_blog }}</td>
                            <td>{{ $blog->user->name }}</td>
                            <td>
                                <a href="{{ route('dashboard.blogs.show', $blog) }}" class="btn btn-info">View</a>
                                <a href="{{ route('dashboard.blogs.edit', $blog) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('dashboard.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
