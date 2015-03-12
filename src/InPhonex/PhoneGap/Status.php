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
class Status extends Client
{
    /**
     * Get the application status
     *
     * @param int $id
     * @return mixed
     */
    public function statusApplication($id)
    {
        $request = $this->client
                        ->get(
                            self::BASE_URL . 'apps/' . $id,
                            [
                                'query' => [
                                    'auth_token'    => $this->getAuthToken()
                                ]
                            ]
                        );

        return $request->json();
    }
}
