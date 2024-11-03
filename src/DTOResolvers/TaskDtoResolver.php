<?php

namespace App\DTOResolvers;

use App\DTOs\TaskDto;
use App\DTOs\UserDto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\SerializerInterface;

class TaskDtoResolver implements ArgumentValueResolverInterface
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return $argument->getType() === 'App\DTOs\TaskDto';
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $taskDto = $this->serializer->deserialize($request->getContent(), TaskDto::class, 'json');

        yield $taskDto;
    }
}