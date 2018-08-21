<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Service\PasswordChecker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/check", methods={"POST"}, name="password_check")
     */
    public function checkAction(Request $request, PasswordChecker $checker)
    {
        $body = json_decode($request->getContent(), true);
        if (JSON_ERROR_NONE !== json_last_error() || !is_array($body)) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Cannot decode request body',
            ]);
        }

        if (!isset($body['password'])) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Key "password" is missing',
            ]);
        }

        if (!is_string($body['password'])) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Key "password" must be a string',
            ]);
        }

        $message = $checker->check($body['password']);

        return new JsonResponse([
            'success' => true,
            'valid' => null === $message,
            'message' => $message,
        ]);
    }
}
