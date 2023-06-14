<?php
namespace App\Http\Repositories;

use DB;

class likeRepository
{
    public function getTheMostPopularProduct()
    {
        $query = "SELECT p1.name, COUNT(user_product.id) as likes 
        FROM products p1 JOIN user_product 
        ON p1.id = user_product.product_id GROUP BY product_id";
        $result = DB::select($query);

        return $result[0];
    }
}
