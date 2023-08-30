<?php

namespace App\Helpers;
trait SetsJsonResponse
{
    
public function setSuccessResponse($data = [], $statusCode = 200){
    return $this->setJsonResponse($data, $statusCode);}

public function setJsonResponse($data, $statusCode = 200){
    return response($data, $statusCode, ['Content-Type', 'application/json']);}
}