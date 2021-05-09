<?php declare(strict_types=1);

namespace App\Messenger;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\PhpSerializer;

class MessengerSerializer extends PhpSerializer
{
    /**
     * {@inheritdoc}
     */
    public function encode(Envelope $envelope): array
    {
        return [
            'body' => json_encode($envelope->getMessage())
        ];
    }
}
