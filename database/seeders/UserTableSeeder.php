<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role
        $rolAdmin= Role::where('name','admin')->first();
        $rolGuest= Role::where('name','guest')->first();
        $rolUser= Role::where('name','user')->first();
        $rolEditor= Role::where('name','editor')->first();

        //Usuario admin predefinido
        $user = new User();
        $user->name='admin';
        $user->email='admin@gmail.com';
        $user->password=Hash::make('1234');
        $user->save();
        $user->roles()->attach($rolAdmin);

        //Usuario user predefinido
        $user = new User();
        $user->name='user';
        $user->email='user@gmail.com';
        $user->password=Hash::make('1234');
        $user->save();
        $user->roles()->attach($rolUser);

        //Usuario editor predefinido
        $user = new User();
        $user->name='editor';
        $user->email='editor@gmail.com';
        $user->password=Hash::make('1234');
        $user->save();
        $user->roles()->attach($rolEditor);
    }
}
