<?php

use App\Models\System;
use Illuminate\Database\Seeder;

class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systems  = [
        	 [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'STANDARD DEVICES'
                
            ],
            [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'LUBRICATING OIL SYSTEM'
                
            ],
             [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'COOLING AND SEALING AIR SYSTEM'
                
            ],
             [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'TRIP OIL SYSTEM'
                
            ],
            [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'COOLING WATER SYSTEM'
                
            ],
            [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'STARTING MEANS SYSTEM'
                
            ],			
             
             [
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'GAS FUEL SYSTEM'
                
            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'LIQUID FUEL SYSTEM'

            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'ATOMIZING AIR SYSTEM'

            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'FIRE FIGHTING SYSTEM'

            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'STEAM INJECTION SYSTEM'

            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'FIRE FIGHTING SYSTEM'

            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'AIR INLET BLEED HEATING SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'HYDRAULIC SUPPLY SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'HEATING AND VENTILATION SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'COMPRESSOR WASHING SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'WATER INJECTION SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'COMPRESSOR INLET GUIDE VANES SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'INLET AND EXHAUST SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'GAS DETECTION SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'FUEL PURGE SYSTEM'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'ADDITIVE INJECTION SYSTEM'

            ],[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'ACCESSORY AND LOAD GEAR AND COUPLINGS'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'ACOUSTICAL  ENCLOSURE'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'ELECTRICAL AUXILIAIRIES'

            ]
            ,[	
            	'created_at'=>now(),'updated_at' =>now(),'name' =>'CONTROL SYSTEM AND PARA'

            ]
               
            
        ];

       
            System::insert($systems);
    }
}
