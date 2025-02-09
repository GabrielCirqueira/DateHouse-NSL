<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TurnoRepository;
use App\Entity\Turno;
use Symfony\Component\HttpFoundation\JsonResponse;

class TurnoController extends AbstractController
{
    
    public function index(TurnoRepository $turnoRepository): Response
    {
        $turnos = ["INTERMEDIÁRIO","VESPERTINO","NOTURNO"];

        foreach ($turnos as $nomeTurno) {
            $turno = new Turno();
            $turno->setNome($nomeTurno);
            $turnoRepository->salvarTurno($turno);
        }

        return new JsonResponse("Turnos inseridos com sucesso!", 200);
    }
}