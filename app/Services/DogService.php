<?php

namespace App\Services;

use App\Models\Dog;
use App\Repositories\RecipeRepository;
use Illuminate\Support\Collection;

class DogService {

    protected $dog;

    public function __construct(Dog $dog)
    {
        $this->dog = $dog;
    }

    public function suitableRecipes(): Collection {

        $dog     = $this->dog;
        $recipes = (new RecipeRepository)->all();

        if($dog->getIsPuppy()) {
            $recipes = $recipes->where('puppy_inappropriate', false);
        }
        
        $recipes = $recipes->where('breed_inappropriate', '!=', $dog->breed);

        $recipes = $recipes->reject(function ($recipe) use ($dog) {
            return $dog->allergies->contains($recipe->allergen);
        });

        return $recipes;
    }
}