<?php

namespace App\Handler;

class Helper{
    /************************************* RESPONSE *************************************/

    private function responseJson($success, $statusCode, $message, $result) {
        return array(
          'status' => [
            'success' => $success,
            'code' => $statusCode,
            'message' => $message
          ],
          'result' => $result
        );
      }

      public function success($message, $data){
        return $this->responseJson(true, 200, $message, $data);
      }

      public function error($message){
        return $this->responseJson(false, 400, $message, null);
      }

      public function invalidation($message){
        return $this->responseJson(false, 400, $message, null);
      }
}