@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-8 text-2xl">
                        Create Categories
                    </div>

                    <br>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: auto">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-6 text-gray-500">

                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-address-card"></i>
                                            </div>
                                        </div>
                                        <input id="name" name="name" placeholder="Name" type="text" class="form-control" aria-describedby="nameHelpBlock" required="required">
                                    </div>
                                    <span id="nameHelpBlock" class="form-text text-muted">Category Name</span>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-4 col-form-label">Description</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-align-justify"></i>
                                            </div>
                                        </div>
                                        <input id="description" name="description" placeholder="Description" type="text" class="form-control" aria-describedby="descriptionHelpBlock">
                                    </div>
                                    <span id="descriptionHelpBlock" class="form-text text-muted">Category Description</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
