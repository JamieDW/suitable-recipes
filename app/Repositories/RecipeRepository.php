<?php

namespace App\Repositories;

use App\Models\Recipe;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class RecipeRepository {

    private $cacheKey = 'recipes';
    
    public function all(): Collection
    {
        return Cache::rememberForever($this->cacheKey, function () {
            return Recipe::all();
        });
    }

    private function forget()
    {
        Cache::forget($this->cacheKey);
    }
}