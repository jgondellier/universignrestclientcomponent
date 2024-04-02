<?php

namespace UniversignRest\ClientComponent\Service\IdValidation;

use UniversignRest\ClientComponent\Model\IdValidations;
use UniversignRest\ClientComponent\Model\IdValidationsResponse;

interface IdValidationClientInterface
{
    public function idValidation (IdValidations $idValidations):IdValidationsResponse;
}