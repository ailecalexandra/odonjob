<?php

namespace App\Http\Controllers\Authenticate\controller;

use App\Http\Controllers\Authenticate\service\AuthenticatedService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CredentialRequest;
use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticatedController extends Controller
{
    protected $service;
    public function __construct(AuthenticatedService $authenticateService)
    {
        $this->authenticateService = $authenticateService;
    }
    public function login(CredentialRequest $request)
    {
         $response = $this->authenticateService->generateAuthenticated($request);
         if($response['code'] != Response::HTTP_OK){
             return $this->sendErrorPopup([$response['message']],$response['code']);
         }
        return $this->responseWithData($response);
    }



}
