<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

trait ApiResponseService
{
    protected $data = null;
    protected $message;
    protected $code;
    protected $errors = [];

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function success($message = '', $data = null)
    {
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => $message ?? $this->getMessage(),
            'data' => $data ?? $this->getData(),
        ]);
    }

    public function error($message = '', $errors = [], $data = null, $code = 500)
    {
        return response()->json([
            'success' => false,
            'code' => $this->getCode() ?? $code,
            'message' => $message ?? $this->getMessage(),
            'data' =>$data ?? $this->getData(),
            'errors' => $errors ?? $this->getErrors(),
        ]);
    }

    public function systemError()
    {
        return response()->json([
            'success' => false,
            'code' => 500,
            'message' => __('messages.system_error'),
        ]);
    }
}
