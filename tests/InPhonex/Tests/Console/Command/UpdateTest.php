<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Update as UpdateCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Update Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class UpdateTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Update::configure
     * @covers \InPhonex\Console\Command\Update::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new UpdateCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Update::configure
     * @covers \InPhonex\Console\Command\Update::execute
     * @expectedException \InvalidArgumentException
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new UpdateCommand());
        $commandTester->execute(['id' => '1353395', 'filename' => 'test.zip']);
    }
}

