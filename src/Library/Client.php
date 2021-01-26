<?php
namespace Espora\SimpliRouteApi\Library;

use Illuminate\Support\Facades\Http;

class Client {
    function __construct($token) {
        $this->token = $token;
    }

    /**
     * Retrieves the
     *
     * @return void
     */
    public function findVisitsByReference($reference) {
        $response = $this->request("/routes/visits/reference/{$reference}");
        return $response;
    }

    /**
     * Makes the request
     *
     * @param string $endpoint
     * @param string $method
     * @param array $payload
     * @param string $baseUri
     * @return \Illuminate\Http\Client\Response
     */
    private function request($endpoint, $method = 'get', $payload = null, $baseUri = null, $timeout = null)
    {
        $_baseUri = 'https://api.simpliroute.com/v1';
        if ($baseUri) {
            $_baseUri = $baseUri;
        }
        $url = "{$_baseUri}{$endpoint}";

        $http = Http::withHeaders([
            'content-type' => 'application/json',
            'accept' => 'application/json',
            'authorization' => "Token {$this->token}"
        ]);

        if ($timeout !== null) {
            $http->timeout($timeout);
        }

        $response = $http->$method($url, $payload);
        return $response;
    }
}
