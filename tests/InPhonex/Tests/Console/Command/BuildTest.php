<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Build as BuildCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Build Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class BuildTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Build::configure
     * @covers \InPhonex\Console\Command\Build::execute
     * @expectedException \RuntimeException
     */
    public function configureThrowsExceptionWithoutIdParam()
    {
        $commandTester = new CommandTester(new BuildCommand());
        $commandTester->execute([]);
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Build::configure
     * @covers \InPhonex\Console\Command\Build::execute
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function executeShowNoErrorsWithIdParam()
    {
        $commandTester = new CommandTester(new BuildCommand());
        $commandTester->execute(['id' => '1352733']);

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}

