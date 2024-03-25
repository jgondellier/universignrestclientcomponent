<?php

namespace Universign\Rest\ClientComponent\Service;

use Universign\Rest\ClientComponent\Model\certificatesMatch;
use Universign\Rest\ClientComponent\Model\certificatesMatchResponse;

interface UniversignClientInterface
{
    const VERSION = 'V1';
    const URI_CERTIFICATE_MATCH = '/certificates/match';

    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse;


}