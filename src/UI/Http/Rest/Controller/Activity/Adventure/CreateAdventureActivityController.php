<?php

namespace UI\Http\Rest\Controller\Activity\Adventure;

use App\Activities\Application\Adventure\Create\CreateAdventureActivityCommand;
use App\Shared\Domain\Bus\Command\CommandBus;
use Assert\Assertion;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

readonly class CreateAdventureActivityController
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    #[Route('/api/activity/adventure', name: 'create_adventure', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);

            Assertion::keyExists($data, 'id', '<id> is required.');
            Assertion::keyExists($data, 'name', '<name> is required.');
            Assertion::keyExists($data, 'description', '<description> is required.');
            Assertion::keyExists($data, 'material', '<material> is required.');

            $id = $data['id'];
            $name = $data['name'];
            $description = $data['description'];
            $material = json_encode($data['material']);

            $this->commandBus->dispatch(new CreateAdventureActivityCommand($id, $name, $description, $material));
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => sprintf('Error (Adventure Activity not created : %s)', $exception->getMessage())], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(['status' => 'Adventure Activity created'], Response::HTTP_CREATED);
    }
}