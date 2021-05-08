<?php declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ClientInterface
{
    /**
     * @param bool $live
     *
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function __invoke(bool $live): ResponseInterface;
}
