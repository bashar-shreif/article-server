<?php

class ResponseService
{

    public static function response($succeeded, $payload)
    {
        $response = [];
        if ($succeeded)
            $response["status"] = 200;
        else
            $response["status"] = 500;
        $response["payload"] = $payload;
        return json_encode($response);
    }

}