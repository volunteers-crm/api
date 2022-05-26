<?php

namespace App\Http\Controllers;

class SeoController extends Controller
{
    public function robots()
    {
        return response(view('robots')->render(), headers: [
            'Content-Type' => 'text/plain',
        ]);
    }
}
