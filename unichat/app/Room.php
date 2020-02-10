<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * App\Room
 *
 * @property int $id
 * @property int $university_id
 * @property int $type
 * @property int $archived
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $raw
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereArchived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Room extends Model
{
    //
    protected $appends = ['messages', 'members'];
    protected $fillable = ['name', 'description', 'type'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'room_members', 'room_id', 'user_id', 'id', 'id');
    }

    public static function realName($room_id) {
        $room = Room::find($room_id);
        if($room->type !== 1) {
            return $room->name;
        } else {
            $u = $room->users()->where('user_id', '<>', auth()->id())->first();
            return 'Chat diretta con '.User::getFullName($u->id);
        }
    }

    public function getMessagesAttribute() {
        return Message::where('room_id', $this->id)->orderBy('created_at', 'desc')->get();
    }

    public function getMembersAttribute() {
        return $this->users()->get();
    }

    public static function getLastMessage($room_id) {
        $message = Message::where('room_id', $room_id)->orderBy('created_at', 'desc')->first();
        return $message->created_at->format('d/m/Y H:i');
    }

    public static function realDescription($room_id) {
        $room = Room::find($room_id);
        if($room->type != 1) {
            return $room->description;
        }
        return '';
    }
}
