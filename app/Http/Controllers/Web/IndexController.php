<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->seo()
            ->title(config('app.name'))
            ->description(__('seo.index.description'))
            ->canonical($request->url());

        return view('index');
    }
}
