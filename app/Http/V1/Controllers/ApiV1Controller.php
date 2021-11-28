<?php

namespace App\Http\V1\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

class ApiV1Controller
{
    /** @type string  */
    public const GENERAL_ERROR = 'GENERAL_ERROR';

    /** @type string  */
    public const LOGICAL_ERROR = 'LOGICAL_ERROR';

    /**
     * @param Throwable $error
     * @return JsonResponse
     */
    protected function responseGeneralError(Throwable $error): JsonResponse
    {
        return response()->json([
            'errors' => [
                [
                    'code' => static::GENERAL_ERROR,
                    'detail' => 'Un error inesperado ha ocurrido',
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                ],
            ],
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param Throwable $error
     * @return JsonResponse
     */
    protected function responseCustomError(Throwable $error): JsonResponse
    {
        return response()->json([
            'errors' => [
                [
                    'code' => static::LOGICAL_ERROR,
                    'detail' => $error->getMessage(),
                    'status' => Response::HTTP_SERVICE_UNAVAILABLE,
                ],
            ],
        ], Response::HTTP_SERVICE_UNAVAILABLE);
    }
}
