<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @property int $id
 * @property int $user_id
 * @property int $room_id
 * @property int|null $thread_id
 * @property string $text
 * @property int $important
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereImportant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserId($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
    //
    public static function antifloodCheck()
    {

    }
}
