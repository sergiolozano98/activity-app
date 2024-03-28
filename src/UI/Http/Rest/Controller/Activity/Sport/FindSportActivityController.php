<?php

namespace UI\Http\Rest\Controller\Activity\Sport;

use App\Activities\Application\Sport\Find\FindSportActivityQuery;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

readonly class FindSportActivityController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    #[Route('/api/activity/sport', name: 'get_sport', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $id = $request->get('id');

            $response = $this->queryBus->ask(new FindSportActivityQuery($id));

            return new JsonResponse([
                    $response,
                    Response::HTTP_OK,
                ]
            );
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => sprintf('Bad Request (%s)', $exception->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }
}