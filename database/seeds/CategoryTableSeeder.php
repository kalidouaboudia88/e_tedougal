<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'name' => 'Vehicules',
                'on_menu' => rand(0,1),
            ],[
                'name' => 'Immobilier',
                'on_menu' => rand(0,1),
            ],[
                'name' => 'Multimedia',
                'on_menu' => rand(0,1),
            ],[
                'name' => 'Maison',
                'on_menu' => rand(0,1),
            ],[
                'name' => 'Agroalimentaire',
                'on_menu' => rand(0,1),
            ],[
                'name' => 'Services',
                'on_menu' => rand(0,1),
            ],[
                'name' => 'Habillement',
                'on_menu' => rand(0,1),
            ]
        ]);
    }
}
