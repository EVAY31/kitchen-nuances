<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $user_id
 * @property string $address
 * @property double $final_price
 * @property int $status
 */
class Order extends Model
{
    use HasFactory;

    public const NEW = 0;
    public const COLLECTED = 1;
    public const COMPLETED = 2;
    public const CANCELLED = 3;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->BelongsToMany(Product::class);
    }
}
