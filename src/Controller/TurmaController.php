<?php

namespace App\Controller;

use App\Entity\Turma;
use App\Repository\CursoRepository;
use App\Repository\TurmaRepository;
use App\Repository\TurnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TurmaController extends AbstractController
{
    #[Route('/v1/api/adicionar/turma', name: 'turnos', methods: ['POST'])]
    public function AdicionarTurma(
        CursoRepository $cursoRepository,
        TurnoRepository $turnoRepository,
        TurmaRepository $turmaRepository,
        Request $request
        ): Response {
            
        $data = json_decode($request->getContent(), true);

        $curso = $cursoRepository->find($data['curso']);
        $turno = $turnoRepository->find($data['turno']);

        $turma = new Turma(
            nome: $data['nome'],
            serie: $data['serie'],
            curso: $curso,
            turno: $turno
        );

        $turmaRepository->salvarTurma($turma);

        return new JsonResponse("Turma Adicionada com sucesso!", 200);
    }

    #[Route('/v1/api/buscar/turmas', name: 'api_turmas', methods: ['GET'])]
    public function getTurmas(TurmaRepository $turmaRepository): JsonResponse
    {
        $turmas = $turmaRepository->findAll();

        return $this->json(array_map(fn($turma) => $turma->toArray(), $turmas));
    }
}