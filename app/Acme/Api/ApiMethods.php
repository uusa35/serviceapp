<?php namespace App\Acme\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

trait  ApiMethods  {

	//
    public function getJsonSuccess(array $items, $code='200'){
        return Response::json([
            'elements' => [
                'items' => $items,
                'code' => $code
            ]
        ],$code);
    }

    public function getJsonFailure($message ='Error occurred !!', $code ='404') {
        return Response::json([
            'data' => [
                'message' => $message,
                'code'  => $code
            ]
        ],$code);
    }
}
