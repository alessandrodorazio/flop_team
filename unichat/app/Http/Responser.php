<?php

namespace App\Http;

class Responser
{
    public $response;

    public function response()
    {
        if (!isset($this->response['showMessage'])) {
            $this->response['showMessage'] = false;
        }
        if (!isset($this->response['success'])) {
            $this->response['success'] = false;
        }

        return response()->json($this->response);
    }

    public function success()
    {
        $this->response['success'] = true;
        return $this;
    }
    public function failed()
    {
        $this->response['success'] = false;
        return $this;
    }

    public function message($message_code)
    {
        $this->response['message'] = trans($message_code);
        return $this;
    }
    public function messageWithParam($message_code, $param)
    {
        $this->response['message'] = trans($message_code, $param);
        return $this;
    }
    public function withLink($title, $url)
    {
        $this->response['link']['title'] = $title;
        $this->response['link']['url'] = $url;
        return $this;
    }

    public function showMessage()
    {
        $this->response['showMessage'] = true;
        return $this;
    }
    public function notShowMessage()
    {
        $this->response['showMessage'] = false;
        return $this;
    }

    public function item($item_name, $item)
    {
        $this->response[$item_name] = $item;
        return $this;
    }
}
