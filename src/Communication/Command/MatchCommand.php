<?php declare(strict_types=1);


namespace App\Communication\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class MatchCommand extends Command
{
    private const COMMAND = 'football:matches';
    private const DESCRIPTION = 'Get all live matches';
    /**
     * @var \Symfony\Component\Messenger\MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        parent::__construct();
        $this->messageBus = $messageBus;
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
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $test = [
            'bla' => 1,
            'aeg' => 'aegea',
            'aedds' => 'afea'
        ];

        $this->messageBus->dispatch((object)$test);

        return 1;
    }
}
