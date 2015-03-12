<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\PhoneGap;

use GuzzleHttp\Exception\ParseException;
use InvalidArgumentException;

/**
 * Authorize and retrieve a token
 * 
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Authorizer extends Client
{
    /**
     * Base service url
     * 
     * @var string
     */
    const BASE_PATH = 'https://build.phonegap.com/authorize';
    
    /**
     * Retrieve an access token
     * 
     * @return string
     */
    public function authorize()
    {
        try {
            $request = $this
                ->client
                ->post(
                    self::BASE_PATH,
                    [
                        'query' => [
                            'client_id'     => $this->getClientId(),
                            'client_secret' => $this->getClientSecret(),
                            'auth_token'    => $this->getAuthToken()
                        ]
                    ]
                );

            $accessToken = $request->json()['access_token'];

           return $accessToken;
        } catch (ParseException $ex) {
            throw new InvalidArgumentException($ex->getMessage());
        }
    }
}