<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Faculty
 *
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faculty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faculty extends Model
{
    //
}
