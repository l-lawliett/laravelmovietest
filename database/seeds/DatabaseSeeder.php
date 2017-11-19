<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(FilmsSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}

class UsersTableSeeder extends Seeder {

  public function run()
  {
      DB::table('users')->delete();

          DB::table('users')->insert(array(
            array(
                'name' => str_random(10),
                'email' => 'adminmail'.'@gmail.com',
                'password' => bcrypt('secretkey'),
                'role' => 1,
            ),
            array(
                'name' => str_random(10),
                'email' => 'usermail'.'@gmail.com',
                'password' => bcrypt('secretkey'),
                'role' => 2,
            )
    ));
  }

}

class GenresSeeder extends Seeder {

    public function run()
    {
        DB::table('genres')->delete();

            DB::table('genres')->insert(array(
             array('name'=>'Love/Drama'),
             array('name'=>'Fantasy/Science'),
             array('name'=>'Drama/Action'),
             array('name'=>'Fantasy/Science'),
             array('name'=>'Fantasy/Action'),
             array('name'=>'Drama/Crime'),
      ));
    }

}


class FilmsSeeder extends Seeder {

    public function run()
    {
        DB::table('films')->delete();

            DB::table('films')->insert(array(
             array('name'=>'Marry Me Now',
                   'slug'=> 'marry-me-now',
                   'description'=> 'Movie About marriage',
                   'release_date'=> '18-Jan-2018',
                   'rating' => 4,
                   'ticket_price' => '70',
                   'country' => 'United States Of America',
                   'user_id' => 1,
                   'genre_id' => 2,
                   'photo' => 'marry-me-now.png'

              ),
              array('name'=>'The Matrix',
                    'slug'=> 'the-matrix',
                    'description'=> 'Machine enslaves humans',
                    'release_date'=> '18-Feb-2018',
                    'rating' => 5,
                    'ticket_price' => '70',
                    'country' => 'United States Of America',
                    'user_id' => 1,
                    'genre_id' => 1,
                    'photo' => 'the-matrix.png'

               ),
               array('name'=>'King Kong',
                     'slug'=> 'king-kong',
                     'description'=> 'Giant Monkey Movie',
                     'release_date'=> '18-May-2018',
                     'rating' => 3,
                     'ticket_price' => '50',
                     'country' => 'Brittain',
                     'user_id' => 1,
                     'genre_id' => 1,
                     'photo' => 'king-kong.png'

                )
      ));
    }

}

class CommentsSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();

            DB::table('comments')->insert(array(
             array('comments'=>'Nice Movie',
                   'user_id' => 2,
                   'film_id' => 1,
              ),
              array('comments'=>'Love it',
                    'user_id' => 2,
                    'film_id' => 2,
               ),
               array('comments'=>'Hate This Shit',
                     'user_id' => 1,
                     'film_id' => 3,
                )
      ));
    }

  }
