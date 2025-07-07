<?php

namespace App\Service;

class ResponseService
{
  public static function success($data, $message = "Data fetched successfully")
  {
    return [
      'success' => true,
      'data' => $data,
      'message' => $message,
    ];
  }

  public static function error($message = "Something went wrong")
  {
    return [
      'success' => false,
      'data' => null,
      'message' => $message,

    ];
  }
}
