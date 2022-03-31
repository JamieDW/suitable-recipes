<?php

namespace App\Models;

use App\Services\DogService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Dog extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'allergies' => 'collection',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function getIsPuppy(): bool {
        return $this->age <= 6;
    }

    public function getAgeFormatted()
    {
        $years  = floor($this->age / 12);
        $months = $this->age % 12;

        $yearString   = '';
        $monthString  = '';

        if ($years == 1) {
            $yearString = $years . ' year';
        } elseif ($years > 1) {
            $yearString = $years . ' years';
        }

        if ($months == 1) {
            $monthString = $months . ' month';
        } elseif ($months > 1) {
            $monthString = $months . ' months';
        }

        return trim("{$yearString} {$monthString}");
    }

    public function getSuitableRecipes(): Collection {
        return (new DogService($this))->suitableRecipes();
    }
}
