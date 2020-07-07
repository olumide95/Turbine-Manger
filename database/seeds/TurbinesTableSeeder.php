<?php

use Illuminate\Database\Seeder;
use App\Models\Turbine;
use App\Models\TurbineMaintainanceLog;
use App\Phpml\Regression\LeastSquares;
use App\PolynomialRegression;
class TurbinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file('turbines.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        
        Turbine::insert($csv);


        $csv = array_map('str_getcsv', file('turbine-logs.csv'));
         
        // return var_dump($csv);
        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
      TurbineMaintainanceLog::insert($csv);
      $turbines = Turbine::get();
      
      foreach ($turbines as $turbine) {      
    
      bcscale(10);
      $poly = new PolynomialRegression(3);
       $logs = TurbineMaintainanceLog::where('turbine_id',$turbine->id)->where('total_fails','!=','')->get()->toArray();
     
      foreach ($logs as $log) {
        
        $poly->addData($log['total_fails'],$log['actual_hours']);
      }

     
      $co = $poly->getCoefficients();
      $e_hours = abs(intval($poly->interpolate($co,0)));
      $date = date_create(end($logs)['actual_date']);
      $date->modify('+'.$e_hours.' hours');
      
      Turbine::where('id',$turbine->id)->update(['estimated_hours'=>$e_hours,'estimated_date'=>$date]);
       } 
     
      
    }
}
