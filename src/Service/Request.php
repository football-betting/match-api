<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\CompetitionDataProvider;
use GuzzleHttp\Client;

class Request
{
    private const X_Auth_Token = 'X-Auth-Token';
    private const HEADERS = 'headers';
    private const LIVE_STATUS = '?status=LIVE';

    private string $apiUrI;
    private string $apiToken;

    /**
     * Request constructor.
     *
     * @param string $apiUrI
     * @param string $apiToken
     */
    public function __construct(
        string $apiUrI,
        string $apiToken
    )
    {
        $this->apiUrI = $apiUrI;
        $this->apiToken = $apiToken;
    }

    /**
     * @return \App\DataTransferObject\CompetitionDataProvider
     */
    public function __invoke(bool $live): CompetitionDataProvider
    {
        $client = new Client();
        $uri = $live ? $this->apiUrI . self::LIVE_STATUS : $this->apiUrI;
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
