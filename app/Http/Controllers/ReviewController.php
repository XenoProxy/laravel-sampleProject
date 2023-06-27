<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function addComment(Request $request)
    {
        $commentInfo = $request->all();
        $commentInfo["user_id"] = Auth::id();   
        Review::create($commentInfo);
        echo json_encode($commentInfo);
    }
}
