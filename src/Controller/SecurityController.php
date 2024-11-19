<?php

namespace App\Controller;

use App\Config\Security\UserPasswordEncoder;
use App\Config\Security\UserProvider;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

class SecurityController extends AbstractController
{
    public function __construct(){}
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(Request $request, AuthenticatorInterface $userAuthenticator): JsonResponse
    {
        // The AuthenticatorInterface will handle the authentication
        try {
            $passport = $userAuthenticator->authenticate($request);

            $token = $userAuthenticator->createToken($passport, 'login');

            $response = $userAuthenticator->onAuthenticationSuccess($request, $token, 'api');;

            $jwt = $response->getContent();

            $successCode = $response->getStatusCode();

            return new JsonResponse([
                'status' => 'success',
                'token' => $jwt
            ], $successCode);
        } catch (\Exception $e) {

            $response = $userAuthenticator->onAuthenticationFailure($request, $e);

            $errorMessage = $response->getContent();
            $errorCode = $response->getStatusCode();

            return new JsonResponse([
                'status' => 'error',
                'message' => $errorMessage
            ], $errorCode);
        }
    }
}