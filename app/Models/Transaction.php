<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int $contact_id
 * @property string $title
 * @property int $amount
 * @property int $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Transaction $contact
 * @method static Builder|Transaction newModelQuery()
 * @method static Builder|Transaction newQuery()
 * @method static Builder|Transaction query()
 * @method static Builder|Transaction whereAmount($value)
 * @method static Builder|Transaction whereContactId($value)
 * @method static Builder|Transaction whereCreatedAt($value)
 * @method static Builder|Transaction whereId($value)
 * @method static Builder|Transaction whereTitle($value)
 * @method static Builder|Transaction whereTotal($value)
 * @method static Builder|Transaction whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Transaction extends Model
{
    protected $casts = [
        'amount' => 'integer',
        'total' => 'integer',
    ];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
