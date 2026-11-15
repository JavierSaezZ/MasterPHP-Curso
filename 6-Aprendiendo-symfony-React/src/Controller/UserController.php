<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    #[Route('/users', name: 'app_users')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->json(
            $users,
            context: ['groups' => ['user:read']]
        );
    }

    #[Route('/users/experiencia', name: 'app_users_experiencia')]
    public function experiencia(
        Request $request,
        UserRepository $userRepository
    ): Response {
        $valor = $request->query->getInt('valor');

        // Consulta general
        $query = $userRepository->createQueryBuilder('u');

        if ($valor === 1) {
            $query
                ->where('u.experienciaAnios <= :maximo')
                ->setParameter('maximo', 2);

        } elseif ($valor === 2) {
            $query
                ->where(
                    'u.experienciaAnios BETWEEN :minimo AND :maximo'
                )
                ->setParameter('minimo', 3)
                ->setParameter('maximo', 7);

        } elseif ($valor === 3) {
            $query
                ->where('u.experienciaAnios >= :minimo')
                ->setParameter('minimo', 8);
        }

        // Aquí se ejecuta la consulta una única vez
        $users = $query
            ->getQuery()
            ->getResult();

        return $this->json(
            $users,
            context: ['groups' => ['user:read']]
        );
    }
    //   #[Route('/u/{id}', name: 'one_user')]
//     public function oneUser(UserRepository $userRepository, $id): Response
//     {
//                 $Oneuser = $userRepository->find($id);

    //      return $this->json($Oneuser, context: ['groups' => 'user:read']);
//     }
#[Route('/api/user/{id}', name: 'api_user', methods: ['GET'])]
public function oneUser(UserRepository $userRepository, int $id): Response
{
    $user = $userRepository->find($id);

    if (!$user) {
        return $this->json(['error' => 'Usuario no encontrado'], 404);
    }

    return $this->json($user, context: ['groups' => ['user:read']]);
}

#[Route('/api/user/{id}', name: 'api_user_update', methods: ['PUT'])]
public function updateUser(int $id, Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
{
    $user = $userRepository->find($id);

    if (!$user) {
        return $this->json(['error' => 'Usuario no encontrado'], 404);
    }

    $datos = $request->toArray();

    $user->setNick($datos['nick']);
    $user->setEmail($datos['email']);
    $user->setEdad((int) $datos['edad']);
    $user->setGenero($datos['genero']);
    $user->setExperienciaAnios((int) $datos['experienciaAnios']);
    $user->setPuesto($datos['puesto']);
    $user->setCiudad($datos['ciudad']);
    $user->setActivo((bool) $datos['activo']);
    $user->setEsAdmin((bool) $datos['esAdmin']);

    

    if (!empty($datos['fechaRegistro'])) {
        try {
           $fecha = new \DateTimeImmutable($datos['fechaRegistro']);
            $user->setFechaRegistro($fecha);
        } catch (\Exception) {
            return $this->json(['error' => 'La fecha no es válida'], 400);
        }
    }

    $entityManager->flush();

    return $this->json($user, context: ['groups' => ['user:read']]);
}
#[Route('/api/user', name: 'api_user_add', methods: ['POST'])]
public function addUser(Request $request, EntityManagerInterface $entityManager): Response
{
    $datos = $request->toArray();
    $user = new User();

    $contrasenaTemporal = $this->generarContrasena();
    $contrasenaHash = password_hash($contrasenaTemporal, PASSWORD_DEFAULT);

    $user->setNick($datos['nick']);
    $user->setEmail($datos['email']);
    $user->setContrasena($contrasenaHash);
    $user->setEdad((int) $datos['edad']);
    $user->setGenero($datos['genero']);
    $user->setExperienciaAnios((int) $datos['experienciaAnios']);
    $user->setPuesto($datos['puesto']);
    $user->setCiudad($datos['ciudad']);
    $user->setActivo((bool) $datos['activo']);
    $user->setEsAdmin((bool) $datos['esAdmin']);

    if (!empty($datos['fechaRegistro'])) {
        try {
            $user->setFechaRegistro(new \DateTimeImmutable($datos['fechaRegistro']));
        } catch (\Exception) {
            return $this->json(['error' => 'La fecha no es válida'], 400);
        }
    }

    $entityManager->persist($user);
    $entityManager->flush();

    return $this->json([
        'message' => 'Usuario creado correctamente',
        'user' => $user,
        'contrasenaTemporal' => $contrasenaTemporal
    ], 201, [], ['groups' => ['user:read']]);
}

private function generarContrasena(int $longitud = 12): string
{
    $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
    $contrasena = '';

    for ($i = 0; $i < $longitud - 3; $i++) {
        $posicion = random_int(0, strlen($caracteres) - 1);
        $contrasena .= $caracteres[$posicion];
    }

    $contrasena .= 'A';
    $contrasena .= random_int(2, 9);
    $contrasena .= '!';

    return str_shuffle($contrasena);
}


#[Route('/api/user/delete/{id}', name: 'api_user_delete', methods: ['DELETE'])]
public function deleteUser(
    int $id,
    EntityManagerInterface $entityManager
): Response
{
    $user = $entityManager->getRepository(User::class)->find($id);

    if (!$user) {
        return $this->json([
            'error' => 'Usuario no encontrado'
        ], 404);
    }

    $entityManager->remove($user);
    $entityManager->flush();

    return $this->json([
        'message' => 'Usuario eliminado correctamente'
    ]);
}

}


