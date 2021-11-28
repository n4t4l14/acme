<?php

namespace App\Http\V1\Controllers\Person;
use App\Http\V1\Controllers\ApiV1Controller;

/**
 * Class CreatePersonController
 * @package App\Http\V1\Controllers\Person
 */
class CreatePersonController extends ApiV1Controller
{
    public function __invoke()
    {
        return 'hola desde controlador de creacion de persona';
    }
}
