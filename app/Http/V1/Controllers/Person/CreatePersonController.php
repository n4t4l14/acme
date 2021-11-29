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
        try {
            $data = $request->get('data')['attributes'];
            $person = $this->createPersonUseCase->create(
                $data['identification_number'],
                $data['first_name'],
                $data['second_name'],
                $data['surnames'],
                $data['address'],
                $data['phone_number'],
                $data['city'],
                $data['role'],
            );

            return response()->json([
                'data' => [
                    'type' => 'person',
                    'id' => (string)$person->id,
                    'attributes' => [
                        'identification_number' => $person->identification_number,
                         'first_name' => $person->first_name,
                         'second_name' => $person->second_name,
                         'surnames' => $person->surnames,
                         'address' => $person->address,
                         'phone_number' => $person->phone_number,
                         'city' => $person->city,
                         'role' => $person->role,
                         'created_at' => $person->created_at,
                         'updated_at' => $person->updated_at,
                    ]
                ]
            ]);
        } catch (Throwable $exception) {
            return $this->responseGeneralError($exception);
        }

    }
}
