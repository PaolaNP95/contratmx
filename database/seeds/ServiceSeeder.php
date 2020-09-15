<?php

use Illuminate\Database\Seeder;
use App\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service=new Service();
        $service->description='Alarma cableada o inalámbrica';
        $service->save();

        $service=new Service();
        $service->description='Cámaras de seguridad';
        $service->save();

        $service=new Service();
        $service->description='Barreras vehiculares';
        $service->save();

        $service=new Service();
        $service->description='Control de acceso y asistencia';
        $service->save();

        $service=new Service();
        $service->description='Cerca electrificada';
        $service->save();

        $service=new Service();
        $service->description='Sistema contra incendio';
        $service->save();

        $service=new Service();
        $service->description='Cableado estructurado';
        $service->save();

        $service=new Service();
        $service->description='Telefonía';
        $service->save();

        $service=new Service();
        $service->description='Site';
        $service->save();

        $service=new Service();
        $service->description='Fibra óptica';
        $service->save();

        $service=new Service();
        $service->description='Charola o escalerilla';
        $service->save();

        $service=new Service();
        $service->description='Tubería conduit pared delgada y gruesa';
        $service->save();

        $service=new Service();
        $service->description='Cableado de cualquier tipo';
        $service->save();
    }
}
