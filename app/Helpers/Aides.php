<?php
namespace App\Helpers;
use App\Category;

class Aides
{
    public static function menu(){
        $menu = Category::where('on_menu','1')->get();
        return $menu;
    }
}
