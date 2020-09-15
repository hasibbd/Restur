<?php

namespace App\Http\Controllers;

use App\Dish;

use App\Menu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function test($id){
        echo "<pre>";
        print_r($id);
        exit();
    }

    public function __construct()
    {
        $mm = Menu::where('menu_type',1)->get();
        $sm = Menu::where('menu_type',2)->get();
        $smm = Menu::where('menu_type',3)->get();
        $ssm = Menu::where('menu_type',4)->get();

        View::share('menu', $mm);
        View::share('submenu', $sm);
        View::share('smenu', $smm);
        View::share('ssubmenu', $ssm);
    }
}
