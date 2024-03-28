<?php

namespace UI\Http\Rest\Controller\Activity\Sport;

use App\Activities\Application\Sport\Create\CreateSportActivityCommand;
use App\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


readonly class CreateSportActivityController
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    #[Route('/api/activity/sport', name: 'create_sport', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);

            $id = $data['id'];
            $name = $data['name'];
            $description = $data['description'];
            $type = $data['type'];

            $this->commandBus->dispatch(new CreateSportActivityCommand($id, $name, $description, $type));
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => sprintf('Error (Sport Activity not created : %s)', $exception->getMessage())], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(['status' => 'Sport Activity created'], Response::HTTP_CREATED);
    }

}