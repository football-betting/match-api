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
    public function __invoke(): CompetitionDataProvider
    {
        $client = new Client();
        $uri = $this->apiUrI;
        $header = [
             self::HEADERS => [
                self::X_Auth_Token => $this->apiToken
            ]
        ];
        $response = $client->get($uri, $header);
        $json = $response->getBody()->getContents();

        $competitionDataProvider = new CompetitionDataProvider();
        $responseArray = is_array(json_decode($json, true)) ? (array)json_decode($json, true) : [];

        $competitionDataProvider->fromArray($responseArray);

        return $competitionDataProvider;
    }
}
