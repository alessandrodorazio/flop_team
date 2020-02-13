<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Social
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereValue($value)
 * @mixin \Eloquent
 */
class Social extends Model
{
    protected $fillable = ['name', 'value'];
}
