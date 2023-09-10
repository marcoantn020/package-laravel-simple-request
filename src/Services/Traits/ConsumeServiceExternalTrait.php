<?php

namespace Marcoantn020\MicroservicesCommon\Services\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumeServiceExternalTrait
{
    public function request(
        string $method,
        string $endpoint,
        array  $formsParams = [],
        array  $headers = []
    )
    {
        return $this->headers($headers)
            ->$method($this->url . $endpoint, $formsParams);
    }

    public function headers(array $headers = []): \Illuminate\Http\Client\PendingRequest
    {
        $headers[] = [
            'Accept' => 'application/json',
            'Authorization' => $this->token
        ];
        return Http::withHeaders($headers);
    }

}
