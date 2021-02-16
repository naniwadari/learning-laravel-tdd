<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function getVacancyLevelAttribute(): VacancyLevel
    {
        return new VacancyLevel($this->remainingCount());
    }

    /**
     * 残り席数
     */
    private function remainingCount(): int
    {
        return $this->capacity - $this->reservations()->count();
    }

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
