<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => 'Titre de mon idée: ' .$this->title,
            'suggestion' => substr($this->suggestion, 0, 10) .'...',
            'statut' => 'Etat de l\'idée: ' .$this->statut,
        ];
    }
}
