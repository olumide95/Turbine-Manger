<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use App\Models\Turbine;
use Illuminate\Support\Facades\Validator;

use App\Models\InspectionLog;
use App\Models\OperationLog;
class SystemController extends Controller
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
  
    public function index(Request $request)
    {
    	$systems = System::get();
        $turbine = Turbine::find($request->id);
    	return view('systems',compact('systems','turbine'));
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


           $system = System::create($request->all());

           if ($system) {
           return redirect()->back()->with('message','System Created succesfully');
           }



    }

    public function update_log(Request $request)
    {
     
           $system = OperationLog::create($request->all());

           if ($system) {
           return redirect()->back()->with('message','Log Updated succesfully');
           }

    }

    public function get_log(Request $request)
    {     //return $request->all();
     
           $logs = OperationLog::where('turbine_id',$request->turbine_id)->where('system_id',$request->system_id)->orderBy('created_at','date')->get();

           return $logs;
    }


    public function generate_report(Request $request)
    {
       

      $operationlog = OperationLog::where('turbine_id',$request->tid)->where('system_id',$request->sid)->orderBy('created_at','date')->get();

      $inspectionlog =  InspectionLog::where('turbine_id',$request->tid)->where('system_id',$request->sid)->orderBy('created_at','date')->get();


      //return var_dump($operationlog, $inspectionlog);
      $turbine = Turbine::find($request->tid);
      $system = System::find($request->sid);
      return view('system-report',compact('operationlog','inspectionlog','turbine','system'));
    }


    public function generate_report_csv(Request $request)
    {

      $csvExporter = new \Laracsv\Export();
      $type = '';
      if ($request->type==1) {
       $log = OperationLog::where('turbine_id',$request->tid)->where('system_id',$request->sid)->orderBy('created_at','date')->get();
       $headers = [ 'start_date'=>'START DATE','end_date'=>'END DATE','remark'=>'REMARK'];
       $type = '_Operation_Report';
      }
      elseif ($request->type==2) {
        $log = InspectionLog::where('turbine_id',$request->tid)->where('system_id',$request->sid)->orderBy('created_at','date')->get();
        $headers = [ 'device'=>'DEVICE','check'=>'INSPECTION','remark'=>'REMARK','date'=>'DATE'];
        $type = '_Inspection_Report';
        $csvExporter->beforeEach(function ($log) {
          $log->device = $log->DeviceInspection->Device->name;
          $log->check = $log->DeviceInspection->check;
      });
      }

    
      $turbine = Turbine::find($request->tid);
      $system = System::find($request->sid);
      
      $csvExporter->build($log, $headers)->download($turbine->name.'_'.$system->name.$type.'.csv');

    }



    public function delete(Request $request)
    {	
    		
    		$system = Turbine::find($request->id);
    		
    	  	if (!isset($system->id)) {
    	  		 return redirect()->back()->with('message','This Turbine has already been deleted');
    	  	}
    	  	$system->delete();

    	  	if ($system) {
    	  		 return redirect()->back()->with('message','Turbine deleted succesfully');
    	  	}
    }

}
