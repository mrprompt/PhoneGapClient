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
class Create extends Client
{
    /**
     * Create application
     *
     * @param string $title
     * @param string $file
     * @return mixed
     */
    public function createApplication($title, $file)
    {
        $uri = self::BASE_URL . 'apps?auth_token=' . $this->getAuthToken();
        
        $request = $this
            ->client
            ->createRequest('POST', $uri);

        $requestBody = $request->getBody();
        $requestBody->setField('data[title]', $title);
        $requestBody->setField('data[create_method]', 'file');
        $requestBody->addFile(new PostFile('file', fopen($file, 'r')));

        $response = $this->client->send($request);

        return $response->json();
    }
}
