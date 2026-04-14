<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    protected $fillable = ['name', 'specialty', 'level', 'status'];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
