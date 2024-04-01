<?php

namespace UniversignRest\ClientComponent\Model;

class certificatesMatch
{
    private string $email;

    private string $minCertificateLevel;

    private string $fullname;

    private string $phoneNumber;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getMinCertificateLevel(): string
    {
        return $this->minCertificateLevel;
    }

    public function setMinCertificateLevel(string $minCertificateLevel): void
    {
        $this->minCertificateLevel = $minCertificateLevel;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }
}