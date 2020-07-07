@extends('layout')
@section('styles')
<link rel="stylesheet" href="{{url('css/custom/personnel.css')}}"/>
<style type="text/css"> input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
    margin-right: 0.5em;
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";
  }
table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    top: 22px !important;}
table.dataTable>tbody>tr.child{
    left: 0px !important;
}
</style>
@endsection
@section('content')
<main class="content-wrapper">
    <div class="container">
            
     
                <h1 class="mdc-card__title mdc-card__title--large">Personnels</h1>
           
                <table id="personnels" class="table table-striped table-bordered  dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th class="text-left">Name</th>
                    
                    <th class="text-center">Tel</th>
                    <th class="text-center">T-BOSIET</th>
                    <th class="text-center">General Medicals</th>
                    <th class="text-center">Tuberculosis</th>
                    <th class="text-center">Alcohol & Drug</th>
                     <th class="text-center">Malaria Test</th>
                   <th class="text-center">Company</th>
                     <th class="text-center">Designation</th>
                     <th class="text-center">Employment Status</th>
                     <th class="text-center">OSP</th>
                     <th class="text-center">Trade Certificate</th>
                     <th class="text-center">Curriculum vitae</th>
                    <th class="text-center" >Action</th>

                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($personnels as $personnel)
                    <tr >
                        <td style="vertical-align: middle;" class="text-left"><a href="{{ url('/personnel/'.$personnel->name) }}?id={{$personnel->id}}">{{$personnel->name}}</a></td>
                         <td style="vertical-align: middle;" class="text-left">{{$personnel->phone_number}} </td>
                       
                        <td>
                            @if(isset($personnel->t_bosiet))
                        <a href="{{url('storage/app')}}/{{$personnel->t_bosiet}}" target="_blank"> 
                         <button type="button" class="btn {{$personnel->color_class($personnel->t_bosiet_validity_date)}} btn-sm">view
                            </button>
                        </a> 
                        <small>{{$personnel->exp($personnel->t_bosiet_validity_date)}}</small> @else N/A @endif
                    </td> 
                        <td>@if(isset($personnel->general_medicals))<a href="{{url('storage/app')}}/{{$personnel->general_medicals}}" target="_blank"> <button type="button" class="btn {{$personnel->color_class($personnel->general_medicals_validity_date)}} btn-sm">view</button></a>  <small>{{$personnel->exp($personnel->general_medicals_validity_date)}}</small> @else N/A @endif</td> 
                        <td>@if(isset($personnel->tuberculosis))<a href="{{url('storage/app')}}/{{$personnel->tuberculosis}}" target="_blank"> <button type="button" class="btn {{$personnel->color_class($personnel->tuberculosis_validity_date)}} btn-sm">view</button></a>  <small>{{$personnel->exp($personnel->tuberculosis_validity_date)}}</small> @else N/A @endif</td>   
                         <td>@if(isset($personnel->alcohol_and_drug))<a href="{{url('storage/app')}}/{{$personnel->alcohol_and_drug}}" target="_blank"> <button type="button" class="btn {{$personnel->color_class($personnel->alcohol_and_drug_validity_date)}} btn-sm">view</button></a>  <small>{{$personnel->exp($personnel->alcohol_and_drug_validity_date)}}</small> @else N/A @endif</td>  
                          <td>@if(isset($personnel->malaria))<a href="{{url('storage/app')}}/{{$personnel->malaria}}" target="_blank"> <button type="button" class="btn {{$personnel->color_class($personnel->malaria_validity_date)}} btn-sm">view</button></a>  <small>{{$personnel->exp($personnel->malaria_validity_date)}}</small> @else N/A @endif</td> 
                              <td style="vertical-align: middle;" class="text-left">{{$personnel->company}} </td>
                            <td style="vertical-align: middle;" class="text-left">{{$personnel->designation}} </td>
                              <td style="vertical-align: middle;" class="text-left">{{$personnel->employment_status}} </td>
                              @if(isset($personnel->certificate))
                              <td style="vertical-align: middle;" class="text-left"><a href="{{url('storage/app')}}/{{$personnel->certificate->osp()->certificate}}" target="_blank"> <button type="button" class="btn btn-success btn-sm">view</button></a> </td>
                              <td style="vertical-align: middle;" class="text-left"><a href="{{url('storage/app')}}/{{$personnel->certificate->trade()->certificate}}" target="_blank"> <button type="button" class="btn btn-success btn-sm">view</button></a> </td>
                              <td style="vertical-align: middle;" class="text-left"><a href="{{url('storage/app')}}/{{$personnel->certificate->cv()->certificate}}" target="_blank"> <button type="button" class="btn btn-success btn-sm">view</button></a> </td>


                              @else
                              <td style="vertical-align: middle;" class="text-left">N/A </td>
                              <td style="vertical-align: middle;" class="text-left">N/A</td>
                              <td style="vertical-align: middle;" class="text-left">N/A</td>

                              @endif
                        <!--  -->
                        <td style="color:white;">
                           
                               <a onclick="myFunction('{{$personnel->id}}')" class="btn btn-success btn-sm">Add</a>
                        </td>
                         
                    </tr>
                   @endforeach
        
                </tbody>
                </table>
        
    </div>
</main>
@endsection
@section('page_scripts')
<!-- <script src="js/custom/home.js"></script> -->
<script>
    $(document).ready(function() {
    $('#personnels').DataTable(  {
       "fixedHeader": true ,
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
} );
} );

    function myFunction(id) {
        var personnel_id = id;
        $.post( "{{ url('projects/'.$project->name.'/add-personnel') }}",{project_id : '{{$project->id}}',personnel_id : personnel_id, _token : '{{csrf_token()}}' },function( data ) {
          toastr.info(data)
        });
    }

</script>
@if(session('message') != NULL)
<script type="text/javascript">
    
toastr.success('{{session('message')}}')
</script>

@endif

@endsection