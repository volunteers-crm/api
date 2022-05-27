<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $this->seo()
            ->title(__('Log In'))
            ->canonical($request->url());

        return view('login');
    }

    public function telegram(Request $request)
    {
        return $this->json($request->all());
    }
}
