<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\Tenant\TenantResource;
use App\Http\Resources\Product\ProductResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->identify,
            'total' => $this->total,
            'status' => $this->status,
            'date' => Carbon::make($this->created_at)->format('Y-m-d'),
            'company' => new TenantResource($this->tenant),
            'client' => $this->client_id ? new ClientResource($this->client) : '',
            'table' => $this->table_id ? new TableResource($this->table) : '',
            'products' => ProductResource::collection($this->products),
            'evaluatons' => EvaluationResource::collection($this->evaluations),
        ];
    }
}
