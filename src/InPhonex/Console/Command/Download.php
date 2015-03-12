<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Console\Command;

use InPhonex\Console\ReadConfiguration;
use InPhonex\PhoneGap\Download as DownloadService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Download an application
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Download extends Command
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
            ->setName('builder:download')
            ->setDescription('Download an application')
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The application ID on Builder'
            )
            ->addArgument(
                'platform',
                InputArgument::REQUIRED,
                'The application platform'
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
        $applicationId  = $input->getArgument('id');
        $platform       = $input->getArgument('platform');
        $clientId       = $this->config['phonegap']['client_id'];
        $clientSecret   = $this->config['phonegap']['client_secret'];
        $authToken      = $this->config['phonegap']['auth_token'];

        $client = new DownloadService($clientId, $clientSecret, $authToken);
        $app = $client->statusApplication($applicationId, $platform);
        
        $output->writeln(
            sprintf('Downloaded %s application to %s', $platform, $app)
        );
    }
}
