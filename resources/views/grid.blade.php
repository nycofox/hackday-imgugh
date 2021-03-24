<div class="row">

    @foreach($allmedia as $media)
        <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
            <div class="card">
                <a href="{{ route('media.show', $media) }}" title="{{ $media->filename_original }}">
                    <img src="{{ $media->url }}" class="img-fluid" alt="Image">
                </a>
                <div class="card-footer">
                    <div class="d-flex">
                        <div title="{{ $media->filename_original }}">
                            {{ Str::limit($media->filename_original, '25', '...') }}
                            {{--                        {{ $media->user->name }}--}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-2">
                        <div class="d-flex">
                            @auth
                                @include('components.likebutton')
                            @endauth
                            {{ $media->likes_count }} {{ Str::plural('like', $media->likes_count) }}
                        </div>
                        <div>
                            <a href="{{ route('media.display', $media) }}" class="btn btn-primary btn-sm"
                               onclick="
                                   event.preventDefault();
                                   navigator.clipboard.writeText('{{ route('media.display', $media) }}');
                                   alert('Link copied!')"
                               title="Copy link">
                                <i class="fa fa-share-alt"></i>
                            </a>
                            <a href="{{ route('media.download', $media) }}" class="ml-1 btn btn-primary btn-sm"
                               title="Download image">
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

<div class="d-flex justify-content-center mt-4">
    {{ $allmedia->links() }}
</div>
