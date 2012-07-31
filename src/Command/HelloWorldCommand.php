<?php

namespace Command;

use Slimfra\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This is an example console command registered from `console`.
 * For more on how to use the console component, see the Symfony documentation
 * here: http://symfony.com/doc/current/components/console.html
 */
class HelloWorldCommand extends Command
{
	protected function configure()
    {
        $this->setName("hello")->setDescription("Says Hello on the command line.");
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Hello world!");
    }
}