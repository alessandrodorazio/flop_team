<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Room;

/**
 * App\User
 *
 * @property int $id
 * @property int|null $university_id
 * @property int|null $faculty_id
 * @property int $type
 * @property string $name
 * @property string $surname
 * @property string|null $phone_number
 * @property int|null $course_year
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $ban_expiration
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-write mixed $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBanExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCourseYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = ['email', 'password', 'type', 'name', 'surname'];
    protected $guarded = ['password'];
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function rooms() {
        return $this->belongsToMany(Room::class, 'room_members', 'user_id', 'room_id', 'id', 'id');
    }

    public function getUniversityId()
    {
        if($this->type === 1) {
            $faculty = Faculty::find($this->faculty_id);
            $department = Department::find($faculty->department_id);
            $university = University::find($department->university_id);
            return $university->id;
        } else {
            return $this->university_id;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDepartmentId()
    {
        $faculty = Faculty::find($this->faculty_id);
        $department = Department::find($faculty->department_id);
        return $department->id;
    }
}
