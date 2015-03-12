<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Pack as PackCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Pack Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class PackTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Pack::configure
     * @covers \InPhonex\Console\Command\Pack::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new PackCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Pack::configure
     * @covers \InPhonex\Console\Command\Pack::execute
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new PackCommand());
        $commandTester->execute(['path' => __DIR__, 'filename' => sys_get_temp_dir() . '/test.zip']);

        $this->assertRegExp('/[0-9]+/', $commandTester->getDisplay());

        unlink(sys_get_temp_dir() . '/test.zip');
    }
}

