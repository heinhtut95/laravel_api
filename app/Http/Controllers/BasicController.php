<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class BasicController extends Controller
{
    protected $statusCode;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    public function responseNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->responseError($message);
    }

    public function responseError($message)
    {
        return $this->response([
            'status'=>'fail',
            'error'=>[
                'status_code'=>$this->getStatusCode(),
                'msg'=>$message
            ]
        ]);
    }

    public function response($data)
    {
        return Response::json($data);
    }
}
