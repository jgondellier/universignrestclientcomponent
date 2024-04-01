<?php

namespace UniversignRest\ClientComponent\Service;

use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;

interface UniversignClientInterface
{
    const VERSION = 'V1';
    const URI_CERTIFICATE_MATCH = '/certificates/match';

    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse;


}