<?php

namespace UniversignRest\ClientComponent\Model;

class CertificatesMatch
{
    /**
     * @var string $email
     * The participant email address.
     */
    private string $email;

    /**
     * @var string $minCertificateLevel
     * Minimum certificate level required for the match, among
     *  lcp (Lightweight Certificate Policy) or
     *  qcp (Qualified Certificate Policy).
     */
    private string $minCertificateLevel;

    /**
     * @var string $fullname
     * The participant full name.
     */
    private string $fullname;

    /**
     * @var string $phoneNumber
     * The participant phone number.
     * Expected format is E.164 ([+][country code][phone number including area code]).
     */
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