<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $allmedia = Media::withCount('likes')->latest()->paginate(12);

        return view('welcome', [
            'allmedia' => $allmedia,
        ]);
    }
}
