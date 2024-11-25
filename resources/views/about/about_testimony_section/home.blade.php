@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border flex justify-content-between align-items-center my-4">
                <h3 class="box-title">About Testimony Section</h3>
                
                    <a href="{{ route('dashboard.about_testimoni_section.create') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Testimony</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aboutTestimony as $testimony)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $testimony->name_person }}</td>
                                <td>{{ Str::limit($testimony->testimony_text, 50) }}</td>
                                <td>
                                    <a href="{{ route('dashboard.about_testimoni_section.edit', $testimony->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dashboard.about_testimoni_section.destroy', $testimony->id) }}" 
                                          method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
