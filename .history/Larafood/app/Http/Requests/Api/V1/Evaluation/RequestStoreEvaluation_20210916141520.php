<?php

namespace App\Http\Requests\Api\V1\Evaluation;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreEvaluation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!$client = auth()->user()) {
            return false;
        }

        if (!$order = app(OrderRepositoryInterface::class)->getOrderByIdentify($this->identifyOrder)) {
            return false;
        }

        return $client->id == $order->client_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
