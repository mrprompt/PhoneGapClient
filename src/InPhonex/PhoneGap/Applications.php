<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\PhoneGap;

/**
 * PhoneGap Client
 * 
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Applications extends Client
{
    /**
     * List all applications
     *
     * @return mixed
     */
    public function listApplications()
    {
        $request = $this->client
                        ->get(
                            self::BASE_URL . 'apps',
                            [
                                'query' => [
                                    'auth_token'    => $this->getAuthToken()
                                ]
                            ]
                        );

        return $request->json();
    }
}
