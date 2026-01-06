<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxCallback extends Model
{
    use HasFactory;

    protected $table    = 'trx_callbacks';
    protected $guarded = [];
}
