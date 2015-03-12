<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Applications as ApplicationsCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Applications Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class ApplicationsTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Applications::configure
     * @covers \InPhonex\Console\Command\Applications::execute
     */
    public function configureShowNoErrorsWithoutParams()
    {
        $commandTester = new CommandTester(new ApplicationsCommand());
        $commandTester->execute([]);
    
        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Applications::configure
     * @covers \InPhonex\Console\Command\Applications::execute
     */
    public function executeShowNoErrorsWithPasswordParam()
    {
        $commandTester = new CommandTester(new ApplicationsCommand());
        $commandTester->execute([]);

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}

