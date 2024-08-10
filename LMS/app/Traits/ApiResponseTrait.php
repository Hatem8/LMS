<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Send a success response.
     *
     * @param string $message
     * @param mixed $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($message, $data = null, $statusCode = 200)
    {
        if ($data != null){
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
        }
        return response()->json([
            'success' => true,
            'message' => $message,
        ], $statusCode);

    }
}
