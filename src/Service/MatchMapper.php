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

        $matchDateTime = $this->getMatchDatetime($responseMatchDataProvider->getUtcDate());

        $dataDataProvider
            ->setMatchId($this->getMatchId($responseMatchDataProvider, $matchDateTime))
            ->setTeam1($this->getCountryIsCode($responseMatchDataProvider->getHomeTeam()->getName()))
            ->setTeam2($this->getCountryIsCode($responseMatchDataProvider->getAwayTeam()->getName()))
            ->setMatchDatetime($matchDateTime)
            ->setScoreTeam1($this->getHomeScore($responseMatchDataProvider))
            ->setScoreTeam2($this->getAwayScore($responseMatchDataProvider));

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
     * @return int|null
     */
    private function getHomeScore(ResponseMatchDataProvider $responseMatchDataProvider): ?int
    {
        $score = $responseMatchDataProvider->getScore()->getFullTime()->getHome();

        if (!$score) {
            return $score;
        }

        if($responseMatchDataProvider->getScore()->getExtraTime() && $responseMatchDataProvider->getScore()->getExtraTime()->getHome()) {
            $score = $score - $responseMatchDataProvider->getScore()->getExtraTime()->getHome();
        }

        if ($responseMatchDataProvider->getScore()->getPenalties() && $responseMatchDataProvider->getScore()->getPenalties()->getHome()) {
            $score = $score - $responseMatchDataProvider->getScore()->getPenalties()->getHome();
        }

        return $score;
    }

    /**
     * @param \App\DataTransferObject\ResponseMatchDataProvider $responseMatchDataProvider
     *
     * @return int|null
     */
    private function getAwayScore(ResponseMatchDataProvider $responseMatchDataProvider): ?int
    {
        $score = $responseMatchDataProvider->getScore()->getFullTime()->getAway();

        if (!$score) {
            return $score;
        }

        if($responseMatchDataProvider->getScore()->getExtraTime() && $responseMatchDataProvider->getScore()->getExtraTime()->getAway()) {
            $score = $score - $responseMatchDataProvider->getScore()->getExtraTime()->getAway();
        }

        if ($responseMatchDataProvider->getScore()->getPenalties() && $responseMatchDataProvider->getScore()->getPenalties()->getAway()) {
            $score = $score - $responseMatchDataProvider->getScore()->getPenalties()->getAway();
        }

        return $score;
    }

    /**
     * @param \App\DataTransferObject\ResponseMatchDataProvider $responseMatchDataProvider
     *
     * @return string
     */
    private function getMatchId(ResponseMatchDataProvider $responseMatchDataProvider, string $matchDateTime): string
    {
        $timeAsString = str_replace(':', '', $matchDateTime);
        $timeAsString = str_replace(' ', ':', $timeAsString) .  ':';

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
        $dateTime->setTimezone(new \DateTimeZone('Europe/Berlin'));
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
