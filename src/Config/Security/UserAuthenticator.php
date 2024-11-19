<?php

namespace App\Config\Security;

use App\Entity\User;
use App\utils\ObjectMapper;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class UserAuthenticator implements AuthenticatorInterface
{
    private $jwtManager;

    private $userProvider;

    private UserPasswordHasherInterface $passwordHasher; // Add password hasher

    private $entityManager;

    public function __construct(JWTTokenManagerInterface $jwtManager
        , UserProviderInterface $userProvider
        , UserPasswordHasherInterface $passwordHasher
        , EntityManagerInterface $entityManager
    )
    {
        $this->jwtManager = $jwtManager;

        $this->userProvider = $userProvider;

        $this->passwordHasher = $passwordHasher;

        $this->entityManager = $entityManager;
    }

    public function supports(Request $request): ?bool
    {
        return $request->getPathInfo() === '/security/user' && $request->isMethod(Request::METHOD_POST);
    }

    public function authenticate(Request $request): Passport
    {
       $data = ObjectMapper::mapJsonToObject($request->getContent());

       if(!isset($data['username']) || !isset($data['password'])) {

           throw new AuthenticationException("Missing credentials!");
       }
        $user = $this->userProvider->loadUserByIdentifier($data['username']);

       if (!$this->passwordHasher->isPasswordValid($user, $data['password'])) {
            throw new AuthenticationException("Invalid credentials!");
        }

        return new Passport(
            new UserBadge($data['username'], function ($userIdentifier) {
                return $this->userProvider->loadUserByIdentifier($userIdentifier);
            }),
            new PasswordCredentials($data['password'])
        );
    }

    public function createToken(Passport $passport, string $firewallName): TokenInterface
    {
        $user = $passport->getUser();

        return new UsernamePasswordToken(
            $user,
            $firewallName,
            $user->getRoles(),
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $jwt = $this->jwtManager->create($token->getUser());


        return new Response($jwt, Response::HTTP_OK);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {

        return new Response(ObjectMapper::mapObjectToJson($exception->getMessage()), Response::HTTP_UNAUTHORIZED);
    }
}