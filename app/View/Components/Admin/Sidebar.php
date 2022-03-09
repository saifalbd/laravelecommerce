<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Sidebar extends Component
{


    public $menus = [
        [
            'title' => 'Deshboard',
            'url' => '#'
        ],
        [
            'title' => 'Users',
            'url' => '#'
        ],
        [
            'title' => 'Brands',
            'url' => '#'
        ],
        [
            'title' => 'Units',
            'url' => '#'
        ],
        [
            'title' => 'Warehouse',
            'url' => '#'
        ],

        [
            'title' => 'Category',
            'url' => '#'
        ],
        [
            'title' => 'Bannars',
            'url' => '#'
        ],
        [
            'title' => 'Products',
            'url' => '#'
        ],
        [
            'title' => 'Stocks Reports',
            'url' => '#'
        ],
          [
          'title' => 'Account Reports',
          'url' => '#'
          ],
           [
           'title' => 'Setting',
           'url' => '#'
           ],
       
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.sidebar');
    }
}
