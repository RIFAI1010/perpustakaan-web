<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class beginController extends Controller
{
    public function index() {
        return view('begin', ['buku' => Buku::take(6)->get(),]);
    }
}
