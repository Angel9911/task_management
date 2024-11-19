<?php

namespace App\Config\Security;

use App\utils\ObjectMapper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class UserGuardAuthenticator extends AbstractAuthenticator
{
    private $userProvider;

    public function supports(Request $request): ?bool
    {
        // "auth-token" is an example of a custom, non-standard HTTP header used in this application
        return $request->headers->has('auth-token');
    }

    public function authenticate(Request $request): Passport
    {
        $data = ObjectMapper::mapJsonToObject($request->getContent());

        if(!isset($data['username']) || !isset($data['password'])) {

            throw new AuthenticationException("Missing credentials!");
        }

        $user = $this->userProvider->loadUserByIdentifier($data['username']);

        if(!$user /*&& !password_verify($data['password'], $user->getPassword())*/) {

            throw new AuthenticationException("Invalid credentials!");
        }

        return new Passport(
            new UserBadge($data['username'], function ($userIdentifier) {
                return $this->userProvider->loadUserByIdentifier($userIdentifier);
            }),
            new PasswordCredentials($data['password'])
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new Response($data, Response::HTTP_UNAUTHORIZED);
    }
}