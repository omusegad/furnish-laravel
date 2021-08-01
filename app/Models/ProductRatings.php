<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatings extends Model
{
    use HasFactory;

    public $table = "product_ratings";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the ProductRatings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
