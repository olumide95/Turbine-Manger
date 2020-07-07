<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Manifest;
use App\Models\Personnel;
use App\Models\ProjectPersonnel;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Cache;
class ManifestController extends Controller
{
    
   
   
    public function add_personnel(Request $request)
    {
    	  
    	  	$mainfest_personnel = Manifest::where('personnel_id',$request->personnel_id)->where('project_id',$request->project_id)->first();

    	  	if (isset($mainfest_personnel->id)) {
                return redirect()->back()->with('message','This Personnel has already been added to Manifest');
    	  	}
            $mainfest_personnel = Manifest::where('personnel_id',$request->personnel_id)->first();
            if (isset($mainfest_personnel->id)) {
                return redirect()->back()->with('message','This Personnel has already been added to another project');
            }
    	  	$mainfest_personnel = Manifest::create($request->all());

    	  	if ($mainfest_personnel) {
                return redirect()->back()->with('message','Personnel added to Manifest succesfully');
    	  	}


    }

    public function remove_personnel(Request $request)
    {	
    		
    		$mainfest_personnel = Manifest::where('personnel_id',$request->personnel_id)->where('project_id',$request->project_id)->first();
    		
    	  	if (!isset($mainfest_personnel->id)) {
    	  		 return redirect()->back()->with('message','This Personnel has already been removed');
    	  	}
    	  	$mainfest_personnel->delete();

    	  	if ($mainfest_personnel) {
    	  		 return redirect()->back()->with('message','Personnel removed from Manifest succesfully');
    	  	}
    }

    public function index(Request $request)
    {
    	
    	 $project_mainfest = Manifest::where('project_id',$request->id)->get();
    	 ## return $project_mainfest;
    	  return view('project-manifest',compact('project_mainfest'));
    }

    public function add_comment(Request $request)
    {

        ##return $request->all();
        
         Cache::forever('comment'.$request->project_id, $request->comment);

          return redirect()->back()->with('message','Comment added succesfully');
    }
}
