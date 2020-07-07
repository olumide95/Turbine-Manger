<?php

namespace App\Http\Controllers;
use App\Models\Personnel;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\ProjectPersonnel;
use App\Models\Manifest;
use File;
class PersonnelController extends Controller
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
        $personnels = Personnel::get();
        return view('personnels',compact('personnels'));
    }


    public function create(Request $request)
    {

         $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'phone_number' => 'required',
                't_bosiet' => 'required',
                't_bosiet_validity_date' => 'required|date',
                'general_medicals_validity_date' => 'required|date',
                'tuberculosis_validity_date' => 'required|date',
                'alcohol_and_drug_validity_date' => 'required|date',
                'malaria_validity_date' => 'required|date',
                'osp' => 'required',
                'osp_validity_date' => 'required|date',
                'general_medicals' => 'required',
                'tuberculosis' => 'required',
                'alcohol_and_drug' => 'required',
               
            ]);

         
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

  
        $data = $request->all();
     


        if ($request->hasFile('t_bosiet')) {
            $t_bosiet = $request->file('t_bosiet')->store('T-Bosiet');
               $data['t_bosiet'] = $t_bosiet;
            
              
        }

        if ($request->hasFile('osp')) {
            $osp = $request->file('osp')->store('OSP');
               $data['osp'] = $osp;
            
              
        }


        if ($request->hasFile('trade_certificate')) {
            $osp = $request->file('trade_certificate')->store('Trade Certificate');
               $data['trade_certificate'] = $osp;
            
              
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image');
               $data['image'] = $image;
            
              
        }

        if ($request->hasFile('general_medicals')) {
            $general_medicals = $request->file('general_medicals')->store('General Medicals');
               $data['general_medicals'] = $general_medicals;
              
        }

        if ($request->hasFile('tuberculosis')) {
            $tuberculosis = $request->file('tuberculosis')->store('Tuberculosis');
               $data['tuberculosis'] = $tuberculosis;
              
        }

        if ($request->hasFile('alcohol_and_drug')) {
            $alcohol_and_drug = $request->file('alcohol_and_drug')->store('Alcohol & Drug');
               $data['alcohol_and_drug'] = $alcohol_and_drug;
              
        }

        if ($request->hasFile('malaria')) {
            $malaria = $request->file('malaria')->store('Malaria');
               $data['malaria'] = $malaria;
              
        }

        $data['name'] = $data['firstname'].' '.$data['lastname']; 
        $personnel = Personnel::Create($data);
        
       return redirect()->back()->with('message','Personnel Added succesfully');
    }


    public function update(Request $request)
    {

        $data = $request->all();
     
         $personnel = Personnel::find($request->personnel_id);

        if (!isset($personnel->id)) {
           return redirect()->back()->with('message','Personnel Does not Exist');
        }

        if ($request->hasFile('t_bosiet')) {
            $t_bosiet = $request->file('t_bosiet')->store('T-Bosiet');
               $data['t_bosiet'] = $t_bosiet;
         
              
        }else{

            unset($data['t_bosiet_validity_date']); 
        }

        if ($request->hasFile('osp')) {
            $osp = $request->file('osp')->store('OSP');
               $data['osp'] = $osp;
         
              
        }else{
            unset($data['osp']); 
            unset($data['osp_validity_date']); 
        }

        if ($request->hasFile('trade_certificate')) {
            $osp = $request->file('trade_certificate')->store('Trade Certificate');
               $data['trade_certificate'] = $osp;
            
              
        }else{
            unset($data['trade_certificate']); 
            unset($data['trade_certificate_validity_date']); 
        }




        if ($request->hasFile('general_medicals')) {
            $general_medicals = $request->file('general_medicals')->store('General Medicals');
               $data['general_medicals'] = $general_medicals;

             
              
        }else{
            unset($data['general_medicals']); 
            unset($data['general_medicals_validity_date']); 
        }

         if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image');
               $data['image'] = $image; 
              
        }else {
            unset($data['image']); 
        }

        if ($request->hasFile('tuberculosis')) {
            $tuberculosis = $request->file('tuberculosis')->store('Tuberculosis');
               $data['tuberculosis'] = $tuberculosis;
            
              
        }else{
            unset($data['tuberculosis']);
            unset($data['tuberculosis_validity_date']); 
        }

        if ($request->hasFile('alcohol_and_drug')) {
            $alcohol_and_drug = $request->file('alcohol_and_drug')->store('Alcohol & Drug');
               $data['alcohol_and_drug'] = $alcohol_and_drug;
             
                
        }else{
            unset($data['alcohol_and_drug']);
            unset($data['alcohol_and_drug_validity_date']); 
        }

        if ($request->hasFile('malaria')) {
            $malaria = $request->file('malaria')->store('Malaria');
               $data['malaria'] = $malaria;
      
              
        }else{
            unset($data['malaria']);
            unset($data['malaria_validity_date']); 
        }

        $data['name'] = $data['firstname'].' '.$data['lastname']; 

        $personnel_id = $personnel->id;
        $personnel = $personnel->update($data);
       
       return redirect()->back()->with('message','Personnel Updated succesfully');
    }

    public function person(Request $request)
    {
        $personnel = Personnel::find($request->id);
        if (!isset($personnel->id)) {
           abort(404);
        }
        return view('person',compact('personnel'));
    }

  

    public function delete($id,Request $request)
    {
        $personnel = Personnel::find($id);
        if (!isset($personnel->id)) {
           abort(404);
        }

        $projects = ProjectPersonnel::where('personnel_id',$personnel->id)->get();
         if ($projects != '[]') {
            foreach ($projects as $project) {
                $project->delete();
            }
            
        }

        $mainfests = Manifest::where('personnel_id',$personnel->id)->get();
        if ($mainfests != '[]') {

            foreach ($mainfests as $mainfest) {
                $mainfest->delete();
            }
             
        }
     
        

        if (isset($personnel->t_bosiet)) {
           
             Storage::delete($personnel->t_bosiet);
              
        }

        if (isset($personnel->osp)) {
           
              Storage::delete($personnel->osp);
        }


        if (isset($personnel->trade_certificate)) {
            
              Storage::delete($personnel->trade_certificate);
        }


        if (isset($personnel->image)) {
            
            Storage::delete($personnel->image);
              
        }

        if (isset($personnel->general_medicals)) {
            
              Storage::delete($personnel->general_medicals);
        }

        if (isset($personnel->tuberculosis)) {
           Storage::delete($personnel->tuberculosis);
        }

        if (isset($personnel->alcohol_and_drug)) {
             Storage::delete($personnel->alcohol_and_drug);
              
        }

        if (isset($personnel->malaria)) {
          
               Storage::delete($personnel->malaria);
        }
        $personnel->delete();
        return redirect()->back()->with('message','Personnel Deleted succesfully');
    }

    public function delete_certificate($type,Request $request)
    {

        $certs = ['1' => 't_bosiet','2' => 'general_medicals','3' =>'tuberculosis','4'=>'alcohol_and_drug','5'=>'osp','6' => 'malaria','7' => 'trade_certificate'];

         
        $personnel = Personnel::find($request->id);
       
        Storage::delete($personnel[$certs[$type]]);
        $personnel->update([$certs[$type] =>NULL,$certs[$type].'_validity_date' => NULL]);
        return redirect()->back()->with('message',$certs[$request->type].' Certificate Deleted succesfully');
    }


}
