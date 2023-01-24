<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id',
        'username',
        'nationality',
        'is_visa',
        'doe_passport',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'travel_packages_id', 'id');
    }
}
