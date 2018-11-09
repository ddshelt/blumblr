<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Using the DB facade
        DB::table('users')->insert([
            'name' => 'Janine',
            'email' => 'jhempy@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);

          //Using the user Model
          $user = new \App\User;
          $user->name = 'Derrick';
          $user->email = 'ddshelton0001@gmail.com';
          $user->password = bcrypt('Amirahsdad17');
          $user->save();

          $user = new \App\User;
          $user->name = 'Dejah';
          $user->email = 'dejahs@gmail.com';
          $user->password = bcrypt('1234');
          $user->save();
    }
}
