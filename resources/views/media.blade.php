@extends('layouts.app')

@section('content')

    <div class="container p-0 rounded-lg" style="background: #32383E">
        <div class="d-flex flex-wrap">
            <div class="col-md-8 p-0">
                <a href="{{ route('media.display', $media) }}">
                    <img src="{{ $media->url }}" class="img-fluid" alt="Image">
                </a>
            </div>
            <div class="col-md-4 p-0">
                <ul class="list-group list-group-flush mt-2 mb-2">
                    <li class="list-group-item">
                        <div class="d-flex">
                            <a href="{{ route('profile', $media->user) }}">
                                <img src="{{ $media->user->avatar }}"
                                     class="img-responsive rounded-circle bg-light border-1"
                                     alt="Avatar">
                                {{ $media->user->name }}
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item">{{ $media->filename_original }}</li>

                    <li class="list-group-item">
                        <div class="d-flex">
                            @auth
                                <form action="{{ route('media.favorite', $media) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                            class="mr-2 btn btn-primary btn-sm {{ Cache::has('like_' . auth()->id() . '_' . $media->id, '') ? 'text-danger' : 'text-gray' }}">
                                        <i class="fa fa-heart"></i></button>
                                </form>
                            @endauth
                            {{ $media->likes->count() }} {{ Str::plural('like', $media->likes->count()) }}
                        </div>
                    </li>
                    <li class="list-group-item" title="{{ $media->created_at }}">Uploaded {{ $media->created_at->diffForHumans() }}</li>
                    <li class="list-group-item"><a href="{{ route('media.download', $media) }}">
                            <i class="fa fa-download mr-1"></i>Download</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" onclick="
                            event.preventDefault();
                            navigator.clipboard.writeText('{{ route('media.display', $media) }}');
                            alert('Link copied!')">
                            <i class="fa fa-link mr-1"></i>Copy link to image</a>
                    </li>
                    @can('update', $media)
                        <li class="list-group-item">
                            <a href="{{ route('media.delete', $media) }}" class="text-danger">
                                <i class="fa fa-trash mr-1"></i>Delete image
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>

@endsection
