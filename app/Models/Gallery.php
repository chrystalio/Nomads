<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'uuid',
        'travel_packages_uuid',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_uuid', 'uuid');
    }
}
