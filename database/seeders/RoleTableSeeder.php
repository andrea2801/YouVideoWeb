<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Rol Admin
        $role = new Role();
        $role->name='admin';
        $role->description='Usuario administrador';
        $role->save();
        //Rol Guest
        $role = new Role();
        $role->name='guest';
        $role->description='Usuario invitado';
        $role->save();
        //Rol User
        $role = new Role();
        $role->name='user';
        $role->description='Usuario normal';
        $role->save();
        //Rol Editor
        $role = new Role();
        $role->name='editor';
        $role->description='Usuario editor';
        $role->save();
    }
}
