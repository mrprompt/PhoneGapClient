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
class Delete extends Client
{
    /**
     * Delete an application
     *
     * @param int $id
     * @return mixed
     */
    public function deleteApplication($id)
    {
        $request = $this->client
                        ->delete(
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
