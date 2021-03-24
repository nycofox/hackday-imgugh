<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,gif,webp'
        ]);

        $file = $request->file('file');

        $path = $file->store(date('Y/m/d'));

        Media::create([
            'filename_original' => $file->getClientOriginalName(),
            'path' => $path,
            'slug' => Str::random(6) . '.' . basename($file->getMimeType()),
            'type' => 'i',
            'user_id' => auth()->id(),
        ]);

        return redirect(route('home'));
    }
}
