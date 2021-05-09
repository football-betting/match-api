<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\DataDataProvider;
use App\DataTransferObject\MatchDataProvider;
use App\DataTransferObject\ResponseMatchDataProvider;
use App\IsoCodeConfig;
use DateTime;
use RuntimeException;

class MatchMapper
{
    private const EVENT = 'match.api';
    private const HYPHEN = '-';

    /**
     * @param \App\DataTransferObject\ResponseMatchDataProvider $responseMatchDataProvider
     *
     * @return \App\DataTransferObject\MatchDataProvider
     */
    public function __invoke(ResponseMatchDataProvider $responseMatchDataProvider): MatchDataProvider
    {
        $matchDataProvider = new MatchDataProvider();
        $dataDataProvider = new DataDataProvider();

        $dataDataProvider
            ->setMatchId($this->getMatchId($responseMatchDataProvider))
            ->setTeam1($this->getCountryIsCode($responseMatchDataProvider->getHomeTeam()->getName()))
            ->setTeam2($this->getCountryIsCode($responseMatchDataProvider->getAwayTeam()->getName()))
            ->setMatchDatetime($this->getMatchDatetime($responseMatchDataProvider->getUtcDate()))
            ->setScoreTeam1($responseMatchDataProvider->getScore()->getFullTime()->getHomeTeam())
            ->setScoreTeam2($responseMatchDataProvider->getScore()->getFullTime()->getAwayTeam());

        $matchDataProvider
            ->setEvent(self::EVENT)
            ->setData(
                $dataDataProvider
            );

        return $matchDataProvider;
    }

    /**
     * @param \App\DataTransferObject\ResponseMatchDataProvider $responseMatchDataProvider
     *
     * @return string
     */
    private function getMatchId(ResponseMatchDataProvider $responseMatchDataProvider): string
    {
        $timeStamp = strtotime($responseMatchDataProvider->getUtcDate());
        $timeAsString = $timeStamp !== false ? date('Y-m-d:Hi:', $timeStamp) : $responseMatchDataProvider->getUtcDate();

        return
            $timeAsString .
            $this->getCountryIsCode($responseMatchDataProvider->getHomeTeam()->getName()) .
            self::HYPHEN .
            $this->getCountryIsCode($responseMatchDataProvider->getAwayTeam()->getName());
    }

    /**
     * @param string $utcDate
     *
     * @return string
     */
    private function getMatchDatetime(string $utcDate): string
    {
        if (empty($utcDate)) {
            throw new RuntimeException(sprintf('Time for %s is incorrect', $utcDate));
        }


        $dateTime = new DateTime($utcDate);
        $date = $dateTime->format('Y-m-d H:i');

        if (!is_string($date)) {
            throw new RuntimeException(sprintf('Time for %s is incorrect', $utcDate));
        }

        return $date;
    }

    /**
     * @param string $countryName
     *
     * @return string
     */
    private function getCountryIsCode(string $countryName): string
    {
        if (isset(IsoCodeConfig::ISO_CODES[$countryName])) {
            return IsoCodeConfig::ISO_CODES[$countryName];
        }

        throw new RuntimeException(sprintf('ISO Code not found for countryName: %s', $countryName));
    }
}
