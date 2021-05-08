<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\DataDataProvider;
use App\DataTransferObject\MatchDataProvider;
use App\DataTransferObject\ResponseMatchDataProvider;
use App\IsoCodeConfig;

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
            ->setMatchDatetime($this->getMatchDatetime($responseMatchDataProvider))
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
     * @param \App\DataTransferObject\ResponseMatchDataProvider $responseMatchDataProvider
     *
     * @return string
     */
    private function getMatchDatetime(ResponseMatchDataProvider $responseMatchDataProvider): string
    {
        $timeStamp = strtotime($responseMatchDataProvider->getUtcDate());

        return $timeStamp !== false ? date('Y-m-d H:i', $timeStamp) : $responseMatchDataProvider->getUtcDate();
    }

    /**
     * @param string $countryName
     *
     * @return string
     */
    private function getCountryIsCode(string $countryName): string
    {
        return IsoCodeConfig::ISO_CODES[$countryName] ?? '';
    }
}
