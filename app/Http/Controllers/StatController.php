<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Services\AdminServices\LikeStatService;

class StatController extends Controller
{
    private $likeStatService = null;

    public function __construct(LikeStatService $likeStatService)
    {
        $this->likeStatService = $likeStatService;
    }

    public function index()
    {
        if(auth()->id() == 2) {
            $product = $this->likeStatService->getStat();
            return view('admin.show',compact('product'));
        }
    }
}
