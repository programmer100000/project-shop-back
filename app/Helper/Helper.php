<?php 
namespace App\Helper;

use App\product;

class Helper
{
    public static function updateproducts(){
        $products = product::all();
        foreach ($products as $p) {
            if($p->balance > 0){
                $p->status = true;
                $p->save();
            }else{
                $p->status = false;
                $p->save();
            }
        }
    }
}