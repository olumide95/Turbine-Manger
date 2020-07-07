<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turbine;
use App\Models\TurbineMaintainanceLog;
use Illuminate\Support\Facades\Validator;

use App\PolynomialRegression;
class TurbineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {

     
    	$turbines = Turbine::get();
    	$turbines_due = Turbine::where('estimated_hours','>=','2800')->where('estimated_hours','<=','34000')->get();
      return view('turbines',compact('turbines','turbines_due'));
    }


    public function create(Request $request)
    {
    	$validator = Validator::make($request->all(), [
                'name' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }


           $turbine = Turbine::create($request->all());
          // return var_dump($turbine);
           if ($turbine) {
            $inspection_type = explode(' ', $request->inspection_type);
            $proposed_hours = explode(' ', $request->proposed_hours);
            $actual_hours = explode(' ', $request->actual_hours);
            $actual_date = explode(' ', $request->actual_date);
            $total_fails = explode(' ', $request->total_fails);

            foreach ($inspection_type as $key => $inspection) {
              $build[] = ['turbine_id'=>$turbine->id,'inspection_type'=>$inspection,'proposed_hours'=>(isset($proposed_hours[$key]) ? $proposed_hours[$key] : ''), 'actual_hours'=>(isset($actual_hours[$key]) ? $actual_hours[$key] : ''),'actual_date'=>(isset($actual_date[$key]) ? $actual_date[$key] : ''),'total_fails'=>(isset($total_fails[$key]) ? $total_fails[$key] : '') ];
              
            }
            TurbineMaintainanceLog::insert($build);

           
              $this->estimate($turbine);
            
         
           return redirect()->back()->with('message','Turbine Created successfully');
           }



    }

    public function estimate($turbine,$fail=0)
    {

      
      bcscale(10);
      
      $poly = new PolynomialRegression(3);
      $logs = TurbineMaintainanceLog::where('turbine_id',$turbine->id)->where('total_fails','!=','')->get()->toArray();

      foreach ($logs as $key => $log) {
        $poly->addData($log['total_fails'],$log['actual_hours']);
      }

     
      $co = $poly->getCoefficients();
      $e_hours = abs(intval($poly->interpolate($co,$fail)));
      $date = date_create(end($logs)['actual_date']);
      $date->modify('+'.$e_hours.' hours');
      
      Turbine::where('id',$turbine->id)->update(['estimated_hours'=>$e_hours,'estimated_date'=>$date]);

      return 'a2 -'.$co[2].' a1-'.$co[1].' a0-'.$co[0];
    }


    public function update_fails(Request $request)
    {
      $turbine = Turbine::find($request->id);

      if (isset($request->id)) {
        $turbine->update(['current_fails'=>$turbine->current_fails-1]);
      }
      else{
        $turbine->update(['current_fails'=>$turbine->current_fails+1]);
      }
      
      $this->estimate($turbine,$turbine->current_fails);
      return redirect()->back()->with('message','Turbine Updated succesfully');
    }


     public function add_log(Request $request)
    {
           
           $log = TurbineMaintainanceLog::where('turbine_id',$request->turbine_id)->where('actual_date','')->first();

           if(!isset($log->id)){
            $log  = new TurbineMaintainanceLog();
            $log->fill($request->all());
            $log->save();

           }


           $prev_log = TurbineMaintainanceLog::find($log->id-1);
           
           $t1 = StrToTime ($request->actual_date );
           $t2 = StrToTime ( $prev_log->actual_date );
           $diff = $t1 - $t2;
           $hours = $diff / 3600;
         // return var_dump($request->all());
           $turbine = Turbine::find($request->turbine_id);
           $log->update(['actual_date'=>$request->actual_date,'actual_hours'=>$hours,'total_fails'=>$turbine->current_fails,'remark'=>$request->remark]);
          // return var_dump($log);
           $turbine->update(['current_fails'=>0]);


            
               $this->estimate($turbine);
           
           return redirect()->back()->with('message','Log Entry Added succesfully');
           

    }

    public function update_log(Request $request,$id)
    {

     // 
      $turbine = Turbine::find($request->id);
      if ($request->isMethod('post')) {
        $data = $request->except('_token');


        $i = 0;

        foreach ($data['log_id'] as $key => $value) {
         //return $data;
         $log = TurbineMaintainanceLog::where('id',$data['log_id'][$i])->first();
   
         $log->update(['proposed_hours' => $data['proposed_hours'][$i],'inspection_type' => $data['inspection_type'][$i],'actual_date'=>$data['actual_date'][$i],'actual_hours'=>$data['actual_hours'][$i],'total_fails'=>$data['total_fails'][$i],'remark'=> $data['remark'][$i]]);

         $i++;
        }
        
        //return redirect()->back()->with('message','Logs Updated succesfully');
      }

      $logs = TurbineMaintainanceLog::where('turbine_id',$id)->get();


      return view('update-logs',compact('logs','turbine'));

    }

    public function get_log(Request $request)
    {     //return $request->all();
     
           $logs = TurbineMaintainanceLog::where('turbine_id',$request->turbine_id)->get();

           return $logs;
    }

    public function generate_report(Request $request)
    {
      $logs = TurbineMaintainanceLog::where('turbine_id',$request->id)->get();
      
      $turbine = Turbine::find($request->id);
      $csvExporter = new \Laracsv\Export();
      $csvExporter->build($logs, [ 'inspection_type'=>'SHUTDOWN','proposed_hours'=>'PROPOSED RUN HOURS','actual_hours'=>'ACTUAL RUN HOURS','actual_date'=>'ACTUAL DATE','total_fails'=>'FAILS/TRIPS','remark'=>'REMARK'])->download($turbine->name.'_Maintainance_Report.csv');



      /*$csvExporter = new \Laracsv\Export();

      $csvExporter->beforeEach(function ($turbine) {
          // Now notes field will have this value
          $user->quadratic_coefficient = $this->estimate($turbine,$turbine->current_fails); 
      });
      $csvExporter->build($turbine, [ 'name'=>'NAME','estimated_run_hours'=>'ESTIMATED RUN HOURS','current_fails'=>'CURRENT FAILS','estimated_date'=>'ESTIMATED DATE','quadratic_coefficient' => 'QUADRATIC COEFFICIENT'])->download($turbine->name.'.csv');*/
    }



    public function delete(Request $request)
    {	
    		
    		  $turbine = Turbine::find($request->id);
        
          if (!isset($turbine->id)) {
             return redirect()->back()->with('message','This Turbine has already been deleted');
          }
          $turbine->delete();
          $TurbineMaintainanceLog = TurbineMaintainanceLog::where('turbine_id',$request->id)->delete();
          $InspectionLog = \App\Models\InspectionLog::where('turbine_id',$request->id)->delete();
          $OperationLog = \App\Models\OperationLog::where('turbine_id',$request->id)->delete();

    	  	if ($turbine) {
    	  		 return redirect()->back()->with('message','Turbine deleted succesfully');
    	  	}
    }

}
