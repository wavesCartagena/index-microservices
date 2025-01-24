<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiResponse;

use App\Services\ReviewService;

class ReviewController extends Controller
{
    //

    public function RegisterReviews(Request $request){
        if(isset($request)) {
            return ReviewService::registerReviews($request);
        }else {
            return ApiResponse::response(3, null,null);
        }
    }
    public function getReviewsTop(){
        return ReviewService::getReviewsTop();
    }
}
