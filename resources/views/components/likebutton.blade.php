<form action="{{ route('media.favorite', $media) }}" method="post">
    @csrf
    <button type="submit"
            class="mr-2 btn btn-primary btn-sm {{ Cache::has('like_' . auth()->id() . '_' . $media->id, '') ? 'text-danger' : 'text-gray' }}">
        <i class="fa fa-heart"></i></button>
</form>
