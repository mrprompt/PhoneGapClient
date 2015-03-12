<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Console;

use Symfony\Component\Yaml\Yaml;

/**
 * Read configuration file
 *
 * @package InPhonex\Tests
 */
trait ReadConfiguration
{
    /**
     * @var array
     */
    protected $config;

    /**
     * Prepares the environment before running a test.
     */
    public function loadConfigFile()
    {
        $this->config = Yaml::parse(file_get_contents(__DIR__ . '/../../../config/config.yml'));
    }
}