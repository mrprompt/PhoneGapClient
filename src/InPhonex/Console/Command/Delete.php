<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Console\Command;

use InPhonex\Console\ReadConfiguration;
use InPhonex\PhoneGap\Delete as DeleteService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Retrieve Delete from an application
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Delete extends Command
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
            ->setName('builder:delete')
            ->setDescription('Delete an application')
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The application ID on Builder'
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
        $clientId       = $this->config['phonegap']['client_id'];
        $clientSecret   = $this->config['phonegap']['client_secret'];
        $authToken      = $this->config['phonegap']['auth_token'];

        $client = new DeleteService($clientId, $clientSecret, $authToken);
        $app = $client->deleteApplication($applicationId);
        
        $output->writeln($app['success']);
    }
}
