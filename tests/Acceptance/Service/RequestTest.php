<?php declare(strict_types=1);

namespace App\Tests\Acceptance\Service;

use App\Service\Client;
use App\Service\Request;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\MockHttpClient;

class RequestTest extends KernelTestCase
{
    private const TOTAL_MATCHES = 51;
    private const COMPETITION_NAME = 'European Championship';

    public function testSuccessfulWithoutLiveFlag(): void
    {
        self::bootKernel();

        /** @var Request $request */
        $request = self::$container->get(Request::class);

        $competitionDataProvider = $request(false);

        self::assertSame(self::TOTAL_MATCHES, $competitionDataProvider->getCount());
        self::assertCount(self::TOTAL_MATCHES, $competitionDataProvider->getMatches());
    }

    public function testWithLiveFlag()
    {
        self::bootKernel();

        /** @var Request $request */
        $request = self::$container->get(Request::class);

        $competitionDataProvider = $request(true);

        self::assertSame(self::COMPETITION_NAME, $competitionDataProvider->getCompetition()->getName());
    }

    public function testWithWrongUrlAndToken(): void
    {
        /** @var \Symfony\Contracts\HttpClient\HttpClientInterface $httpClient */
        $httpClient = new MockHttpClient();
        $client = new Client($httpClient, '', '', '');
        $request = new Request($client);

        $this->expectException(\InvalidArgumentException::class);

        $request(false);
    }
}
