<?php

namespace App\Http\Controllers\Authenticate\repository;

use App\Http\Controllers\Authenticate\service\AuthenticatedService;
use App\Http\Requests\CredentialRequest;
use App\Repositories\Repository;
use App\Services\Service;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticatedRepository extends Repository implements Service, AuthenticatedService
{


    public function generateAuthenticated(CredentialRequest $request)
    {
        $message=null;
        $code = Response::HTTP_OK;

        $credentials = $request->only('email','password');
            try {
                if (! $token = auth('api_admin')->attempt($credentials)) {
                    $message= 'invalid_credentials';
                    $code = Response::HTTP_FORBIDDEN;
                }
            } catch (JWTException $e) {
                $message= 'could_not_create_token';
                $code= Response::HTTP_INTERNAL_SERVER_ERROR;
            }
            return compact('message','code','token');


    }

}
