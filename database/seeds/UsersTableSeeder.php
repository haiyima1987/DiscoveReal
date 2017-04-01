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
            'role_id' => 1,
            'username' => 'haiyima',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Haiyi',
            'lastName' => 'Ma',
            'email' => 'haiyima@yahoo.com',
            'birthday' => Carbon::parse('1987-02-25'),
            'gender' => 'M',
            'city' => 'Eindhoven',
            'country' => 'The Netherlands',
            'api_token' => "Oyc7wbZNJMMl7qP28BgL8iWKqYdQE4m5EdJR0ZiN6Mx3FxwsmOrB84RpiLYh"
        ]);
        $user->save();
        $user = new User([
            'role_id' => 2,
            'username' => 'robsmith',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Rob',
            'lastName' => 'Smith',
            'email' => 'robsmith@yahoo.com',
            'birthday' => Carbon::parse('1985-05-19'),
            'gender' => 'M',
            'city' => 'New York',
            'country' => 'USA',
            'api_token' => "ilx6PjLhQzx0RR2pq3vHAPBoUSVHbH2sMRMFES4L4lKhvXnevAM1zMFlb8t3"
        ]);
        $user->save();
        $user = new User([
            'role_id' => 2,
            'username' => 'laurastone',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Laura',
            'lastName' => 'Stone',
            'email' => 'laurastone@yahoo.com',
            'birthday' => Carbon::parse('1989-11-02'),
            'gender' => 'F',
            'city' => 'Berlin',
            'country' => 'Germany',
            'api_token' => "i7EvKVjTMHbHxL6fmPerZMIaTdtspIv0CkP7pgTZtpxJE7SwJxvVx1gXuik7"
        ]);
        $user->save();
        $user = new User([
            'role_id' => 2,
            'username' => 'mengxuezhang',
            'password' => bcrypt(11111111),
            'photo' => null,
            'firstName' => 'Mengxue',
            'lastName' => 'Zhang',
            'email' => 'zhangmengxue@yahoo.com',
            'birthday' => Carbon::parse('1991-07-12'),
            'gender' => 'F',
            'city' => 'Beijing',
            'country' => 'China',
            'api_token' => "zOorsjQggLiCcwtjvbNjGmxOvUFtpqR0GZ2Tm53HINqtxVmBMo9UeONrbiDV"
        ]);
        $user->save();
    }
}
