<?php

namespace Universign\Rest\ClientComponent\Service\CertificatesMatch;

use Universign\Rest\ClientComponent\Model\certificatesMatch;
use Universign\Rest\ClientComponent\Model\certificatesMatchResponse;

interface CertificatesMatchClientInterface
{
    public function certificatesMatch(certificatesMatch $certificatesMatch):certificatesMatchResponse;
}