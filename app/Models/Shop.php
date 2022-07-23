<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $shop_data)
 * @method static where($field, string $hash)
 * @method static find(int $id)
 * @property mixed $status
 */
class Shop extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name',
        'subdomain',
        'hash',
        'status',
    ];

    public static $STATUS_ACTIVE = 'active';
    public static $STATUS_INACTIVE = 'inactive';
    public static $STATUS_VALUES = ['active', 'inactive'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isActive(): bool
    {
        return $this->status === self::$STATUS_ACTIVE;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new UserScope);
    }
}
