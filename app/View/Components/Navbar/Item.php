<?php

declare(strict_types=1);

namespace App\View\Components\Navbar;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public function __construct(
        public string $route,
        public string $title
    ) {
    }

    public function render(): View
    {
        return view('components.navbar.item');
    }

    public function isActive(): bool
    {
        return $this->route === request()->url();
    }
}
