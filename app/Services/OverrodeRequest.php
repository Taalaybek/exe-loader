<?php


namespace App\Services;


use Illuminate\Http\Request;

class OverrodeRequest extends Request
{

    /**
     * @return mixed|string|null
     */
    public function getRealIp()
    {
        $ip = '';
        if ($this->ip() !== '127.0.0.1') {
            $ip = $this->ip();
        }

        if (isset($_SERVER['HTTP_X_REAL_IP']) and $_SERVER['HTTP_X_REAL_IP'] !== '127.0.0.1') {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }

        if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            $http_x_headers = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
            if ($http_x_headers[0] !== '127.0.0.1') {
                $ip = $http_x_headers[0];
            }
        }

        if (isset($_SERVER['REMOTE_ADDR']) and $_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if (empty($ip)) {
            $ip = '127.0.0.1';
        }

        return $ip;
    }
}