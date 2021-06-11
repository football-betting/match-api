<?php declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\DataTransferObject\MatchDataProvider;
use App\DataTransferObject\ResponseMatchDataProvider;
use App\Service\MatchMapper;
use PHPUnit\Framework\TestCase;

class MatchMapperTest extends TestCase
{
    /**
     * @dataProvider provideDataProviders
     *
     * @param \App\DataTransferObject\MatchDataProvider $expectedTestMatchDataProvider
     * @param \App\DataTransferObject\ResponseMatchDataProvider $testResponseMatchDataProvider
     */
    public function testWithoutMissingProperty(
        MatchDataProvider $expectedTestMatchDataProvider,
        ResponseMatchDataProvider $testResponseMatchDataProvider
    ): void
    {
        $matchMapper = new MatchMapper();

        $matchDataProvider = $matchMapper($testResponseMatchDataProvider);

        self::assertSame($expectedTestMatchDataProvider->getEvent(), $matchDataProvider->getEvent());
        self::assertSame($expectedTestMatchDataProvider->getData()->getMatchId(), $matchDataProvider->getData()->getMatchId());
        self::assertSame($expectedTestMatchDataProvider->getData()->getTeam1(), $matchDataProvider->getData()->getTeam1());
        self::assertSame($expectedTestMatchDataProvider->getData()->getTeam2(), $matchDataProvider->getData()->getTeam2());
        self::assertSame($expectedTestMatchDataProvider->getData()->getMatchDatetime(), $matchDataProvider->getData()->getMatchDatetime());
        self::assertSame($expectedTestMatchDataProvider->getData()->getScoreTeam1(), $matchDataProvider->getData()->getScoreTeam1());
        self::assertSame($expectedTestMatchDataProvider->getData()->getScoreTeam2(), $matchDataProvider->getData()->getScoreTeam2());
    }

    /**
     * @dataProvider provideDataProviders
     *
     * @param \App\DataTransferObject\MatchDataProvider $expectedTestMatchDataProvider
     * @param \App\DataTransferObject\ResponseMatchDataProvider $testResponseMatchDataProvider
     */
    public function testWithMissingDateTime(
        MatchDataProvider $expectedTestMatchDataProvider,
        ResponseMatchDataProvider $testResponseMatchDataProvider
    ): void
    {
        $matchMapper = new MatchMapper();
        $testResponseMatchDataProvider->setUtcDate('');

        $this->expectException(\RuntimeException::class);
        $matchMapper($testResponseMatchDataProvider);
    }

    /**
     * @dataProvider provideDataProviders
     *
     * @param \App\DataTransferObject\MatchDataProvider $expectedTestMatchDataProvider
     * @param \App\DataTransferObject\ResponseMatchDataProvider $testResponseMatchDataProvider
     */
    public function testWithNotExistingCountry(
        MatchDataProvider $expectedTestMatchDataProvider,
        ResponseMatchDataProvider $testResponseMatchDataProvider
    ): void
    {
        $matchMapper = new MatchMapper();
        $testResponseMatchDataProvider->getHomeTeam()->setName('TEST123');

        $this->expectException(\RuntimeException::class);
        $matchMapper($testResponseMatchDataProvider);
    }

    /**
     * @return array
     */
    public function provideDataProviders(): array
    {
        $matchDataProvider = new MatchDataProvider();
        $matchDataProvider->fromArray(
            [
                'event' => 'match.api',
                'data' => [
                    'matchId' => '2020-06-16:2300:FR-DE',
                    'team1' => 'FR',
                    'team2' => 'DE',
                    'matchDatetime' => '2020-06-16 23:00',
                    'scoreTeam1' =>  null,
                    'scoreTeam2' =>  null
                ]
            ]
        );

        $responseMatchDataProvider = new ResponseMatchDataProvider();
        $responseMatchDataProvider->fromArray(
            [
                'utcDate' => '2020-06-16T21:00:00Z',
                'homeTeam' => [
                    'name' => 'France'
                ],
                'awayTeam' => [
                    'name' => 'Germany'
                ],
                'score' => [
                    'fullTime' => [
                        'homeTeam' => null,
                        'awayTeam' => null
                    ]
                ]
            ]
        );

        return [
            [
                'expectedTestMatchDataProvider' => $matchDataProvider,
                'testResponseMatchDataProvider' => $responseMatchDataProvider
            ]
        ];
    }
}
