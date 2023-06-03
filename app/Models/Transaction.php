<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'uuid',
        'travel_packages_uuid',
        'bookingId',
        'users_id',
        'additional_visa',
        'transaction_total',
        'transaction_status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_uuid', 'uuid');
    }

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_uuid', 'uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
