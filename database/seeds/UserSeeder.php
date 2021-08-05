<?php

use Illuminate\Database\Seeder;
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
        $user = new User();
        $user->name = "Bryan Alejandro";
        $user->apellidos = "Romero Osorio";
        $user->email = "bromero@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Maximo Alexander";
        $user->apellidos = "Fernández Munóz";
        $user->email = "mfernandez@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Jhan Jeyson";
        $user->apellidos = "Gutierrez Flores";
        $user->email = "jgutierrezf@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();
    }
}
