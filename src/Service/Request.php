<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\CompetitionDataProvider;
use RuntimeException;

class Request
{
    private ClientInterface $client;

    /**
     * @param \App\Service\ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return \App\DataTransferObject\CompetitionDataProvider
     */
    public function __invoke(bool $live): CompetitionDataProvider
    {
        $client = $this->client;
        $content = $client($live)->getContent();

        $responseArray = (array)json_decode($content, true);

        if (!isset($responseArray['count'])) {
            throw new RuntimeException('Error');
        }

        $competitionDataProvider = new CompetitionDataProvider();

        $competitionDataProvider->fromArray($responseArray);

        return $competitionDataProvider;
    }
}
