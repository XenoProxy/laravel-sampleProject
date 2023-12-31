<?php
namespace App\Http\Services;

use DB;

class LikeService 
{
  public function getLikesNumber($productId)
  {
    $userData = DB::table('user_product')
      ->select(DB::raw('count(id) as likes'))
      ->where('product_id', $productId)
      ->get()
      ->toArray();

    //dd($userData[0]->likes);
    return $userData[0]->likes;
  }
}
