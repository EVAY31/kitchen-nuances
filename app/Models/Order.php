<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $user_id
 * @property int $obtaining_method_id
 * @property string $address
 */
class Order extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function obtainingMethod(): BelongsTo
    {
        return $this->belongsTo(ObtainingMethod::class);
    }

    public function products(): BelongsToMany
    {
        return $this->BelongsToMany(Product::class);
    }
}
