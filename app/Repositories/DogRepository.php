<?php

namespace App\Repositories;

use App\Models\Dog;

class DogRepository {
    
    public function upsert(array $data = [], $id = null): Dog
    {
        $data['allergies'] = $data['allergies'] ?? [];

        return Dog::updateOrCreate(
            ['id' => $id],
            $data
        );
    }
}