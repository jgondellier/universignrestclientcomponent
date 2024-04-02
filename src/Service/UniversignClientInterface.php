<?php

namespace UniversignRest\ClientComponent\Service;

use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;
use UniversignRest\ClientComponent\Model\IdValidations;
use UniversignRest\ClientComponent\Model\IdValidationsResponse;

interface UniversignClientInterface
{
    const VERSION = 'v1';
    const URI_CERTIFICATE_MATCH = '/'.UniversignClientInterface::VERSION.'/certificates/match';
    const URI_ID_PREVALIDATION = '/'.UniversignClientInterface::VERSION.'/id-validations';

    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse;
    public function idValidation (IdValidations $idValidations):IdValidationsResponse;

}