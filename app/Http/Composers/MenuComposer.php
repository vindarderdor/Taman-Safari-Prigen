<?php

namespace App\Http\View\Composers;

use App\Models\ChildMenu;
use Illuminate\View\View;
use App\Models\ParentMenu;

class MenuComposer
{
    protected $ParentMenu;
    protected $childMenu;

    public function __construct()
    {
        $this->ParentMenu = ParentMenu::all();
        $this->childMenu = ChildMenu::all();
    }

    public function compose(View $view)
    {
        $view->with('ParentMenu', $this->ParentMenu);
        $view->with('ChildMenu', $this->childMenu);
    }
}
