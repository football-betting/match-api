<?php declare(strict_types=1);

namespace App\Service;

use App\DataTransferObject\MatchDataProvider;
use Symfony\Component\Messenger\MessageBusInterface;

final class Message
{
    /**
     * @var \Symfony\Component\Messenger\MessageBusInterface
     */
    private MessageBusInterface $messageBus;

    /**
     * @param \Symfony\Component\Messenger\MessageBusInterface $messageBus
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @param \App\DataTransferObject\MatchDataProvider $matchDataProvider
     */
    public function send(MatchDataProvider $matchDataProvider): void
    {
        $this->messageBus->dispatch((object)$matchDataProvider->toArray());
    }
}
