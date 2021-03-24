<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Media $media)
    {
        $media->toggleLike();

        return redirect()->back();
    }
}
