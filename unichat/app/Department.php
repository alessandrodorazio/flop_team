<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Department
 *
 * @property int $id
 * @property int $university_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends Model
{
    //
}
