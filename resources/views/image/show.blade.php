@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-8 text-2xl">
                        Image Details
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
                                <th>Key</th>
                                <th>Value</th>

                            </tr>
                            @foreach($image as $key => $value)
                                <tr>
                                    @if($key == 'file_path')
                                    <td>{{ $key }}</td>
                                    <td><a data-fancybox="gallery" href="/{{ $value }}" ><img width="100" height="75" src="/{{ $value }}" /></a></td>
                                    @elseif($key == 'exif_data')
                                        <td>{{ $key }}</td>
                                        <td>
                                            <ul>
                                            @foreach($value as $k => $j)
                                                @if(count((array)$j) == 1)
                                                <li><b>{{ $k }}: </b>{{ $j }}</li>
                                                @endif
                                            @endforeach
                                            </ul>
                                        </td>
                                    @else
                                        <td>{{ $key }}</td>
                                        <td>{{ $value }}</td>
                                    @endif
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>


    @include('elements.deleteConfirmModal')

@endsection
