<?php

namespace App\Controller\Api;

use App\Entity\Profiles;
use DateTimeImmutable;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/profile', name: 'profile_')]
class ProfileController extends AbstractController
{

    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $profile = $this->getDoctrine()->getRepository(Profiles::class)->findAll();
        return $this->json($profile);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show($id): JsonResponse
    {
        $profile = $this->getDoctrine()->getRepository(Profiles::class)->find($id);

        return $this->json($profile);
    }

    /**
     * @Route("/{id}", name="update", methods={"PUT"})
     */
    public function update(Request $request, $id): Response
    {
        $data = $request->request->all();
        $profile = $this->getDoctrine()->getRepository(Profiles::class)->find($id);
        $profile->setName($data['name']);
        $profile->setCreatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $profile->setUpdatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($profile);
        $doctrine->flush();
        return $this->json($profile);
    }

    /**
     * @Route("", name="create", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->request->all();
        $profile = new Profiles();
        $profile->setName($data['name']);
        $profile->setCreatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $profile->setUpdatedAt(new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')));
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($profile);
        $doctrine->flush();
        return $this->json($profile);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $doctrine = $this->getDoctrine();
        $profile = $this->getDoctrine()->getRepository(Profiles::class)->find($id);
        $manager = $doctrine->getManager();
        $manager->remove($profile);
        $manager->flush();
        return $this->json($profile);
    }
}
