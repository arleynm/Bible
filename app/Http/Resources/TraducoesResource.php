<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TraducoesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'nome'=> $this->nome,
            'abreviacao'=> $this->abreviacao,
            'idioma'=> new IdiomaResource($this->whenLoaded('idioma')),
            'livros'=> $this->livros
        ];
    }
}
