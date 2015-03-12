<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\Console\Command;

use InPhonex\Console\Command\Authorize as AuthorizeCommand;
use Symfony\Component\Console\Tester\CommandTester;
use InPhonex\Tests\ReadConfiguration;

/**
 * Authorize Command Tests
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class AuthorizeTest extends \PHPUnit_Framework_TestCase
{
    use ReadConfiguration;

    /**
     * @test
     * @covers \InPhonex\Console\Command\Authorize::configure
     * @covers \InPhonex\Console\Command\Authorize::execute
     */
    public function configureShowNoErrorsWithoutParams()
    {
        $commandTester = new CommandTester(new AuthorizeCommand());
        $commandTester->execute([]);
    
        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
    
    /**
     * @test
     * @covers \InPhonex\Console\Command\Authorize::configure
     * @covers \InPhonex\Console\Command\Authorize::execute
     */
    public function executeShowNoErrorsWithPasswordParam()
    {
        $commandTester = new CommandTester(new AuthorizeCommand());
        $commandTester->execute([]);

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}

