<?php

namespace UI\Http\Rest\Controller\Activity;

use App\Activities\Application\ActivityResponse;
use App\Activities\Application\Find\FindAllActivitiesQuery;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Lambdish\Phunctional\map;

readonly class FindAllActivitiesController
{
    public function __construct(private QueryBus $bus)
    {
    }

    #[Route('/api/activities', name: 'get_all_activities', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->bus->ask(new FindAllActivitiesQuery());

        return new JsonResponse([
                map(
                    fn(ActivityResponse $activity): array => [
                        'id' => $activity->id(),
                        'name' => $activity->name(),
                        'description' => $activity->description(),
                    ],
                    $result->activities()
                ),
                Response::HTTP_OK,
            ]
        );
    }
}