<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\PhoneGap;

use GuzzleHttp\Post\PostFile;

/**
 * PhoneGap Client
 * 
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Update extends Client
{
    /**
     * Update application zip based
     *
     * @param int $id
     * @param string $file
     * @return mixed
     */
    public function updateApplication($id, $file)
    {
        $uri = self::BASE_URL . 'apps/' . $id . '?auth_token=' 
            . $this->getAuthToken();
        
        $request = $this
            ->client
            ->createRequest('PUT', $uri);

        $requestBody = $request->getBody();

        if ($requestBody === null) {
            return false;
        }

        $requestBody->addFile(new PostFile('file', fopen($file, 'r')));

        $response = $this->client->send($request);

        return $response->json();
    }
}
