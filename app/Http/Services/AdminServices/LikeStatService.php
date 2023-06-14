<?php
namespace App\Http\Services\AdminServices;

use App\Http\Repositories\likeRepository;

class LikeStatService 
{
    private $likeRepository = null;

    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    // Вызывает метод из репозитория, который получит самый популярный продукт
    public function getStat()
    {
        $theMostPopular = $this->likeRepository->getTheMostPopularProduct();
        return $theMostPopular;
    }
}
