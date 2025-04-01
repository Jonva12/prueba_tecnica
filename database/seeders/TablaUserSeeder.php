<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;


class TablaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('pass1234'),
            'dni' => '41414141K',
            'fecha_nacimiento' => '1994-03-09',
            'rol_id' => 1,
        ]);


        $user2 = User::create([
            'name' => 'Usuario',
            'email' => 'usuario@usuario.com',
            'password' => bcrypt('pass1234'),
            'dni' => '52525252V',
            'fecha_nacimiento' => '1950-03-23',
            'rol_id' => 2,
        ]);

    }
}
