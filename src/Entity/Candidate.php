<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidateRepository")
 * @ApiResource(
 *     collectionOperations={"post"},
 *     itemOperations={}
 * )
 */
class Candidate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="Position", inversedBy="candidates")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $gitHub;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $available;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $contactable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getGitHub(): ?string
    {
        return $this->gitHub;
    }

    public function setGitHub(?string $gitHub): self
    {
        $this->gitHub = $gitHub;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getContactable(): ?bool
    {
        return $this->contactable;
    }

    public function setContactable(bool $contactable): self
    {
        $this->contactable = $contactable;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
