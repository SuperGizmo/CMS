<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Page;

class PageController extends Controller
{
    public function show($url)
    {
        $url = str_replace("-", " ", $url);
        return view('site.page', ['page' => Page::where('url', $url)->get()->first()]);
    }
}
