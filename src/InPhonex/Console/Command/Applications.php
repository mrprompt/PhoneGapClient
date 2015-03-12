<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Console\Command;

use InPhonex\Console\ReadConfiguration;
use InPhonex\PhoneGap\Applications as ApplicationService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

/**
 * List all applications on builder
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Applications extends Command
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
            ->setName('builder:applications')
            ->setDescription('List all applications on builder');

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
        $clientId       = $this->config['phonegap']['client_id'];
        $clientSecret   = $this->config['phonegap']['client_secret'];
        $authToken      = $this->config['phonegap']['auth_token'];

        $client = new ApplicationService($clientId, $clientSecret, $authToken);
        $applications = $client->listApplications();

        $table = new Table($output);
        $table->setHeaders(array('#', 'Title', 'Version', 'Last build', 'Android', 'iOS', 'WinPhone'));

        foreach ($applications['apps'] as $app) {
            $table->addRow([
                $app['id'],
                $app['title'],
                $app['version'],
                $app['last_build'],
                $app['status']['android'],
                $app['status']['ios'],
                $app['status']['winphone'],
            ]);
        }

        $table->render();
    }
}
