<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RoleTableSeeder');
        $this->call('CategoriesTableSeeder');
    }
}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        Role::create(array('role' => 'admin'));
        Role::create(array('role' => 'user'));
    }

}
class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array('name' => 'vestidos cortos de día', 'description' => 'Vestidos cortos'));
        Category::create(array('name' => 'vestidos largos', 'description' => 'Vestidos de gala'));
        Category::create(array('name' => 'vestidos largos', 'description' => 'Vestidos largos 1.10 m'));
        Category::create(array('name' => 'vestidos gala', 'description' => 'Vestidos de noches'));
        Category::create(array('name' => 'vestidos gala', 'description' => 'Vestidos de noches'));
        Category::create(array('name' => 'blusas', 'description' => 'Blusa sencilla'));
        Category::create(array('name' => 'pantalones', 'description' => 'Todo tipo'));
        Category::create(array('name' => 'jeans', 'description' => 'Pantalones jeans'));
        Category::create(array('name' => 'shorts', 'description' => 'Shorst de todo tipo'));
        Category::create(array('name' => 'sueter', 'description' => 'Sueter de todo tipo'));
        Category::create(array('name' => 'abrigo', 'description' => 'Abrigo de invierno'));
        Category::create(array('name' => 'extra', 'description' => 'Otro tipo de categoria'));

    }

}
