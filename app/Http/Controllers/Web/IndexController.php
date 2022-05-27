<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request)
    {
        $this->seo()
            ->title(__('Home'))
            ->description(__('Volunteers CRM description'))
            ->canonical($request->url());

        return view('home');
    }
}
