# blumblr instruction

- create new progect in Laravel (laravel new (name))

<!-- Postgres error -->
- added postgres to path
<!-- sudo mkdir -p /etc/paths.d &&
echo /Applications/Postgres.app/Contents/Versions/latest/bin | sudo tee /etc/paths.d/postgresapp -->
- created PSQL Database
  + create user
  + alter Database
  + revoke
  + grant

- update .env file to connect Laravel to database
<!-- DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=(database name)
DB_USERNAME=(database user)
DB_PASSWORD=(database password) -->
  + run php artisan migrate to confirm migrations are working properly

- Add authentication
  + run php artisan make:auth

- Create Table
  + run php artisan make:migration (name of table)
  + database/Migrations
    - find table
    - follow format of public function up
    - any information in post table needs a column

- In views folder created new folder called posts
  + create a view to see posts
    - create index.blade.php in Posts folder
  + create Post Controller
    - php artisan make:controller PostController --resource

- Create Model
  + php artisan make:Model (model name)

- Create Seeds
  + In Database Seeder (runs other seed files)
  + copy code into run function: $this->call(PostsTableSeeder::class);
  + run php artisan make:seeder PostsTableSeeder
  + run php artisan make:seeder UsersTableSeeder

- Insert data into seeder
  + On the UsersTableSeeder:
  + DB::table('users')->insert([
      'name' => 'Janine',
      'email' => 'jhempy@gmail.com',
      'password' => bcrypt('secret'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);


- On the PostsTableSeeder:
  + DB::table('posts')->insert([
      'title' => 'Another day sad',
      'user_id' => $dejah->id,
      'name' => '',
      'post' => '',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    + supply all of the values for all of the fields you would like to populate
    + for created and updated: Use Carbon package
      - use Carbon\Carbon;
    + build up user account through seed file
    + run php artisan migrate:refresh --seed

- php artisan tinker
  + ( basically console.log for models)
  + i.e. $janine = \App\User::where('name', 'Janine')->first(); (get first available record)
- check to make sure that Seeding is set up correctly
- Change index function on PostController
  + $posts = \App\Post::where('user_id', 3)->get(); (SHOULD return Posts only created by user 3)
  + substitute the id # for Auth::id(); (found in resources/views/layouts/app.blade.php line 17)
    - should allow users only to view posts of the user who is signed in
    - Make sure Auth is being refrenced from the rot by adding "\" in front of Auth
  + Now the index respects who the logged in user is

- add middleware to routes
  + i.e. Route::resource('posts','PostController')->middleware('auth');

- create a form to create posts
  - On index.blade.php in views
    + <p class="text-center"><a href="/posts/create">Create a new Post</a></p>
    + create form
      - In resources/views/posts/index.blade.php
        + create form and give form a method of post
        + set action equal to "/posts"
        + do not forget csrf field in form{{csrf_field()}}
      - Go to PostController:
        + return view('posts.create');



- In the Post Model:
  + getting rid of #'s in the 'user_id' field

(Defining Accessor)
- In the Post model:

    - public function getTitleAttribute(){
      return strToUpper($value);
      }
  + replace title on index.blade.php with getTitle
    - run php artisan Tinker to test model
