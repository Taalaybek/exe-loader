<?php


namespace App\Http;


use Illuminate\Http\Request as BaseRequest;

class OverrodeRequest extends BaseRequest
{
    protected $ip = '127.0.0.1';
    /**
     * @return mixed|string|null
     */
    public function getRealIp()
    {
        static::ip();
        if ($this->ip() != '127.0.0.1') {
            $this->ip = $this->ip();
        }

        if (isset($_SERVER['HTTP_X_REAL_IP']) and $_SERVER['HTTP_X_REAL_IP']) {
            if (!is_null($_SERVER['HTTP_X_REAL_IP'])) {
                $this->ip = $_SERVER['HTTP_X_REAL_IP'];
            }
        }

        if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            $http_x_headers = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
            if ($http_x_headers[0] != '127.0.0.1' and !is_null($http_x_headers[0])) {
                $this->ip = $http_x_headers[0];
            }
        }

        if (isset($_SERVER['REMOTE_ADDR']) and $_SERVER['REMOTE_ADDR']) {
            if (!is_null($_SERVER['REMOTE_ADDR'])) {
                $this->ip = $_SERVER['REMOTE_ADDR'];
            }
        }

        if (!is_null($this->ip)) {
            return $this->ip;
        }

        return $this->ip;
    }
}