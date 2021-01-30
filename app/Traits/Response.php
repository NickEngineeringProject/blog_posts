<?php


namespace App\Traits;


trait Response
{
    public $message = [
        'status_error' => '404',
        'status_successful' => '200',
    ];

    public static function json($data, $status) {

        public $data = [];

        if (is_null($data)) {
            return Response()->json([$data => 200], 200);
        }

    }
}
