<?php

namespace UI\Http\Rest\Controller\Activity\OnlineGame;

use App\Activities\Application\OnlineGame\Find\FindOnlineGameActivityQuery;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

readonly class FindOnlineGameActivityController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    #[Route('/api/activity/onlineGame', name: 'get_online_game', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $id = $request->get('id');

            $response = $this->queryBus->ask(new FindOnlineGameActivityQuery($id));

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