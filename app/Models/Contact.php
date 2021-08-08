<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read int $total
 * @property-read Collection|Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereName($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Contact extends Model
{
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getTotalAttribute(): int
    {
        $lt = Transaction::whereContactId($this->id)->orderByDesc('id')->first();
        return $lt ? $lt->total : 0;
    }
}
