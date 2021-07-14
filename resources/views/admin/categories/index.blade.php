@extends('adminlte::page')

@section('title', 'All Categories')

@section('content')
    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All Categories</h3>
            <div class="card-tools">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-plus-circle mr-1"></i>
                    <span>Add New</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0 border-top-0">
            <table class="table table-bordered border-top-0 table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-fw fa-eye mr-1"></i>
                                <span>Details</span>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $category->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                @if($categories->total()== 0)
                <div class="card-footer bg-warning text-dark text-md p-2 text-center">
                   No Category Created Yet.
                </div>
                @endif
        </div>
        @if($categories->total() > 30)
        <div class="card-footer">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
@stop
