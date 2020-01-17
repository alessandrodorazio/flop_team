<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\University
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\University whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class University extends Model
{
    //
}
