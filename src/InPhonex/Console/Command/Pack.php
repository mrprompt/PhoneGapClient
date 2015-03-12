<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Console\Command;

use Alchemy\Zippy\Zippy;
use InPhonex\Console\ReadConfiguration;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Create a zip package from source directory
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Pack extends Command
{
    use ReadConfiguration;

    /**
     * Show helper
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('builder:pack')
            ->setDescription('Create a zip package from source directory')
            ->addArgument(
                'path',
                InputArgument::REQUIRED,
                'The application source directory'
            )
            ->addArgument(
                'filename',
                InputArgument::REQUIRED,
                'The destination filename to create'
            );

        $this->loadConfigFile();
    }

    /**
     * Execute command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path  = $input->getArgument('path');
        $file  = $input->getArgument('filename');

        chdir($path);

        $zippy = Zippy::load();
        $archive = $zippy->create($file, '.', true);

        $output->writeln($archive->count());
    }
}
