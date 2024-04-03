<?php

namespace UI\Http\Rest\Controller\Activity\OnlineGame;

use App\Activities\Application\OnlineGame\Create\CreateOnlineGameActivityCommand;
use App\Shared\Domain\Bus\Command\CommandBus;
use Assert\Assertion;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


readonly class CreateOnlineGameActivityController
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    #[Route('/api/activity/onlineGame', name: 'create_online_game', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);

            Assertion::keyExists($data, 'id', '<id> is required.');
            Assertion::keyExists($data, 'name', '<name> is required.');
            Assertion::keyExists($data, 'description', '<description> is required.');
            Assertion::keyExists($data, 'url', '<url> is required.');

            $id = $data['id'];
            $name = $data['name'];
            $description = $data['description'];
            $url = $data['url'];

            $this->commandBus->dispatch(new CreateOnlineGameActivityCommand($id, $name, $description, $url));
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => sprintf('Error (Online Game Activity not created : %s)', $exception->getMessage())], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(['status' => 'Online Game Activity created'], Response::HTTP_CREATED);
    }

}