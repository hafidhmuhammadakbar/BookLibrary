<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        return view('publisher.index', [
            'title' => 'All Publisher',
            'active' => 'publishers',
            'publishers' => Publisher::all(),
        ]);
    }
}
