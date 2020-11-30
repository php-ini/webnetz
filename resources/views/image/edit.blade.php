@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-8 text-2xl">
                        Edit Image
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

                        <form method="POST" action="{{ route('image.update', $image->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-address-card"></i>
                                            </div>
                                        </div>
                                        <input id="name" name="name" placeholder="Name" type="text" class="form-control" aria-describedby="nameHelpBlock" required="required" value="{{ $image->name }}">
                                    </div>
                                    <span id="nameHelpBlock" class="form-text text-muted">Category Name</span>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="keywords" class="col-4 col-form-label">Keywords</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-align-justify"></i>
                                            </div>
                                        </div>
                                        <input id="keywords" name="keywords" placeholder="Keywords" type="text" class="form-control" aria-describedby="keywordsHelpBlock" value="{{ $image->keywords }}">
                                    </div>
                                    <span id="keywordsHelpBlock" class="form-text text-muted">Image Keywords</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categories" class="col-4 col-form-label">Categories</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
{{--                                                <i class="fa fa-align-justify"></i>--}}
                                            </div>
                                        </div>
                                        <select id="categories" name="categories[]" multiple="multiple" class="form-control js-example-basic-multiple" aria-describedby="categoriesHelpBlock">
                                            @foreach($categories as $key => $category)
                                                <option value="{{ $key }}"
                                                @foreach($selectedCategories as $sel)
                                                    @if($sel->id == $key)
                                                        selected="selected"
                                                    @endif
                                                @endforeach>{{ $category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span id="categoriesHelpBlock" class="form-text text-muted">Categories</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_category" class="col-4 col-form-label">New Category</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-align-justify"></i>
                                            </div>
                                        </div>
                                        <input id="new_category" name="new_category" placeholder="New Category" type="text" class="form-control" aria-describedby="newCategoryHelpBlock">
                                    </div>
                                    <span id="newCategoryHelpBlock" class="form-text text-muted">New Category</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-4 col-form-label">Replace Image</label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-align-justify"></i>
                                            </div>
                                        </div>
                                        <input id="image" name="image" placeholder="Image" type="file" class="form-control" aria-describedby="imageHelpBlock">
                                    </div>
                                    <div><a data-fancybox="gallery" href="/{{ $image->file_path }}"><img src="/{{ $image->file_path }}" width="100" /></a></div>
                                    <span id="imageHelpBlock" class="form-text text-muted">Image</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script >
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
