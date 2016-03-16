<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    protected $status_code = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @param int $status_code
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
        return $this;
    }

    public function responseNotFound($message = 'Not found')
    {
        return $this->setStatusCode('404')->responseError($message);
    }

    public function responseError($message)
    {
        return $this->response([
            'status'=>'error',
            'errors'=>[
                'status_code'=>$this->getStatusCode(),
                'msg'=>$message
            ]
        ]);
    }

    public function response($data)
    {
        return Response::json($data,$this->getStatusCode());
    }
}
