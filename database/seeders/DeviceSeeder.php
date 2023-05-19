<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\device;
use App\Models\producto;
class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {

        device::factory()->count(5)->create();
        /*$devices = device::all();
        
        $devices->each(function ($devices){
            productos::factory(5)->create([
                'productos_id' => $devices->id,
            ]);

        });*/
        
    }
}
