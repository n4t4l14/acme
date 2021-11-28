<?php

namespace App\Http\V1\Controllers\Person;
use App\Http\V1\Controllers\ApiV1Controller;
use App\Http\V1\Requests\CreatePersonFormRequest;
use App\UseCases\CreatePersonUseCase;
use Illuminate\Http\JsonResponse;
use Throwable;

/**
 * Class CreatePersonController
 * @package App\Http\V1\Controllers\Person
 */
class CreatePersonController extends ApiV1Controller
{
    /**
     * @var CreatePersonUseCase
     */
    private $createPersonUseCase;

    /**
     * @param CreatePersonUseCase $createPersonUseCase
     */
    public function __construct(CreatePersonUseCase $createPersonUseCase)
    {
        $this->createPersonUseCase = $createPersonUseCase;
    }

    /**
     * @param CreatePersonFormRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreatePersonFormRequest $request): JsonResponse
    {
        dd('aqui');
        try {
            $person = $this->createPersonUseCase->create(
                $request->get('identificationNumber'),
                $request->get('firstName'),
                $request->get('secondName'),
                $request->get('surnames'),
                $request->get('address'),
                $request->get('phoneNumber'),
                $request->get('city'),
                $request->get('role'),
            );

            return response()->json([
                'data' => $person->toArray()
            ]);
        } catch (Throwable $exception) {
            return $this->responseGeneralError($exception);
        }

    }
}
