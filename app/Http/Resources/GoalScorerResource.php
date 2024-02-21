<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoalScorerResource extends JsonResource
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
            'player' => $this->player->name,
            'game' => $this->game->team1->name . ' vs ' . $this->game->team2->name,
            'goals' => $this->goals,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
