<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use App\Models\Turbine;
use App\Models\Device;
class HomeController extends Controller
{/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turbine  = count(Turbine::get());
        $system  = count(System::get());
        $device  = count(Device::get());
        return view('home',compact('turbine','system','device'));
    }

    public function walk(Request $request)
    {

      //  return 1;
         $csv = array_map('str_getcsv', file($request->csv));
          //return var_dump($csv);

        array_walk($csv, function(&$a) use ($csv) {
           
          $a = array_combine($csv[0], $a);
        });

       (array_shift($csv)); # remove column header
        //return var_dump($csv);
       if ($csv == NULL) {
          return "CSV file isn't well Formatted";
       }
      
       foreach ($csv as $key => $value) {
           Personnel::create($value);
       }
      


    
       
    }
}
