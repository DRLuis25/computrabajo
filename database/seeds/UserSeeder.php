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
        $user->name = "Luis Guillermo";
        $user->apellidos = "Delgado Rodriguez";
        $user->email = "ldelgado@unitru.edu.pe";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"; // password
        $user->save();
        
        $user = new User();
        $user->name = "Bryan Alejandro";
        $user->apellidos = "Romero Osorio";
        $user->email = "bromero@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Maximo Alexander";
        $user->apellidos = "Fernández Munóz";
        $user->email = "mfernandezm@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Ricardo Martín";
        $user->apellidos = "Rubio Cabanillas";
        $user->email = "rrubioc@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Jhan Jeyson";
        $user->apellidos = "Gutierrez Flores";
        $user->email = "jgutierrezf@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Jair Gerardo";
        $user->apellidos = "Rodriguez Cruz";
        $user->email = "jrodriguezcr@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $user = new User();
        $user->name = "Miguel Enrique";
        $user->apellidos = "Zavaleta Rojas";
        $user->email = "mzavaleta@unitru.edu.pe";
        $user->password = "$2y$10$7/xG2DyptIBjd5pW7OfTKegmryR.m7wqoleQQlSv1rwFCj1H0Mxlm"; // 123456789
        $user->save();

        $users = factory(User::class,10)->create();
    }
}
