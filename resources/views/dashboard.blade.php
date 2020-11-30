<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        Welcome to the Webnetz Task application!
                    </div>

                    <div class="mt-6 text-gray-500">
                        This application is just a small task application for showing the users images with their data and categories assigned to it.
                        <br>
                        The application was created by Mahmoud Mostafa.
                        <br>
                        Have fun!
                        <hr>
                        @if(count(\Domains\Webnetz\Image\ImageHelper::getUserImages()) == 0)
                            <a href="{{ route('image.create') }}"><button class="btn btn-success">Start adding images</button></a>
                        @endif
                        <div class="row">
                            @foreach(\Domains\Webnetz\Image\ImageHelper::getUserImages() as $img)
                                <div class="col-md-4">
                                    <a data-fancybox="gallery" href="{{ $img->file_path }}" style="position: inherit;">
                                        <img src="{{ $img->file_path }}" width="300" height="250px" />
                                    </a>
                                    <a href="{{ route('image.edit', $img->id) }}">{{ $img->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
