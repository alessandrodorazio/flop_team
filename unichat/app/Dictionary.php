<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dictionary
 *
 * @property int $id
 * @property string $word
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dictionary whereWord($value)
 * @mixin \Eloquent
 */
class Dictionary extends Model
{
    //
}
