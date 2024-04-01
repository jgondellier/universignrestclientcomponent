<?php

namespace UniversignRest\ClientComponent\Service\CertificatesMatch;

use UniversignRest\ClientComponent\Model\certificatesMatch;
use UniversignRest\ClientComponent\Model\certificatesMatchResponse;

interface CertificatesMatchClientInterface
{
    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse;
}