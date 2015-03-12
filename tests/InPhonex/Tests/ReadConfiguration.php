<?php
/**
 * This file is part of InPhonex system
 *
 * @copyright InPhonex
 * @license   proprietary
 */
namespace InPhonex\Tests;

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
    protected static $config;

    /**
     * Prepares the environment before running a test.
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::$config = Yaml::parse(file_get_contents(__DIR__ . '/../../../config/config.yml'));
    }
}