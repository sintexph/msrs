<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrator', 
            'contact_number'=>'0000', 
            'email'=>'admin@sportscity.com.ph', 
            'department'=>'ITD', 
            'username'=>'admin', 
            'password'=>bcrypt('#ITdlovers'),
            'isAdmin'=>true
        ]);
        
        // $this->call(UsersTableSeeder::class);
    }
}
