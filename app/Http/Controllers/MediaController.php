<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function show(Media $media)
    {
        return view('media', ['media' => $media]);
    }

    public function display(Media $media)
    {
        return Storage::response($media->path);
    }

    public function download(Media $media)
    {
        return Storage::download($media->path, $media->filename_original);
    }

    public function destroy(Media $media)
    {
        $this->authorize('update', $media);

        $media->delete();

        return redirect()->route('home');
    }

}
