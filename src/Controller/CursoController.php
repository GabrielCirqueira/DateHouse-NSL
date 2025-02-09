<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TurnoRepository;
use App\Entity\Curso;
use App\Repository\CursoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class CursoController extends AbstractController
{
    
    #[Route('/criarcursos', name: 'cursos', methods: ['GET'])]
    public function index(CursoRepository $cursoRepository): Response
    {
        $cursos = ["INFORMÁTICA","ADMINISTRAÇÃO","HUMANAS"];

        foreach ($cursos as $cursoNome) {
            $curso = new Curso();
            $curso->setNome($cursoNome);
            $cursoRepository->salvarCurso($curso);
        }

        return new JsonResponse("Cursos inseridos com sucesso!", 200);
    }
}