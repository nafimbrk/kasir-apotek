<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(SalesDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
