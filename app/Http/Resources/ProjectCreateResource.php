<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'deskripsi' => $this->deskripsi,
            'status_id' => $this->status,
            'category_id' => $this->category,
            'harga_total' => $this->harga,
            'customer_name' => $this->customer,
            'code_project' => $this->code

        ];
    }
}
