<?php

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = new Departamento();
        $departamento->nombre = "AMAZONAS";
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = "ÁNCASH";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "APURIMAC";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "AREQUIPA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "AYACUCHO";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "CAJAMARCA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "CUSCO";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "HUANCAVELICA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "HUÁNUCO";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "ICA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "JUNÍN";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "LA LIBERTAD";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "LAMBAYEQUE";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "LIMA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "LORETO";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "MADRE DE DIOS";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "MOQUEGUA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "PASCO";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "PIURA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "PUNO";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "SAN MARTIN";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "TACNA";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "TUMBES";
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->nombre = "UCAYALI";
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = "LIMA - PROVINCIAS";
        $departamento->save();

        $departamento = new Departamento();
        $departamento->nombre = "CALLAO";
        $departamento->save();
    }
}
