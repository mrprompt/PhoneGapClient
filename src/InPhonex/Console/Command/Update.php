<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Console\Command;

use InPhonex\Console\ReadConfiguration;
use InPhonex\PhoneGap\Update as UpdaterService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\Table;

/**
 * Update application
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Update extends Command
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
            ->setName('builder:update')
            ->setDescription('Update application')
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The application ID on Builder'
            )
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'The application zip file'
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
        $id           = $input->getArgument('id');
        $file           = $input->getArgument('file');
        $clientId       = $this->config['phonegap']['client_id'];
        $clientSecret   = $this->config['phonegap']['client_secret'];
        $authToken      = $this->config['phonegap']['auth_token'];

        $client = new UpdaterService($clientId, $clientSecret, $authToken);
        $app = $client->updateApplication($id, $file);

        $table = new Table($output);
        $table->setHeaders(
            [
                '#', 
                'Title', 
                'Version', 
                'Last build', 
                'Android', 
                'iOS', 
                'WinPhone'
            ]
        );
        
        $table->addRow(
            [
                $app['id'],
                $app['title'],
                $app['version'],
                $app['last_build'],
                $app['status']['android'],
                $app['status']['ios'],
                $app['status']['winphone'],
            ]
        );

        $table->render();
    }
}
