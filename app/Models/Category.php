<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *@property int    $id
 *@property string $title
 *@property string $slug
 *@property string $image
 *@property int    $product_id
 *@property string $created_at
 *@property string $updated_at
 */
class Category extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function Basket(): BelongsToMany
    {
     return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }

}
