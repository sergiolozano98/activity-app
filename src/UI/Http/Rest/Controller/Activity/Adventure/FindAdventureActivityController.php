<?php

namespace UI\Http\Rest\Controller\Activity\Adventure;

use App\Activities\Application\Adventure\Find\FindAdventureActivityQuery;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

readonly class FindAdventureActivityController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    #[Route('/api/activity/adventure', name: 'get_adventure', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $id = $request->get('id');

            $response = $this->queryBus->ask(new FindAdventureActivityQuery($id));

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