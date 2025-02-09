<?php

namespace App\Entity;

use App\Repository\TurnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TurnoRepository::class)]
class Turno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    /**
     * @var Collection<int, Turma>
     */
    #[ORM\OneToMany(targetEntity: Turma::class, mappedBy: 'turno')]
    private Collection $turmas;

    /**
     * @var Collection<int, Aluno>
     */
    #[ORM\OneToMany(targetEntity: Aluno::class, mappedBy: 'turno')]
    private Collection $alunos;

    public function __construct()
    {
        $this->turmas = new ArrayCollection();
        $this->alunos = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Turma>
     */
    public function getTurmas(): Collection
    {
        return $this->turmas;
    }

    public function addTurma(Turma $turma): static
    {
        if (!$this->turmas->contains($turma)) {
            $this->turmas->add($turma);
            $turma->setTurno($this);
        }

        return $this;
    }

    public function removeTurma(Turma $turma): static
    {
        if ($this->turmas->removeElement($turma)) {
            // set the owning side to null (unless already changed)
            if ($turma->getTurno() === $this) {
                $turma->setTurno(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Aluno>
     */
    public function getAlunos(): Collection
    {
        return $this->alunos;
    }

    public function addAluno(Aluno $aluno): static
    {
        if (!$this->alunos->contains($aluno)) {
            $this->alunos->add($aluno);
            $aluno->setTurno($this);
        }

        return $this;
    }

    public function removeAluno(Aluno $aluno): static
    {
        if ($this->alunos->removeElement($aluno)) {
            // set the owning side to null (unless already changed)
            if ($aluno->getTurno() === $this) {
                $aluno->setTurno(null);
            }
        }

        return $this;
    }
}
