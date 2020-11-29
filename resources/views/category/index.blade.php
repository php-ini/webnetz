@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-8 text-2xl">
                        Categories List
                        <span style="float: right"><a href="{{ route('category.create') }}" class="btn btn-success">Create</a></span>
                    </div>

                    @if(Session::has('message'))
                        <br>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ ucwords(Session::get('message')) }}
                        </div>
                    @endif

                    <div class="mt-6 text-gray-500">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ url('category/' . $category->id . '/edit') }}">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </a>
                                        <form method="POST" name="{{ 'delete_' . $category->id }}" class="deleteForm"
                                              style="display: inline-block"
                                              action="{{ url('category/' . $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs delete"
                                                    data-toggle="modal" data-target="#confirmDelete"
                                                    data-title="Delete Category"
                                                    data-message="Are you sure you want to delete this ?"
                                                    rel="{{ $category->id }}">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>


    @include('elements.deleteConfirmModal')

@endsection
