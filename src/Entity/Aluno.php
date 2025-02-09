<?php

namespace App\Entity;

use App\Repository\AlunoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlunoRepository::class)]
class Aluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\ManyToOne(inversedBy: 'alunos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Turma $turma = null;

    #[ORM\ManyToOne(inversedBy: 'alunos')]
    private ?Turno $turno = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTurma(): ?Turma
    {
        return $this->turma;
    }

    public function setTurma(?Turma $turma): static
    {
        $this->turma = $turma;

        return $this;
    }

    public function getTurno(): ?Turno
    {
        return $this->turno;
    }

    public function setTurno(?Turno $turno): static
    {
        $this->turno = $turno;

        return $this;
    }
}
