<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'prod_name',
        'serial_num',
        'manufacturer',
        'price',
        'purchased_date',
        'qty',
        'note',
        // Add other attributes that can be mass-assigned here
    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}
}
