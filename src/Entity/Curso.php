<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
class Curso
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
    #[ORM\OneToMany(targetEntity: Turma::class, mappedBy: 'curso')]
    private Collection $turmas;

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
            $turma->setCurso($this);
        }

        return $this;
    }

    public function removeTurma(Turma $turma): static
    {
        if ($this->turmas->removeElement($turma)) {
            // set the owning side to null (unless already changed)
            if ($turma->getCurso() === $this) {
                $turma->setCurso(null);
            }
        }

        return $this;
    }
}
