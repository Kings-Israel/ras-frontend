<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavCategories extends Component
{
    public function render(): View|Closure|string
    {
        $categories = Category::all()->take(4);

        return view('components.nav-categories', compact('categories'));
    }
}
