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
            
     
                <h2 class="text-center">{{$project->name}} Personnel  <a class="btn btn-primary btn-sm" href="{{ url('/projects/'.$project->name.'/manifest') }}?id={{$project->id}}">View Manifest</a></h2>
           
                <table id="personnels" class="table table-striped table-bordered  dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th class="text-left">Name</th>
                    
                 
                    <th class="text-center">T-BOSIET</th>
                    <th class="text-center">Medicals</th>
                    <th class="text-center">Tuberculosis</th>
                    <th class="text-center">Alcohol & Drug</th>
                     <th class="text-center">OSP</th>
                    <th class="text-center" >Action</th>

                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($project_personnels as $project_personnel)
                    <tr >
                        <td style="vertical-align: middle;" class="text-left"> <a href="{{ url('/personnel/'.$project_personnel->personnel->name) }}?id={{$project_personnel->personnel->id}}">{{$project_personnel->personnel->name}}</a></td>
                         
                       
                        <td>
                            @if(isset($project_personnel->personnel->t_bosiet))
                        <a href="{{url('storage/app')}}/{{$project_personnel->personnel->t_bosiet}}" target="_blank"> 
                         <button type="button" class="btn {{$project_personnel->personnel->color_class($project_personnel->personnel->t_bosiet_validity_date)}} btn-sm">view
                            </button>
                        </a> 
                        @else N/A @endif
                    </td> 
                        <td>@if(isset($project_personnel->personnel->general_medicals))<a href="{{url('storage/app')}}/{{$project_personnel->personnel->general_medicals}}" target="_blank"> <button type="button" class="btn {{$project_personnel->personnel->color_class($project_personnel->personnel->general_medicals_validity_date)}} btn-sm">view</button></a>  @else N/A @endif</td> 
                        <td>@if(isset($project_personnel->personnel->tuberculosis))<a href="{{url('storage/app')}}/{{$project_personnel->personnel->tuberculosis}}" target="_blank"> <button type="button" class="btn {{$project_personnel->personnel->color_class($project_personnel->personnel->tuberculosis_validity_date)}} btn-sm">view</button></a>  @else N/A @endif</td>   
                         <td>@if(isset($project_personnel->personnel->alcohol_and_drug))<a href="{{url('storage/app')}}/{{$project_personnel->personnel->alcohol_and_drug}}" target="_blank"> <button type="button" class="btn {{$project_personnel->personnel->color_class($project_personnel->personnel->alcohol_and_drug_validity_date)}} btn-sm">view</button></a>  @else N/A @endif</td>  
                         
                              <td style="vertical-align: middle;" class="text-left">@if(isset($personnel->osp) )<a href="{{url('storage/app')}}/{{$personnel->osp}}" target="_blank"> <button type="button" class="btn btn-success btn-sm">view</button></a> @else N/A @endif</td>
                              
                        <!--  -->
                        <td style="color:white;">
                           <a href="{{ url('projects/'.$project_personnel->project->name.'/manifest/add') }}?project_id={{$project->id}}&personnel_id={{$project_personnel->personnel->id}}" class="btn btn-success btn-sm">Add to Manifest</a>
                               <a href="{{ url('projects/'.$project->name.'/remove-personnel') }}?project_id={{$project->id}}&personnel_id={{$project_personnel->personnel->id}}" class="btn btn-danger btn-sm">Remove</a>
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
       "fixedHeader": true 
    
} );
} );


</script>
@if(session('message') != NULL)
<script type="text/javascript">
    
toastr.info('{{session('message')}}')
</script>

@endif

@endsection