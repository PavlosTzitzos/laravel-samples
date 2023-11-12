<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * Success response
     */
    public function responseSuccess($data,$message = "Successful") : JsonResponse
    {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => null
        ]);
    }

    /**
     *
     */
    public function responseError($errors,$message = "Something went wrong.") : JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'data'    => null,
            'errors'  => $errors
        ]);
    }

}
