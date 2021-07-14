@extends('adminlte::page')

@section('title', 'Category Images')

@section('content')

    <x-delete />

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Category Images</h3>
            <div class="card-tools">
                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.photos.store', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group">
                    <label for="image">Category Picture</label>
                    <input
                        type="file"
                        name="image" id="image"
                        class="form-control-file @error('image') is-invalid @enderror"
                    >
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary" value="Add Photo">

            </form>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->medias as $media)
                    <tr>
                        <td>{{ $media->id }}</td>
                        <td>{{ $media->name }}</td>
                        <td>
                            <img src="/storage/{{ $media->path }}" height="40px">
                        </td>
                        <td>
                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $media->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $media->id }}" action="{{ route('admin.categories.photos.remove', $category->id) }}" method="post">
                                <input type="hidden" name="media_id" value="{{ $media->id }}">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
