<?php
/**
 * BaseController 
 * 
 * @author Mustafa Omran <promustafaomran@hotmail.com>
 */
namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller {

    const SUCCESS = 200;
    const ERROR = 404;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message) {
        $response = [
            'code'=> self::SUCCESS,
            'status' => true,
            'data' => $result,
            'message' => $message,
        ];


        return response()->json($response, self::SUCCESS);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = self::ERROR) {
        $response = [
            'code'=> self::ERROR,
            'status' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

}
