<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpectatorRepository")
 */
class Spectator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newsSubscription;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="spectator")
     */
    private $ticketNumber;

    public function __construct()
    {
        $this->ticketNumber = new ArrayCollection();
    }

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNewsSubscription(): ?bool
    {
        return $this->newsSubscription;
    }

    public function setNewsSubscription(bool $newsSubscription): self
    {
        $this->newsSubscription = $newsSubscription;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTicketNumber(): Collection
    {
        return $this->ticketNumber;
    }

    public function addTicketNumber(Ticket $ticketNumber): self
    {
        if (!$this->ticketNumber->contains($ticketNumber)) {
            $this->ticketNumber[] = $ticketNumber;
            $ticketNumber->setSpectator($this);
        }

        return $this;
    }

    public function removeTicketNumber(Ticket $ticketNumber): self
    {
        if ($this->ticketNumber->contains($ticketNumber)) {
            $this->ticketNumber->removeElement($ticketNumber);
            // set the owning side to null (unless already changed)
            if ($ticketNumber->getSpectator() === $this) {
                $ticketNumber->setSpectator(null);
            }
        }

        return $this;
    }
}
