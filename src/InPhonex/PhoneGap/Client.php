<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\PhoneGap;

use GuzzleHttp\Client as HttClient;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\AllOfException;

/**
 * PhoneGap Client
 * 
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
abstract class Client
{
    /**
     * Base url
     * 
     * @var string
     */
    const BASE_URL = 'https://build.phonegap.com/api/v1/';
    
    /**
     * The Client ID
     * 
     * @var string
     */
    private $clientId;
    
    /**
     * The Client Secret
     * 
     * @var string
     */
    private $clientSecret;
    
    /**
     * The Authorization Token
     * 
     * @var string
     */
    private $authToken;

    /**
     * The HTTP Client
     *
     * @var ClientInterface
     */
    protected $client;
    
    /**
     * Construtor
     * 
     * @param string $clientId
     * @param string $clientSecret
     * @param string $authToken
     */
    function __construct($clientId = '', $clientSecret = '', $authToken = '')
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->authToken    = $authToken;
        $this->client       = new HttClient();
    }

    /**
     * Get the Client Id
     *
     * @return the string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the client ID
     *
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        try {
            Validator::create()->notEmpty()->assert($clientId);
            
            $this->clientId = $clientId;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(
                sprintf('The Client ID %s is invalid.', $clientId),
                500,
                $ex
            );
        }
    }

    /**
     *
     * @return the string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     *
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        try {
            Validator::create()->notEmpty()->assert($clientSecret);
            
            $this->clientSecret = $clientSecret;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(
                sprintf('Client secret %s is invalid.', $clientSecret),
                500,
                $ex
            );
        }
    }

    /**
     *
     * @return the string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     *
     * @param string $authToken
     */
    public function setAuthToken($authToken)
    {
        try {
            Validator::create()->notEmpty()->assert($authToken);

            $this->authToken = $authToken;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(
                sprintf('The auth token %s is invalid.', $authToken),
                500,
                $ex
            );
        }
    }
}
