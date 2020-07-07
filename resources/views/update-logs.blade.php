@extends('layouts.app')
@section('pageTitle')
 
@endsection
@section('styles')
@endsection

@section('content')
<div class="dashboard-content">
    <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-ticket"></i>Turbine {{$turbine->name}}</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                           <li><a href="#">Turbines</a></li>
                            <li><a href="#">{{$turbine->name}}</a></li>
                            <li><a href="#">Logs</a></li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
             <div class="dashboard-list-box margin-top-0">
                    
                    <div class="dashboard-list-box-static">
                        
                       
    
                        <!-- Details -->
                        <div class="my-profile">
                 <table class="table table-striped table-bordered ">
                        <thead style="background-color: #4497D2;color: white">
                            <tr>
                                <th class="text-left"  width="1%">S/N</th>
                            <th class="text-left" >SHUTDOWN</th>
                            <th class="text-left" >PROPOSED RUN HOURS</th>
                            <th class="text-left" >ACTUAL RUN HOURS</th>
                            <th class="text-left" >ACTUAL DATE</th>
                            <th class="text-left"  width="1%">FAILS/TRIPS</th>
                            <th class="text-left" >REMARK</th>
                            </tr>
                        </thead>

                        <form action="{{ url('turbine/update/logs') }}/{{$turbine->id}}" method="post">
                            @csrf
                        <tbody  style="color: black" id="log_table">
                            @foreach($logs as $key => $log)
                           <tr>
                             <input type="hidden" name="log_id[]" value="{{$log->id}}"/>
                            <td>{{$key+1}} </td>
                            <td> <input type="text" name="inspection_type[]" value="{{$log->inspection_type}}"/></td>
                            <td>  <input type="text" name="proposed_hours[]" value="{{$log->proposed_hours}}"/></td>

                            <td> <input type="text" name="actual_hours[]" value="{{$log->actual_hours}}"/></td>
                            <td>
<input placeholder="dd/mm/yyyy" name="actual_date[]" class="date form-control"  value="{{date_format(date_create($log->actual_date),"d/m/Y")}}" placeholder="">
                            </td>

                            <td><input type="text" name="total_fails[]" value="{{$log->total_fails}}"/> </td>


                            <td><textarea  name="remark[]">{{$log->remark}}</textarea>  </td>
                        </tr>
                            @endforeach

                            </tbody>

                            </form>
                            </table>
                            <button type="submit"  onclick="submitForm()" class="pull-right button btn btn-lg btn-primary" style="width: auto; height:auto">Update</button><br>
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
        function submitForm(argument) {
                    $('form').submit();
                }
        $(document).ready(function () {
             $('[data-toggle="popover"]').popover(); 
                $('.date').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
});


                
         
        });

                </script>
      
                @endsection