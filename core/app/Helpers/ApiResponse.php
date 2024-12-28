<?php

namespace App\Helpers;
use App\Helpers\HttpResponseCode;
use App\Models\ApiMessage;

class ApiResponse
{
    public static function response($messageCode, $data = null, $errors = null)
    {
        $response = new ApiResponse;
        $response->ip_applicant = $_SERVER['REMOTE_ADDR'];

        switch ($messageCode) {
            case 1:
                $response->status = HttpResponseCode::OK();
                $response->success = true;
                $response->errors = null;
                break;
            case 2:
                $response->status = HttpResponseCode::NO_CONTENT();
                $response->success = false;
                $data = null;
                $response->errors = $errors;
                break;
            default:
                $response->status = HttpResponseCode::BAD_REQUEST();
                $response->success = false;
                $response->errors = $errors;
                break;
        }

        $response->message = $messageCode;
        $response->data = $data !== null ? $data : null; // Corrección aquí

        return ApiResponse::serveToUser($response);
    }

    public static function serveToUser($response)
    {
        $apiMessage = ApiMessage::find($response->message);

        return [
            "ip_applicant" => $response->ip_applicant,
            'status' => $apiMessage ? $apiMessage->http_status : HttpResponseCode::BAD_REQUEST(),
            'success' => $response->success,
            'message' => $apiMessage ? $apiMessage : 'Mensaje no encontrado',
            'data' => $response->data ? (is_array($response->data) ? $response->data : [$response->data]) : null,
            'errors' => $response->errors
        ];
    }
}
