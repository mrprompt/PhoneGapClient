<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Create as CreateCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Create Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class CreateTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Create::configure
     * @covers \InPhonex\Console\Command\Create::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new CreateCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Create::configure
     * @covers \InPhonex\Console\Command\Create::execute
     * @expectedException \InvalidArgumentException
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new CreateCommand());
        $commandTester->execute(['title' => 'Test', 'filename' => 'test.zip']);
    }
}

