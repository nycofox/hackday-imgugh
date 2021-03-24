<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Graph;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->user()->admin) {
            return abort(403);
        }

        return view('admin.dashboard')->with([
            'graph' => Graph::lastDays(10),
        ]);
    }

}
