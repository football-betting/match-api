<?php declare(strict_types=1);


namespace App\Communication\Command;

use App\Service\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MatchCommand extends Command
{
    private const COMMAND = 'football:matches';
    private const DESCRIPTION = 'Get all live matches';
    /**
     * @var \Service\Request
     */
    private Request $request;


    /**
     * MatchCommand constructor.
     *
     * @param \Service\Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;
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
        ($this->request)();

        return 1;
    }
}
