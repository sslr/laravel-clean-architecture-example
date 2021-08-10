<?php


namespace Onion\Controller;

use Onion\UseCase\PostUseCaseInterface;
use Onion\Entity\Post;

class PostShowHandler
{
    private $service;

    public function __construct(PostUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        return $this->service->show($request->id);
    }
}
