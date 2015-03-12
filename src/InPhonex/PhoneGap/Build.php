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
class Build extends Client
{
    /**
     * Build application
     *
     * @param int $id
     * @return mixed
     */
    public function buildApplication($id)
    {
        $request = $this->client
                        ->post(
                            self::BASE_URL . 'apps/' . $id . '/build',
                            [
                                'query' => [
                                    'auth_token'    => $this->getAuthToken()
                                ]
                            ]
                        );

        return $request->json();
    }
}
