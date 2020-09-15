<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_costumer = Role::where('name', 'costumer')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_employ = Role::where('name', 'employ')->first();

        $user = new User();
        $user->user_name = 'PAOLA';
        $user->lastname = 'NIEVES PERALES';
        $user->address='-';
        $user->ocupation='-';
        $user->phone=4491053834;
        $user->company='CONTRATMX';
        $user->state='AGUASCALIENTES';
        $user->city='AGUASCALIENTES';
        $user->zip='20298';
        $user->email = 'paola.nieves863@gmail.com';
        $user->password = bcrypt('Pass123$');
        $user->save();
        $user->roles()->attach($role_admin);

        $user2 = new User();
        $user2->user_name = 'MARÍA JÓSE';
        $user2->lastname = 'MARTÍNEZ VALDEZ';
        $user2->address='-';
        $user2->ocupation='-';
        $user2->phone=4491053834;
        $user2->company='MAINDTEL';
        $user2->state='AGUASCALIENTES';
        $user2->city='AGUASCALIENTES';
        $user2->zip='20298';
        $user2->email = 'maria@mail.com';
        $user2->password = bcrypt('Pass123$');
        $user2->save();
        $user2->roles()->attach($role_costumer);
    }
}
