# UniChat

Sono state spese 48 ore per lo sviluppo del Deliverable#1.

È stato generato un nuovo documento poiché quasi tutte le parti sono state modificate completamente.

[Documentazione Postman](https://documenter.getpostman.com/view/8518915/SWLYAW1g)

## Routes

Generate tramite Laravel

| Domain | Method    | URI | Name    | Action | Middleware |
| ------------- |:-------------:| -----:| ---- | --- | --- |
|        | POST      | api/admin/ban                           | admin.ban_user         | App\Http\Controllers\AdminController@ban_user      | api        |
|        | GET/HEAD  | api/auth/info                           | info                   | App\Http\Controllers\AuthController@me             | api        |
|        | POST      | api/auth/login                          | login                  | App\Http\Controllers\AuthController@login          | api        |
|        | GET/HEAD  | api/auth/login                          | login                  | App\Http\Controllers\AuthController@login          | api        |
|        | POST      | api/auth/logout                         | logout                 | App\Http\Controllers\AuthController@logout         | api        |
|        | POST      | api/auth/register                       | register               | App\Http\Controllers\AuthController@register       | api        |
|        | GET/HEAD  | api/departments                         | departments.index      | App\Http\Controllers\DepartmentController@index    | api        |
|        | POST      | api/departments                         | departments.store      | App\Http\Controllers\DepartmentController@store    | api        |
|        | PUT/PATCH | api/departments/{department}            | departments.update     | App\Http\Controllers\DepartmentController@update   | api        |
|        | GET/HEAD  | api/departments/{department}            | departments.show       | App\Http\Controllers\DepartmentController@show     | api        |
|        | GET/HEAD  | api/faculties                           | faculties.index        | App\Http\Controllers\FacultyController@index       | api        |
|        | POST      | api/faculties                           | faculties.store        | App\Http\Controllers\FacultyController@store       | api        |
|        | GET/HEAD  | api/faculties/{faculty}                 | faculties.show         | App\Http\Controllers\FacultyController@show        | api        |
|        | PUT/PATCH | api/faculties/{faculty}                 | faculties.update       | App\Http\Controllers\FacultyController@update      | api        |
|        | POST      | api/reports                             | reports.store          | App\Http\Controllers\ReportController@store        | api        |
|        | GET/HEAD  | api/reports                             | reports.index          | App\Http\Controllers\ReportController@index        | api        |
|        | GET/HEAD  | api/reports/user/{user_id}/all          | reports.filter_by_user | App\Http\Controllers\ReportController@filterByUser | api        |
|        | PUT/PATCH | api/reports/{report}                    | reports.update         | App\Http\Controllers\ReportController@update       | api        |
|        | GET/HEAD  | api/reports/{report}                    | reports.show           | App\Http\Controllers\ReportController@show         | api        |
|        | GET/HEAD  | api/rooms                               | rooms.index            | App\Http\Controllers\RoomController@index          | api        |
|        | POST      | api/rooms                               | rooms.store            | App\Http\Controllers\RoomController@store          | api        |
|        | POST      | api/rooms/find                          | rooms.find             | App\Http\Controllers\RoomController@find           | api        |
|        | POST      | api/rooms/{room_id}/admins/update       | rooms.update_admins    | App\Http\Controllers\RoomController@updateAdmins   | api        |
|        | POST      | api/rooms/{room_id}/messages            | messages.store         | App\Http\Controllers\MessageController@store       | api        |
|        | PUT/PATCH | api/rooms/{room_id}/messages/{message}  | messages.update        | App\Http\Controllers\MessageController@update      | api        |
|        | GET/HEAD  | api/rooms/{room_id}/messages/{message}  | messages.show          | App\Http\Controllers\MessageController@show        | api        |
|        | POST      | api/rooms/{room_id}/user/{user_id}/mute | rooms.mute_user        | App\Http\Controllers\RoomController@muteUser       | api        |
|        | PUT/PATCH | api/rooms/{room}                        | rooms.update           | App\Http\Controllers\RoomController@update         | api        |
|        | GET/HEAD  | api/rooms/{room}                        | rooms.show             | App\Http\Controllers\RoomController@show           | api        |
|        | GET/HEAD  | api/universities                        | universities.index     | App\Http\Controllers\UniversityController@index    | api        |
|        | POST      | api/universities                        | universities.store     | App\Http\Controllers\UniversityController@store    | api        |
|        | PUT/PATCH | api/universities/{university}           | universities.update    | App\Http\Controllers\UniversityController@update   | api        |
|        | GET/HEAD  | api/universities/{university}           | universities.show      | App\Http\Controllers\UniversityController@show     | api        |
|        | POST      | api/users                               | users.store            | App\Http\Controllers\UserController@store          | api        |
|        | GET/HEAD  | api/users                               | users.index            | App\Http\Controllers\UserController@index          | api        |
|        | POST      | api/users/filter                        |                        | App\Http\Controllers\UserController@filterUsers    | api        |
|        | GET/HEAD  | api/users/{user}                        | users.show             | App\Http\Controllers\UserController@show           | api        |
|        | PUT/PATCH | api/users/{user}                        | users.update           | App\Http\Controllers\UserController@update         | api        |
