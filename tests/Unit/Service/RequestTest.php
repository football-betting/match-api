<?php declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\Request;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private const TOTAL_MATCHES_GROUP_STAGE = 36;
    private const COMPETITION_NAME = 'European Championship';

    public function testSuccessfulWithoutLiveFlag(): void
    {
        $request = new Request(getenv('API_URI' ), getenv('X_Auth_Token'));

        $competitionDataProvider = $request(false);

        self::assertGreaterThanOrEqual(self::TOTAL_MATCHES_GROUP_STAGE, $competitionDataProvider->getCount());
        self::assertCount($competitionDataProvider->getCount(), $competitionDataProvider->getMatches());
    }

    public function testWithWrongUrlAndTokenWithoutLiveFlag(): void
    {
        $request = new Request('', '');

        $this->expectException(RequestException::class);

        $request(false);
    }

    public function testWithLiveFlag()
    {
        $request = new Request(getenv('API_URI' ), getenv('X_Auth_Token'));

        $competitionDataProvider = $request(true);

        self::assertSame(self::COMPETITION_NAME, $competitionDataProvider->getCompetition()->getName());
    }
}
