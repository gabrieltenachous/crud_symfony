<?php

namespace App\Controller\Api;

use App\Entity\Profiles;
use App\Entity\Users;
use DateTimeImmutable;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

$encoders = [new XmlEncoder(), new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];

$serializer = new Serializer($normalizers, $encoders);
/**
 * @Route("/api/user", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(Users::class)->findAll();
        return $this->json($user);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show($id): JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(Users::class)->find($id);

        return $this->json($user);
    }

    /**
     * @Route("/{id}", name="update", methods={"PUT"})
     */
    public function update(Request $request, $id): Response
    {
        $data = $request->request->all();
        $user = $this->getDoctrine()->getRepository(Users::class)->find($id);
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setProfile($data['profile_id']);
        $user->setCreatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $user->setUpdatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($user);
        $doctrine->flush();
        return $this->json($user);
    }

    /**
     * @Route("", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $data = $request->request->all();
        $user = new Users();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
        $profile = $this->getDoctrine()->getRepository(Profiles::class)->find($data['profile_id']);

        $user->setProfileId($profile);
        $user->setCreatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $user->setUpdatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($user);
        $doctrine->flush();
        $jsonContent = serialize($user, 'json');
        return $jsonContent;
         
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $doctrine = $this->getDoctrine();
        $user = $this->getDoctrine()->getRepository(Users::class)->find($id);
        $manager = $doctrine->getManager();
        $manager->remove($user);
        $manager->flush();
        return $this->json($user);
    }
}
