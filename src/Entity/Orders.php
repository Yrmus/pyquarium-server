<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $inputDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sunriseTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sunsetTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $feed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $morningFeedTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eveningFeedTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $executed;

    public function __construct()
    {
        $this->inputDate = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSunriseTime(): ?string
    {
        return $this->sunriseTime;
    }

    public function setSunriseTime(?string $sunriseTime): self
    {
        $this->sunriseTime = $sunriseTime;

        return $this;
    }

    public function getSunsetTime(): ?string
    {
        return $this->sunsetTime;
    }

    public function setSunsetTime(?string $sunsetTime): self
    {
        $this->sunsetTime = $sunsetTime;

        return $this;
    }

    public function getFeed(): ?bool
    {
        return $this->feed;
    }

    public function setFeed(bool $feed): self
    {
        $this->feed = $feed;

        return $this;
    }

    public function getMorningFeedTime(): ?string
    {
        return $this->morningFeedTime;
    }

    public function setMorningFeedTime(?string $morningFeedTime): self
    {
        $this->morningFeedTime = $morningFeedTime;

        return $this;
    }

    public function getEveningFeedTime(): ?string
    {
        return $this->eveningFeedTime;
    }

    public function setEveningFeedTime(?string $eveningFeedTime): self
    {
        $this->eveningFeedTime = $eveningFeedTime;

        return $this;
    }

    public function isExecuted(): ?bool
    {
        return $this->executed;
    }

    public function setExecuted(bool $executed): self
    {
        $this->executed = $executed;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInputDate()
    {
        return $this->inputDate;
    }

    /**
     * @param mixed $inputDate
     */
    public function setInputDate($inputDate): void
    {
        $this->inputDate = $inputDate;
    }


}
