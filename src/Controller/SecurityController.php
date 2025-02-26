<?php

namespace App\Controller;

use App\Config\Security\UserPasswordEncoder;
use App\Config\Security\UserProvider;
use App\utils\ObjectMapper;
use Doctrine\DBAL\Exception\DriverException;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

class SecurityController extends AbstractController
{
    private LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
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

            $this->logger->info('Successfully the user logged in: ',
            [
                'username' => ObjectMapper::mapJsonToObject($request->getContent())['username'],
                'timestamp' => (new \DateTime())->format('Y-m-d H:i:s')
            ]);

            return new JsonResponse([
                'status' => 'success',
                'token' => $jwt
            ], $successCode);
        } catch (AuthenticationException $e) {

            $response = $userAuthenticator->onAuthenticationFailure($request, $e);

            $errorMessage = $response->getContent();
            $errorCode = $response->getStatusCode();

            return new JsonResponse([
                'status' => 'error',
                'message' => $errorMessage
            ], $errorCode);
        } catch (DriverException $e){

            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}