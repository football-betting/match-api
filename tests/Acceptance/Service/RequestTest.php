<?php declare(strict_types=1);

namespace App\Tests\Acceptance\Service;

use App\Service\Request;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RequestTest extends KernelTestCase
{
    private const TOTAL_MATCHES_GROUP_STAGE = 36;

    public function testSuccessfulWithoutLiveFlag(): void
    {
        self::bootKernel();

        /** @var Request $request */
        $request = self::$container->get(Request::class);

        $competitionDataProvider = $request(false);

        self::assertSame(self::TOTAL_MATCHES_GROUP_STAGE, $competitionDataProvider->getCount());
        self::assertCount(self::TOTAL_MATCHES_GROUP_STAGE, $competitionDataProvider->getMatches());
    }
}
