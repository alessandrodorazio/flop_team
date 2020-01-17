<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Dictionary::class, 50)->create();
        factory(App\University::class, 5)->create();
        factory(App\Department::class, 20)->create();
        factory(App\Faculty::class, 100)->create();
        factory(App\User::class, 5000)->create();
        factory(App\Room::class, 100)->create()->each(function($room) {
            $users = User::where('university_id', $room->university_id)->get()->random(10);
            $room->users()->attach($users);
            for($i = 0; $i < 50; $i++) {
                $options = array();
                $options['room_id'] = $room->id;
                $options['user_id'] = $users[random_int(0,9)]->id;
                factory(App\Message::class, 1)->create($options);
                //thread casualmente da PHPMyAdmin
            }

        });

    }
}
