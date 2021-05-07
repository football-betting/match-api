<?php declare(strict_types=1);


namespace App\Service;


use App\DataTransferObject\CompetitionDataProvider;
use GuzzleHttp\Client;

class Request
{
    private const X_Auth_Token = 'X-Auth-Token';
    private const HEADERS = 'headers';

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


    public function __invoke()
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

        $test = new CompetitionDataProvider();
        $test->fromArray(json_decode($json, true));
        dump($test);die;
    }
}
