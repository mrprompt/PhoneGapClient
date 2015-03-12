<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Delete as DeleteCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Delete Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Delete::configure
     * @covers \InPhonex\Console\Command\Delete::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new DeleteCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Delete::configure
     * @covers \InPhonex\Console\Command\Delete::execute
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new DeleteCommand());
        $commandTester->execute(['id' => '1352733']);

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}

