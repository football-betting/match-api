<?php declare(strict_types=1);


namespace App\Communication\Command;

use App\Service\MatchMapper;
use App\Service\Message;
use App\Service\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MatchCommand extends Command
{
    private const COMMAND = 'football:matches';
    private const DESCRIPTION = 'Get all live matches';
    /**
     * @var \App\Service\Request
     */
    private Request $request;
    /**
     * @var \App\Service\MatchMapper
     */
    private MatchMapper $matchMapper;
    /**
     * @var \App\Service\Message
     */
    private Message $message;

    /**
     * MatchCommand constructor.
     *
     * @param \App\Service\Request $request
     * @param \App\Service\MatchMapper $matchMapper
     * @param \App\Service\Message $message
     */
    public function __construct(
        Request $request,
        MatchMapper $matchMapper,
        Message $message
    )
    {
        parent::__construct();
        $this->request = $request;
        $this->matchMapper = $matchMapper;
        $this->message = $message;
    }

    /**
     *
     */
    protected function configure(): void
    {
        $this
            ->setName(self::COMMAND)
            ->setDescription(self::DESCRIPTION)
        ;

    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $competitionDataProvider = ($this->request)();

        foreach ($competitionDataProvider->getMatches() as $responseMatchDataProvider) {
            $matchDataProvider = ($this->matchMapper)($responseMatchDataProvider);
            $this->message->send($matchDataProvider);
        }

        return 1;
    }
}
