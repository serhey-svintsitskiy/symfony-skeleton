<?php

declare(strict_types=1);

namespace App\Controller\Public;

use App\Model\Public\User\UserListRequest;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/users')]

class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    #[Route(path: '', methods: [Request::METHOD_GET])]
    public function cities(
      #[MapQueryString]
        UserListRequest $request,
    ): Response {
        return $this->json($this->userRepository->findAll());
    }
}
