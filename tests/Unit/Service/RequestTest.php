<?php declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\Request;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private const TOTAL_MATCHES_GROUP_STAGE = 36;

    public function testSuccessful()
    {
        $request = new Request(getenv('API_URI'), getenv('X_Auth_Token'));
        $competitionDataProvider = $request();

        self::assertNotNull($competitionDataProvider);
        self::assertGreaterThanOrEqual(self::TOTAL_MATCHES_GROUP_STAGE, $competitionDataProvider->getCount());
        self::assertCount($competitionDataProvider->getCount(), $competitionDataProvider->getMatches());
    }

    public function testWithWrongUrlAndToken()
    {
        $request = new Request('', '');
        $this->expectException(RequestException::class);
        $request();
    }
}
