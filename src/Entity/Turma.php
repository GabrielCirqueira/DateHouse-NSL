<?php

namespace App\Entity;

use App\Repository\TurmaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TurmaRepository::class)]
class Turma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['turma'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['turma'])]
    private ?string $nome = null;

    #[ORM\ManyToOne(inversedBy: 'turmas')]
    #[Groups(['turma'])]
    private ?Turno $turno = null;

    #[ORM\Column]
    #[Groups(['turma'])]
    private ?int $serie = null;

    #[ORM\ManyToOne(inversedBy: 'cursos')]
    #[Groups(['turma'])]
    private ?Curso $curso = null;

    /**
     * @var Collection<int, Aluno>
     */
    #[ORM\OneToMany(targetEntity: Aluno::class, mappedBy: 'turma')]
    #[Groups(['turma'])]
    private Collection $alunos;

    public function __construct($nome, $serie, $curso, $turno)
    {
        $this->nome = $nome;
        $this->serie = $serie;
        $this->curso = $curso;
        $this->turno = $turno;
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

    public function getTurno(): ?Turno
    {
        return $this->turno;
    }

    public function setTurno(?Turno $turno): static
    {
        $this->turno = $turno;

        return $this;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): static
    {
        $this->serie = $serie;

        return $this;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): static
    {
        $this->curso = $curso;

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
            $aluno->setTurma($this);
        }

        return $this;
    }

    public function removeAluno(Aluno $aluno): static
    {
        if ($this->alunos->removeElement($aluno)) {
            // set the owning side to null (unless already changed)
            if ($aluno->getTurma() === $this) {
                $aluno->setTurma(null);
            }
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'turno' => $this->turno ? ['id' => $this->turno->getId(), 'nome' => $this->turno->getNome()] : null,
            'serie' => $this->serie,
            'curso' => $this->curso ? ['id' => $this->curso->getId(), 'nome' => $this->curso->getNome()] : null,
            'alunos' => $this->alunos->map(fn($aluno) => ['id' => $aluno->getId(), 'nome' => $aluno->getNome()])->toArray(),
        ];
    }
}
