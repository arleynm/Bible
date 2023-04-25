<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TraducoesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

     public static $wrap = 'traducoes';
    public function toArray(Request $request): array
    {
        return [
            'data' => TraducoesResource::collection($this->collection)
        ];
    }
}
