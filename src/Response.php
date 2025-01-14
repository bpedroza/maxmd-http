<?php

namespace Endeavors\MaxMD\Http;

use Endeavors\MaxMD\Http\Contracts\IResponse;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * we'll just extend Symfony's Response in case we
 * Encounter any issues with the response from maxmd
 */
final class Response extends SymfonyResponse
{
    /**
     * Force the first parameter content
     * @param mixed $content
     * @param int $status
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __construct($content, $status = 200, $headers = array())
    {
        parent::__construct($content, $status, $headers);
    }

    /**
     * Alias
     * @see make
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public static function create($content = '', $status = 200, $headers = array())
    {
        return static::make($content, $status, $headers);
    }

    /**
     * Wrap the factory create from symfonyresponse
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public static function make($content = '', $status = 200, $headers = array())
    {
        return SymfonyResponse::create($content, $status, $headers);
    }
}
