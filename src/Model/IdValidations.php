<?php

namespace UniversignRest\ClientComponent\Model;

use phpDocumentor\Reflection\Types\Boolean;

class IdValidations
{
    /**
     * @var string $document
     * The identity document to be prevalidated. Allowed formats are JPEG, PNG, GIF and PDF.
     */
    private string $document;
    /**
     * @var string $documentType
     * Used to restrict the type(s) of accepted IDs.
     * The document_type type concatenates the category of the identity document and its country code.
     * Value(s) can be id_card:fra for French ID cards, passport:
     *  * for passports (replace * with the three-letter country code corresponding to the accepted country.
     *       If you accept all European passports, replace
     *  * with eu. View the list of ISO 3166-1 alpha-3 codes here.
     */
    private string $documentType;
    /**
     * @var string $email
     * The identity document holder's email.
     */
    private string $email;
    /**
     * @var string $fullName
     * The identity document holder's full name.
     */
    private string $fullName;
    /**
     * @var string $birthdate
     * The identity document holder's birthdate. Expected format is YYYY-MM-DD.
     */
    private string $birthdate;
    /**
     * @var string $expiresAfter
     * The date after which the identity document is allowed to be expired. Expected format is YYYY-MM-DD.
     */
    private string $expiresAfter;
    /**
     * @var bool $allowManualValidation
     * Set to true if you want the identity document to be manually prevalidated in case the automatic prevalidation process fails.
     */
    private Boolean $allowManualValidation;

    public function getDocument(): string
    {
        return $this->document;
    }

    public function setDocument(string $document): void
    {
        $this->document = $document;
    }

    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    public function setDocumentType(string $documentType): void
    {
        $this->documentType = $documentType;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getExpiresAfter(): string
    {
        return $this->expiresAfter;
    }

    public function setExpiresAfter(string $expiresAfter): void
    {
        $this->expiresAfter = $expiresAfter;
    }

    public function isAllowManualValidation(): bool
    {
        return $this->allowManualValidation;
    }

    public function setAllowManualValidation(bool $allowManualValidation): void
    {
        $this->allowManualValidation = $allowManualValidation;
    }
}