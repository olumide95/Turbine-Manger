<?php

use Illuminate\Database\Seeder;
use App\Models\Device;
use App\Models\DeviceInspection;
class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $csv = array_map('str_getcsv', file('standard.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>1,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }





       $csv = array_map('str_getcsv', file('LUBRICATING OIL SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>2,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }






       $csv = array_map('str_getcsv', file('COOLING AND SEALING AIR SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>3,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }


        $csv = array_map('str_getcsv', file('TRIP OIL SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>4,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }

       $csv = array_map('str_getcsv', file('COOLING WATER SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>5,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }


        $csv = array_map('str_getcsv', file('STARTING MEANS SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>6,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }


       $csv = array_map('str_getcsv', file('GAS FUEL SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>7,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }


       $csv = array_map('str_getcsv', file('LIQUID FUEL SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>8,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }

       $csv = array_map('str_getcsv', file('ATOMIZING AIR SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>9,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }

        $csv = array_map('str_getcsv', file('FIRE FIGHTING SYSTEM.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
       //return var_dump($csv);

       foreach ($csv as  $device) {
       	  $current_device  = Device::firstOrCreate(['system_id'=>10,'name' => $device['device']]);
       	  $device['device_id'] = $current_device->id;
       	  $device_inspection = new DeviceInspection();
       	  unset($device['device']);
       	  $device_inspection->fill($device);
       	  $device_inspection->save();

          
         
       }
    }
}