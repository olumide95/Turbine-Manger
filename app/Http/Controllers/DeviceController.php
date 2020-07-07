<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use App\Models\Turbine;
use App\Models\Device;
use App\Models\DeviceInspection;
use App\Models\InspectionLog;

use Illuminate\Support\Facades\Validator;
class DeviceController extends Controller
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
    	$system = System::find($request->sid);
      $turbine = Turbine::find($request->tid);
      $devices = Device::where('system_id',$system->id)->get();
    	return view('devices',compact('system','turbine','devices'));
    }


    public function create(Request $request)
    {
    	
      if ($request->isMethod('post')) {
        
      $validator = Validator::make($request->all(), [
                'name' => 'required',
                'system_id'=>'required',
                'inspection_period'=>'required',
                'check' => 'required'

            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }
            $data = $request->all();

           $device = Device::firstOrCreate(['name'=>$data['name']], $data);


           
           $data['device_id'] = $device->id;
           $data[$data['inspection_period']] = $data['state'];
           $device_inspection = DeviceInspection::create($data);

           if ($device) {
           return redirect()->back()->with('message','Device Created successfully');
           }

         }
         $systems = System::get();
         return view('create-device',compact('systems'));

    }


     public function update_log(Request $request)
    {
     
           $system = InspectionLog::create($request->all());

           if ($system) {
           return redirect()->back()->with('message','Log Updated successfully');
           }

    }

    public function get_log(Request $request)
    {     //return $request->all();
     
           $logs = InspectionLog::where('turbine_id',$request->turbine_id)->where('system_id',$request->system_id)->where('inspection_id',$request->inspection_id)->orderBy('created_at','date')->get();

           return $logs;
    }


    public function update(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'location' => 'required',
                'project_manager' => 'required',
               

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }


           $project = Project::where('id',$request->project_id)->update($request->except('_token','project_id'));

           if ($project) {
           return redirect()->back()->with('message','Project updated successfully');
           }
    }



    public function delete(Request $request)
    {	
    		
    		$system = Turbine::find($request->id);
    		
    	  	if (!isset($system->id)) {
    	  		 return redirect()->back()->with('message','This Turbine has already been deleted');
    	  	}
    	  	$system->delete();

    	  	if ($system) {
    	  		 return redirect()->back()->with('message','Turbine deleted successfully');
    	  	}
    }

}
