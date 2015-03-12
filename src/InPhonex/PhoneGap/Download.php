<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\PhoneGap;

use Respect\Validation\Validator;
use Respect\Validation\Exceptions\AllOfException;

/**
 * PhoneGap Client
 * 
 * @author Thiago Paes <thiago.paes@inphonex.com>
 */
class Download extends Client
{
    /**
     * Download an application
     *
     * @param int $id
     * @param string $platform
     * @return mixed
     */
    public function statusApplication($id = 0, $platform = null)
    {
        try {
            Validator::create()
                ->notEmpty()
                ->in(['ios', 'android', 'winphone'])
                ->assert($platform);
                
            Validator::create()
                ->notEmpty()
                ->int()
                ->assert($id);
            
            /* @var $request \GuzzleHttp\Message\Response */
            $request = $this
                ->client
                ->get(
                    self::BASE_URL . 'apps/' . $id . '/' . $platform,
                    [
                        'query' => [
                            'auth_token'    => $this->getAuthToken()
                        ]
                    ]
                );
            
            $url = $request->getEffectiveUrl();
            $file = basename(parse_url($url)['path']);
            
            /* @var $request \GuzzleHttp\Message\Response */
            $request = $this
                ->client
                ->get(
                    $url,
                    [
                        'save_to' => $file
                    ]
                );
            
            return $file;
        } catch (AllOfException $ex) {
            throw new \InvalidArgumentException(
                sprintf('Unknown platform %s', $platform),
                500,
                $ex
            );
        }
    }
}
