@extends('layouts.app')
@section('pageTitle')
 
@endsection
@section('styles')
<link rel="stylesheet" href="css/custom/projects.css"/>
@endsection

@section('content')
<div class="dashboard-content">
    <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h4><i class="fa fa-ticket"></i> {{$system->name}}</h4>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Turbines</a></li>
                            <li><a href="#">{{$turbine->name}}</a></li>
                            <li>{{$system->name}}</li>
                             <li>Report</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h2 class="text-center">Operation Logs <a class=" btn btn-success btn-xs" href="{{ url('system/generate/report') }}?tid={{$turbine->id}}&sid={{$system->id}}&type=1">Generate Report</a></h2>
             <div class="dashboard-list-box margin-top-0">
                    
                    <div class="dashboard-list-box-static">
                        
                       
    
                        <!-- Details -->
                        <div class="my-profile">
                     <table class="table table-striped table-bordered  nowrap" id="projects">
                    <thead class="thead-dark">
                        <tr>
                        <th class="text-left" >Start Date</th>
                        <th class="text-left" >End Date</th>
                        
                        <th class="text-center">Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($operationlog as $log)
                    <tr >
                    
                        <td >
                             
                          {{$log->start_date}}
                        </td>
                         <td >
                             
                          {{$log->end_date}}
                        </td>
                         <td >
                             
                          {{$log->remark}}
                        </td>
                    </tr>
               @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         </div>



           <div class="col-lg-12 col-md-12">
            <br>
            <h2 class="text-center">Inspection Logs <a class="btn btn-success btn-xs" href="{{ url('system/generate/report') }}?tid={{$turbine->id}}&sid={{$system->id}}&type=2">Generate Report</a></h2>
             <div class="dashboard-list-box margin-top-0">
                    
                    <div class="dashboard-list-box-static">
                        
                       
    
                        <!-- Details -->
                        <div class="my-profile">
                     <table class="table table-striped table-bordered  nowrap" id="projects1">
                    <thead class="thead-dark">
                        <tr>
                        <th class="text-left" >Device</th>
                        
                        <th class="text-left" >Inspection</th>
                        <th class="text-center">Remark</th>
                        <th class="text-left" >Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($inspectionlog as $log)
                    <tr >
                        
                         <td >
                             
                          {{$log->DeviceInspection->Device->name}}

                        </td>

                         <td >
                             
                          {{$log->DeviceInspection->check}}

                        </td>
                        
                         <td >
                             
                          {{$log->remark}}

                        </td>

                         <td >
                             
                          {{$log->date}}

                        </td>
                    </tr>
               @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         </div>
    </div>  

     

</div>

   @endsection
                @section('js')

                @if(session('message') != NULL)
<script type="text/javascript">
    
toastr.info('{{session('message')}}')

</script>


@endif
                
                <script type="text/javascript">
        $(document).ready(function () {
          $('.date').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
});
    
               $('#projects').DataTable(  {
         
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
       
    } );


    $('#projects1').DataTable(  {
         
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
       
    } );

                
            

           
        });

                </script>
                @endsection