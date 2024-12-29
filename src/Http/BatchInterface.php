<?php
declare(strict_types=1);

namespace Google\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface BatchInterface
{
    public function add(RequestInterface $request, $key = false);
    public function execute();
    public function parseResponse(ResponseInterface $response, $classes = []);
}
