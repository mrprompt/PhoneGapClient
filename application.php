#!/usr/bin/env php
<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
use InPhonex\Console\Command\Authorize as AuthorizeCommand;
use InPhonex\Console\Command\Applications as ApplicationsCommand;
use InPhonex\Console\Command\Status as StatusCommand;
use InPhonex\Console\Command\Build as BuildCommand;
use InPhonex\Console\Command\Pack as PackCommand;
use InPhonex\Console\Command\Create as CreateCommand;
use InPhonex\Console\Command\Update as UpdateCommand;
use InPhonex\Console\Command\Download as DownloadCommand;
use InPhonex\Console\Command\Delete as DeleteCommand;
use Symfony\Component\Console\Application;

require 'bootstrap.php';

$application = new Application();
$application->add(new AuthorizeCommand());
$application->add(new ApplicationsCommand());
$application->add(new StatusCommand());
$application->add(new BuildCommand());
$application->add(new PackCommand());
$application->add(new CreateCommand());
$application->add(new UpdateCommand());
$application->add(new DownloadCommand());
$application->add(new DeleteCommand());
$application->run();
