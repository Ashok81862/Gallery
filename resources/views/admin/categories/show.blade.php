@extends('adminlte::page')

@section('title', 'Category Details')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Category Details</h3>
            <div class="card-tools">

                <a href="{{ route('admin.categories.photos', $category->id) }}" class="btn mb-2 btn-primary btn-sm">
                    <i class="fas fa-fw fa-image mr-1"></i>
                    <span>Gallery</span>
                </a>

                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn mb-2 btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm mb-2 btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <td>Photos</td>
                    <td>
                        @if(count($category->medias) >0)
                            @foreach ($category->medias as $media)
                                <img src="/storage/{{ $media->path }}" height="100px" width="100px" class="rounded-lg">
                            @endforeach
                        @else
                            Gallery Empty
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
