<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //select from model where record is...
      $janine = \App\User::where('name', 'Janine')->first();
      $derrick = \App\User::where('name', 'Derrick')->first();
      $dejah = \App\User::where('name', 'Dejah')->first();

      $users = [ $janine, $derrick, $dejah];


        //DB facade way
        foreach ($users as $user) {
          DB::table('posts')->insert([
            'title' => '-I Had A Great Day',
            'user_id' => $user->id,
            // 'name' => $user->id,
            'post' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

          ]);
        }
        //Model way
        $post = new \App\Post;
        // $post->name = 'Derrick';
        $post->title = 'Another day';
        $post->post = 'Just another day';
        $post->user_id = $user->id;
        $post->save();


    }
}
