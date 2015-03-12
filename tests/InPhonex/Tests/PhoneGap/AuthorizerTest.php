<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\PhoneGap;

use InPhonex\PhoneGap\Authorizer;

/**
 * Authorizer test case.
 *
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class AuthorizerTest extends AbstractClient
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->obj = new Authorizer(
            $this->clientId,
            $this->clientSecret,
            $this->authToken
        );
    }

    /**
     * Tests Authorizer->getClientId()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Authorizer::__construct
     * @covers \InPhonex\PhoneGap\Authorizer::authorize
     */
    public function authorizeMustBeReturnStringTokenWhenCorrect()
    {
        $response = $this->obj->authorize();

        $this->assertRegExp('/[[:alnum:]]{26,}/i', $response);
    }
}
