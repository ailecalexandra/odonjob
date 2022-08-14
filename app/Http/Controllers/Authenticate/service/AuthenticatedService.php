<?php

namespace App\Http\Controllers\Authenticate\service;

use App\Http\Requests\CredentialRequest;

interface AuthenticatedService
{
    public function generateAuthenticated(CredentialRequest $request);

}
