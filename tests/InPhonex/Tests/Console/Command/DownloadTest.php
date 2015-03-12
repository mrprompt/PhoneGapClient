<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Download as DownloadCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Download Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class DownloadTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Download::configure
     * @covers \InPhonex\Console\Command\Download::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new DownloadCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Download::configure
     * @covers \InPhonex\Console\Command\Download::execute
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new DownloadCommand());
        $commandTester->execute(['id' => '1352733', 'platform' => 'android']);

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}

