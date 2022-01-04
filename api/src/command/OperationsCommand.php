<?php
namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use src\Controller\CalculatorController;

class OperationsCommand extends Command
{
    protected static $defaultName = 'app:operations';
    protected static $defaultDescription = 'Mathematical operations with two numbers';

    protected function configure(): void
    {
        $this
        ->addArgument('operator1', InputArgument::REQUIRED, 'number 1')
        ->addArgument('operator2', InputArgument::REQUIRED, 'number 2')
        ->addArgument('operation', InputArgument::REQUIRED, 'operation')
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try{
            $calculator = new Calculator();
            $number1=$input->getArgument('operator1');
            $number2=$input->getArgument('operator2');
            $operation=$input->getArgument('operation');
            $output->writeln($calculator->calculateAction($operation,$number1,$number2));
            return Command::SUCCESS;

        }catch(\Exception $e){
            return Command::FAILURE;
        }
    }

}