<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Personnel;
use Mail;
use App\Mail\MailCertificateNotification;

class CertificateNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certificateNotification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to personnels before certificates expire';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {    
            //get personnels with expired T-bosiet t_bosiet_validity_date
         $personnels = Personnel::where('t_bosiet_validity_date','>=',date('Y-m-d'))->where('t_bosiet_validity_date','<=',date('Y-m-d', strtotime("+10 days")))->get();
         foreach ($personnels as $personnel)
 
            {
                if ($personnel->email != NULL) {
                       Mail::to($personnel->email)->send(new MailCertificateNotification($personnel,'T-bosiet'));
                }
     
         
           }

           //get personnels with expired Malaria malaria_validity_date
         $personnels = Personnel::where('malaria_validity_date','>=',date('Y-m-d'))->where('malaria_validity_date','<=',date('Y-m-d', strtotime("+10 days")))->get();
         foreach ($personnels as $personnel)
 
            {
if ($personnel->email != NULL) {
        Mail::to($personnel->email)->send(new MailCertificateNotification($personnel,'Malaria'));
         }
           }

            //get personnels with expired alcohol_and_drug alcohol_and_drug_validity_date
         $personnels = Personnel::where('alcohol_and_drug_validity_date','>=',date('Y-m-d'))->where('alcohol_and_drug_validity_date','<=',date('Y-m-d', strtotime("+10 days")))->get();
         foreach ($personnels as $personnel)
 
            {
if ($personnel->email != NULL) {
        Mail::to($personnel->email)->send(new MailCertificateNotification($personnel,'Alcohol And Drug'));
         }
           }

            //get personnels with expired Tuberculosis 
         $personnels = Personnel::where('tuberculosis_validity_date','>=',date('Y-m-d'))->where('tuberculosis_validity_date','<=',date('Y-m-d', strtotime("+10 days")))->get();
         foreach ($personnels as $personnel)
 
            {
if ($personnel->email != NULL) {
        Mail::to($personnel->email)->send(new MailCertificateNotification($personnel,'Tuberculosis'));
         }
           } 
    
    }

}