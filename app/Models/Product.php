<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @property int    $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property string $characteristics
 * @property float  $price
 * @property int    $category_id
 * @property int    $brand_id
 * @property string $created_at
 * @property string $updated_at
 */

class Product extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function basket(): BelongsToMany
    {
        return $this->BelongsToMany(Basket::class)->withPivot('quantity');
    }
}
