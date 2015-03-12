<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Status as StatusCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Status Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class StatusTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Status::configure
     * @covers \InPhonex\Console\Command\Status::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new StatusCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Status::configure
     * @covers \InPhonex\Console\Command\Status::execute
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new StatusCommand());
        $commandTester->execute(['id' => '1352733']);

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}

