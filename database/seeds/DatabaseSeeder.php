<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call('UserTableSeeder');
        //$this->call('CategoryTableSeeder');
        $this->call('ProjectTableSeeder');
    }
}

/**
* Project
*/
class ProjectTableSeeder extends Seeder
{
    
    public function run()
    {
        $faker = Faker\Factory::create();

        $i = 0;

        while ($i < 15) {
            $p = new \App\Project();
            $p->name = $faker->text;
            $p->description = $faker->paragraph;
            $p->save();

            $i++;
        }
    }
}


/**
* User
*/
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Alex';
        $user->email = 'alex@13bits.com.br';
        $user->password = bcrypt(123456);
        $user->save();
    }
}

/**
* Categorias
*/
class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $i = 0;
        while ( $i < 15) {
            $c = new \App\Category();
            $c->name = $i.'Nome da categoria';
            $c->save();
            $i ++;
        }
    }
}