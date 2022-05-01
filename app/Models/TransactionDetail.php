<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'series_id', 'grand_total'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
