<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
            Comando para rodar as seeds:
                . php artisan db:seed                               <-- rodar TODAS as seeds
                . php artisan db:seed --class=UsersTableSeeder      <-- rodar as seeders da tabela Users
        */
        $this->call(UsersTableSeeder::class);
    }
}
