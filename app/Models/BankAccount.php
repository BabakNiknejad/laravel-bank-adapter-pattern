<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function bank()
    {
        return $this->belongsTo(BankType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}