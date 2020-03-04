<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql1 = file_get_contents(database_path() . '/seeds/languages.sql');

        $sql2 = file_get_contents(database_path() . '/seeds/actors.sql');

        $sql3 = file_get_contents(database_path() . '/seeds/films.sql');

        $sql4 = file_get_contents(database_path() . '/seeds/film_actor.sql');

        $sql5 = file_get_contents(database_path() . '/seeds/roles.sql');

        DB::statement($sql1);
        DB::statement($sql2);
        DB::statement($sql3);
        DB::statement($sql4);
        DB::statement($sql5);
    }
}
