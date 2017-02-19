<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'id' => 0,
            'role_id' => 0,
            'username' => 'haiyima',
            'password' => bcrypt(11111111),
            'name' => 'Haiyi',
            'email' => 'haiyima@yahoo.com',
            'birthday' => Carbon::parse('1987-02-25'),
            'gender' => 'M',
            'city' => 'Eindhoven',
            'country' => 'The Netherlands'
        ]);
        $user->save();
        $user = new User([
            'id' => 1,
            'role_id' => 1,
            'username' => 'robsmith',
            'password' => bcrypt(11111111),
            'name' => 'Rob Smith',
            'email' => 'robsmith@yahoo.com',
            'birthday' => Carbon::parse('1985-05-19'),
            'gender' => 'M',
            'city' => 'New York',
            'country' => 'USA'
        ]);
        $user->save();
        $user = new User([
            'id' => 2,
            'role_id' => 1,
            'username' => 'laurastone',
            'password' => bcrypt(11111111),
            'name' => 'Laura Stone',
            'email' => 'laurastone@yahoo.com',
            'birthday' => Carbon::parse('1989-11-02'),
            'gender' => 'F',
            'city' => 'Berlin',
            'country' => 'Germany'
        ]);
        $user->save();
        $user = new User([
            'id' => 3,
            'role_id' => 1,
            'username' => 'zhangmengxue',
            'password' => bcrypt(11111111),
            'name' => 'Zhang Mengxue',
            'email' => 'zhangmengxue@yahoo.com',
            'birthday' => Carbon::parse('1991-07-12'),
            'gender' => 'F',
            'city' => 'Beijing',
            'country' => 'China'
        ]);
        $user->save();
    }
}
