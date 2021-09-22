<?php

use Illuminate\Database\Seeder;

class UserOficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_oficio = new userOficio();
        $user_oficio -> user_id = 4;
        $user_oficio -> oficio_id = 1;
        $user_oficio -> save();

        $user_oficio = new userOficio();
        $user_oficio -> user_id = 4;
        $user_oficio -> oficio_id = 2;
        $user_oficio -> save();

        $user_oficio = new userOficio();
        $user_oficio -> user_id = 4;
        $user_oficio -> oficio_id = 3;
        $user_oficio -> save();
    }
}
