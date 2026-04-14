<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name', 'control_number', 'type', 'status', 'health'];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
