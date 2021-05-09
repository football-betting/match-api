<?php declare(strict_types=1);

namespace App\Service;

use RuntimeException;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Client implements ClientInterface
{
    private const X_Auth_Token = 'X-Auth-Token';
    private const HEADERS = 'headers';

    private string $apiUriLive;

    private string $apiToken;

    private string $apiUri;

    private HttpClientInterface $httpClient;

    public function __construct(
        HttpClientInterface $httpClient,
        string $apiUri,
        string $apiToken,
        string $apiUriLive
    )
    {
        $this->httpClient = $httpClient;
        $this->apiUri = $apiUri;
        $this->apiToken = $apiToken;
        $this->apiUriLive = $apiUriLive;
    }

    /**
     * @param bool $live
     *
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function __invoke(bool $live): ResponseInterface
    {
        $uri = $live ? $this->apiUriLive : $this->apiUri;
        $response = $this->httpClient->request(
            'GET',
            $uri,
            [
                self::HEADERS => [
                    self::X_Auth_Token => $this->apiToken,
                ],
            ]
        );
        $statusCode = $response->getStatusCode();

        if (200 > $statusCode || $statusCode > 299) {
            throw new RuntimeException('Content not found for page: ' . $uri);
        }

        return $response;
    }
}
