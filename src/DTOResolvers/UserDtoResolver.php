<?php

namespace App\DTOResolvers;

use App\DTOs\UserDto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\SerializerInterface;

class UserDtoResolver implements ArgumentValueResolverInterface
{
    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return $argument->getType() === 'App\DTOs\UserDto';
    }

    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        $userDto = $this->serializer->deserialize($request->getContent(), UserDto::class, 'json');

        yield $userDto;
    }
}