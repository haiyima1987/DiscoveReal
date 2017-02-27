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
            'role_id' => 0,
            'username' => 'haiyima',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Haiyi',
            'lastName' => 'Ma',
            'email' => 'haiyima@yahoo.com',
            'birthday' => Carbon::parse('1987-02-25'),
            'gender' => 'M',
            'city' => 'Eindhoven',
            'country' => 'The Netherlands'
        ]);
        $user->save();
        $user = new User([
            'role_id' => 1,
            'username' => 'robsmith',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Rob',
            'lastName' => 'Smith',
            'email' => 'robsmith@yahoo.com',
            'birthday' => Carbon::parse('1985-05-19'),
            'gender' => 'M',
            'city' => 'New York',
            'country' => 'USA'
        ]);
        $user->save();
        $user = new User([
            'role_id' => 1,
            'username' => 'laurastone',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Laura',
            'lastName' => 'Stone',
            'email' => 'laurastone@yahoo.com',
            'birthday' => Carbon::parse('1989-11-02'),
            'gender' => 'F',
            'city' => 'Berlin',
            'country' => 'Germany'
        ]);
        $user->save();
        $user = new User([
            'role_id' => 1,
            'username' => 'mengxuezhang',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Mengxue',
            'lastName' => 'Zhang',
            'email' => 'zhangmengxue@yahoo.com',
            'birthday' => Carbon::parse('1991-07-12'),
            'gender' => 'F',
            'city' => 'Beijing',
            'country' => 'China'
        ]);
        $user->save();
    }
}
