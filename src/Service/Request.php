<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\CompetitionDataProvider;
use GuzzleHttp\Client;

class Request
{
    private const X_Auth_Token = 'X-Auth-Token';
    private const HEADERS = 'headers';

    private string $apiUri;
    private string $apiToken;
    private string $apiUriLive;

    /**
     * Request constructor.
     *
     * @param string $apiUri
     * @param string $apiToken
     * @param string $apiUriLive
     */
    public function __construct(
        string $apiUri,
        string $apiToken,
        string $apiUriLive,
    )
    {
        $this->apiUri = $apiUri;
        $this->apiToken = $apiToken;
        $this->apiUriLive = $apiUriLive;
    }

    /**
     * @return \App\DataTransferObject\CompetitionDataProvider
     */
    public function __invoke(bool $live): CompetitionDataProvider
    {
        $client = new Client();
        $uri = $live ? $this->apiUriLive : $this->apiUri;
        $header = [
             self::HEADERS => [
                self::X_Auth_Token => $this->apiToken
            ]
        ];
        $response = $client->get($uri, $header);
        $json = $response->getBody()->getContents();

        $competitionDataProvider = new CompetitionDataProvider();
        $responseArray = $this->getResponseAsArray($json);

        $competitionDataProvider->fromArray($responseArray);

        return $competitionDataProvider;
    }

    /**
     * @param string $json
     *
     * @psalm-suppress MixedInferredReturnType
     *
     * @return array
     */
    private function getResponseAsArray(string $json): array
    {
        /**
         * @psalm-suppress MixedReturnStatement
         */
        return is_array(json_decode($json, true)) ? json_decode($json, true) : [];
    }
}
