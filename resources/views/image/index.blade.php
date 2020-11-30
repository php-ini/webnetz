@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-8 text-2xl">
                        Images List
                        <span style="float: right"><a href="{{ route('image.create') }}" class="btn btn-success">Create</a></span>
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
                                <th>Image</th>
                                <th>Categories</th>
                                <th>Keywords</th>
                                <th>Height</th>
                                <th>Width</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($images as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ route('image.show', $item->id) }}">{{ $item->name }}</a></td>
                                    <td><a data-fancybox="gallery" href="{{ $item->file_path }}" ><img width="100" height="75" src="{{ $item->file_path }}" /></a></td>
                                    <td>
                                        <ul>
                                            @foreach($item->categories as $c)
                                                <li><a href="{{ route('category.edit', $c->id) }}">{{ $c->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $item->keywords }}</td>
                                    <td>{{ $item->height }}</td>
                                    <td>{{ $item->width }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ url('image/' . $item->id . '/edit') }}">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </a>
                                        <form method="POST" name="{{ 'delete_' . $item->id }}" class="deleteForm"
                                              style="display: inline-block"
                                              action="{{ url('category/' . $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs delete"
                                                    data-toggle="modal" data-target="#confirmDelete"
                                                    data-title="Delete Category"
                                                    data-message="Are you sure you want to delete this ?"
                                                    rel="{{ $item->id }}">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {{ $images->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>


    @include('elements.deleteConfirmModal')

@endsection
