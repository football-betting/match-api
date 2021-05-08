<?php declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\DataTransferObject\DataDataProvider;
use App\DataTransferObject\MatchDataProvider;
use App\Service\Message;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

class MessageTest extends TestCase
{
    public function testSend(): void
    {
        $messageBusStub = new class implements MessageBusInterface {
            public \stdClass $message;

            public function dispatch($message, array $stamps = []): Envelope
            {
                $this->message = $message;
                return new Envelope(new \stdClass());
            }
        };

        $message = new Message($messageBusStub);

        $testDataProvider = $this->getTestDataProvider();

        $message->send($testDataProvider);

        $messageResponse = new MatchDataProvider();
        $messageResponse->fromArray(get_object_vars($messageBusStub->message));

        self::assertSame($messageResponse->getEvent(), $testDataProvider->getEvent());
        self::assertSame($messageResponse->getData()->getMatchId(), $testDataProvider->getData()->getMatchId());
        self::assertSame($messageResponse->getData()->getTeam1(), $testDataProvider->getData()->getTeam1());
        self::assertSame($messageResponse->getData()->getTeam2(), $testDataProvider->getData()->getTeam2());
        self::assertSame($messageResponse->getData()->getMatchDatetime(), $testDataProvider->getData()->getMatchDatetime());
        self::assertSame($messageResponse->getData()->getScoreTeam1(), $testDataProvider->getData()->getScoreTeam1());
        self::assertSame($messageResponse->getData()->getScoreTeam2(), $testDataProvider->getData()->getScoreTeam2());
    }

    /**
     * @return \App\DataTransferObject\MatchDataProvider
     */
    private function getTestDataProvider(): MatchDataProvider
    {
        return (new MatchDataProvider())
            ->setEvent('match.api')
            ->setData(
                (new DataDataProvider())
                    ->setMatchId('2020-06-16:2100:FR-DE')
                    ->setTeam1('FR')
                    ->setTeam2('DE')
                    ->setMatchDatetime('2020-06-16 21:00')
                    ->setScoreTeam1(null)
                    ->setScoreTeam2(null)
            );
    }
}
