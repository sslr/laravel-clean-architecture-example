<?php


namespace Onion\Controller;

use Onion\UseCase\PostUseCaseInterface;

class PostIndexHandler
{
    private $service;

    public function __construct(PostUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        return $this->service->index($request);
    }
}
