<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests\PhoneGap;

use InPhonex\Tests\ChangeProtectedAttribute;
use InPhonex\Tests\ReadConfiguration;

/**
 * Client test case.
 * 
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
abstract class AbstractClient extends \PHPUnit_Framework_TestCase
{
    use ChangeProtectedAttribute;
    use ReadConfiguration;

    /**
     * The Client ID
     * 
     * @var string
     */
    protected $clientId;
    
    /**
     * The Client Secret
     * 
     * @var string
     */
    protected $clientSecret;
    
    /**
     * The Authorization Token
     * 
     * @var string
     */
    protected $authToken;

    /**
     * Object to test
     * 
     * @var Client
     */
    protected $obj;
    
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->clientId     = self::$config['phonegap']['client_id'];
        $this->clientSecret = self::$config['phonegap']['client_secret'];
        $this->authToken    = self::$config['phonegap']['auth_token'];
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->obj          = null;
        $this->clientId     = null;
        $this->clientSecret = null;
        $this->authToken    = null;
        
        parent::tearDown();
    }

    /**
     * Tests Client->getClientId()
     * 
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::getClientId
     */
    public function getClientIdMustReturnClientIdAttribute()
    {
        $this->assertEquals(
            $this->clientId, 
            $this->obj->getClientId()
        );
    }
    
    /**
     * Tests Client->setClientId()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::setClientId
     */
    public function setClientIdMustReturnNullWhenParameterIsValid()
    {
        $this->assertEmpty($this->obj->setClientId($this->clientId));
    }

    /**
     * Tests Client->setClientId()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::setClientId
     * @expectedException \InvalidArgumentException
     */
    public function setClientIdThrowsInvalidArgumentExceptionWhenEmpty()
    {
        $this->obj->setClientId('');
    }
    
    /**
     * Tests Client->getClientSecret()
     * 
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::getClientSecret
     */
    public function getClientSecretMustBeReturnClientSecretAttribute()
    {
        $this->assertEquals(
            $this->clientSecret,
            $this->obj->getClientSecret()
        );
    }
    
    /**
     * Tests Client->setClientSecret()
     * 
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::setClientSecret
     */
    public function setClientSecretMustBeReturnEmptyWhenClientSecretIsValid()
    {
        $this->assertEmpty(
            $this->obj->setClientSecret($this->clientSecret)
        );
    }
    
    /**
     * Tests Client->setClientSecret()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::setClientSecret
     * @expectedException \InvalidArgumentException
     */
    public function setClientSecretThrowsInvalidArgumentExceptionWhenClientSecretIsEmpty()
    {
        $this->obj->setClientSecret('');
    }
    
    /**
     * Tests Client->getAuthToken()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::getAuthToken
     */
    public function getAuthTokenMustBeReturnAuthTokenAttribute()
    {
        $this->assertEquals(
            $this->authToken,
            $this->obj->getAuthToken()
        );
    }
    
    /**
     * Tests Client->setAuthToken()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::setAuthToken
     */
    public function setAuthTokenMustBeReturnEmptyWhenTokenIsValid()
    {
        $this->assertEmpty(
            $this->obj->setAuthToken($this->authToken)
        );
    }
    
    /**
     * Tests Client->setAuthToken()
     *
     * @test
     * @covers \InPhonex\PhoneGap\Client::__construct
     * @covers \InPhonex\PhoneGap\Client::setAuthToken
     * @expectedException \InvalidArgumentException
     */
    public function setAuthTokenThrowsInvalidArgumentExceptionWhenTokenIsEmpty()
    {
        $this->obj->setAuthToken('');
    }
}

