@extends('layout')
@section('styles')
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

 .table .thead-theme th {
            color: #fff;
            background-color: #002545 !important;
            border-color: #002545;
        }
</style>
@endsection
@section('content')
<main class="content-wrapper">
    <div class="container">
            
     
                <h2 class="text-center" >{{$project->name}} : ON-SIGNERS TO {{$project->location}}</h2>
           <div class="row hideme" ><div class="col-md-12 "><span class="pull-right"><button  class=" comment btn btn-primary btn-md" >Comment </button>  <button  class="  personnels btn btn-success btn-md" onclick="printInfo()">Print </button> </span></div> <br> <br> </div> 
                <table id="personnels" class="table table-striped table-bordered  dt-responsive nowrap" style="width:100%">
                <thead class="thead-theme">
                    <tr>
                      <th class="text-center">S/N</th>
                    <th class="text-center">Personnel Name</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Company</th>
                    <th class="text-center hideme" >Action</th>

                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($project_manifest as $key =>$personnel)
                    <tr >
                       <td style="vertical-align: middle;" class="text-left">{{$key+1}} </td>
                        <td style="vertical-align: middle;" class="text-left"> <a href="{{ url('/personnel/'.$personnel->personnel->name) }}?id={{$personnel->personnel->id}}">{{$personnel->personnel->name}}</a></td>
                         
                       <td style="vertical-align: middle;" class="text-left">{{$personnel->personnel->designation}} </td>
                  
                              <td style="vertical-align: middle;" class="text-left">{{$personnel->personnel->company}} </td>
                            
                             
                        <!--  -->
                        <td style="color:white;" class="hideme">
                             
                               <a href="{{ url('projects/'.$personnel->project->name.'/manifest/remove') }}?project_id={{$project->id}}&personnel_id={{$personnel->personnel->id}}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                         
                    </tr>
                   @endforeach
        
                </tbody>
                </table>
        <br>
        @if(Cache::has('comment'.$project->id))
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <span class="card-text"><b>{{Cache::get('comment'.$project->id)}}</b></span>
       
      </div>
    </div>
  </div>
        
    </div>
@endif


    <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Comment <small>(Date of mobilisation, mode of trasportation/mobilisation & other comments)</small></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectForm" action="{{ url('projects/'.$project->name.'/manifest/comment') }}?project_id={{$project->id}}" method="post">
                        @csrf
                      
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" id="comment_box"  >{{Cache::get('comment'.$project->id)}}</textarea> 
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


</main>
@endsection
@section('page_scripts')
<!-- <script src="js/custom/home.js"></script> -->
<script>

  function printInfo() {
    var content = $('#printinfo');

    $('aside').hide();
    $('.menu-toggler').click();
    $('header').hide();
    $('footer').hide();
    $('.hideme').hide();
    $('.dataTables_length').hide();
    $('.dataTables_filter').hide();
    $('.dataTables_info').hide();
    $('.dataTables_paginate').hide();
    print();
    $('aside').show();
    $('.menu-toggler').click();
    $('header').show();
    $('footer').show();
    $('.hideme').show();
    $('.dataTables_length').show();
    $('.dataTables_filter').show();
    $('.dataTables_info').show();
    $('.dataTables_paginate').show();

} 
    $(document).ready(function() {
    $('#personnels').DataTable(  {
       "fixedHeader": true ,
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
} );

    $(".comment").click(function () {
                
               
                $('#comment').modal('show');
            });
} );


</script>
@if(session('message') != NULL)
<script type="text/javascript">
    
toastr.info('{{session('message')}}')
</script>

@endif

@endsection