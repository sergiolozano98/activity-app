<?php

namespace UI\Http\Rest\Controller\Activity\Sport;

use App\Activities\Application\CreateSportActivityHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CreateSportActivityController
{
    public function __construct(protected CreateSportActivityHandler $handler)
    {
    }

    #[Route('/api/activity/sport', name: 'create_sport', methods: ['POST'])]
    public function __invoke(Request $request): void
    {
        $this->handler->__invoke();
    }

}