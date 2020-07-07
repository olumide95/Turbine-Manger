
<?php $__env->startSection('pageTitle'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="css/custom/projects.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-content">
    <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-ticket"></i>Turbines  <a class="btn btn-primary btn-md add"  href="#" ><i class="fa fa-plus"></i> Add Turbine</a>
</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Turbines</li>
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
                     <table class="table table-striped table-bordered  nowrap" id="projects">
                    <thead>
                        <tr>
                        <th class="text-left" >Name</th>
                        
                        <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $turbines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turbine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr >
                        <td style="vertical-align: middle; color: black" class="text-left"> <b><a href="<?php echo e(url('turbine/update/logs')); ?>/<?php echo e($turbine->id); ?>" style="color: blue"> <?php echo e($turbine->name); ?> </a></b> - <small> <b>Run Hours E.(<?php echo e($turbine->estimated_hours); ?>) </b> </small>|<small><b>Maintainance Date E.(<?php echo e($turbine->estimated_date); ?>) </b></small>| <small><b>Current Fails (<?php echo e($turbine->current_fails); ?>)  <a class="btn btn-primary btn-xs" href="<?php echo e(url('turbine/fails/update')); ?>?id=<?php echo e($turbine->id); ?>"><i class="fa fa-plus"></i></a> <a class="btn btn-danger btn-xs" href="<?php echo e(url('turbine/fails/update')); ?>?id=<?php echo e($turbine->id); ?>&d=1"><i class="fa fa-minus"></i></a> <button class="pull-right btn btn-danger btn-xs" onclick='confirm_delete("<?php echo e(url('turbine/delete')); ?>?id=<?php echo e($turbine->id); ?>")'>Delete</button> <a style="margin-right: 2%" class="pull-right btn btn-success btn-xs" href="<?php echo e(url('turbine/generate/report')); ?>?id=<?php echo e($turbine->id); ?>">Generate Report</a>   </b></small></td>
                        
                        
                        <td style="color:white;">
                             
                           <a class="button" href="<?php echo e(url('turbines/'.$turbine->name.'/view-systems')); ?>?id=<?php echo e($turbine->id); ?>">Systems</a>

                            <a class="button update" data-turbine_id="<?php echo e($turbine->id); ?>" data-turbine="<?php echo e($turbine->name); ?>" data-type="<?php echo e($turbine->shutdown_for()); ?>"  href="#">Add Log Entry</a>

                            <a class="button log"  href="#" data-turbine_id="<?php echo e($turbine->id); ?>" data-turbine="<?php echo e($turbine->name); ?>">Logs</a>



                        </td>
                    </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         </div>
    </div>  

 <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="turbine"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectForm" action="<?php echo e(url('turbine/log/update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                      <input type="hidden" name="turbine_id" id="turbine_id" />
                        <div class="modal-body">
                             <b><p id="check" class="text-center" ></p></b>
                            <div class="form-row">
                                <div class="col">
                                    <label for="startDate">Maintainance Type</label>
                                    <input name="inspection_type" class="form-control" placeholder="" >
                                </div>

                                <div class="col">
                                    <label for="startDate">Maintainance Date</label>
                                    <input placeholder="dd/mm/yyyy" name="actual_date" class="date form-control" placeholder="" required>
                                </div>
                                
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="startDate">Proposed Run Hours</label>
                                   <input name="proposed_hours" class="form-control" placeholder="" >
                                </div>

                                <div class="col">
                                    <label for="Remark">Remark</label>
                                    <textarea name="remark" class=" form-control"  required></textarea>
                                </div>
                                
                            </div>


                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="button btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                   <div class="modal-content">
                    <div class="modal-header">
                       
                        <h3 class="modal-title" id="log_turbine"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                       <div class="modal-body">
                         <b><p id="log_check" class="text-center"></p></b>
                            <table class="table table-striped table-bordered ">
                        <thead style="background-color: #4497D2;color: white">
                            <tr>
                            <th class="text-left" >SHUTDOWN</th>
                            <th class="text-left" >PROPOSED RUN HOURS</th>
                            <th class="text-left" >ACTUAL RUN HOURS</th>
                            <th class="text-left" >ACTUAL DATE</th>
                            <th class="text-left" >FAILS/TRIPS</th>
                            <th class="text-left" >REMARK</th>
                            </tr>
                        </thead>
                        <tbody  style="color: black" id="log_table">



                            </tbody>
                            </table>
                             
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button btn btn-secondary" data-dismiss="modal">Close</button>
                
                        </div>
                 
                    </div>
                </div>
            </div>
<div class="modal fade" id="maintain" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                   <div class="modal-content">
                    <div class="modal-header">
                       
                        <h3 class="modal-title"><b>Information Board</b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                       <div class="modal-body">
                         <b><p id="log_check" class="text-center"></p></b>
                     <ul>  <?php $__currentLoopData = $turbines_due; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turbine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <li><b> <?php echo e($turbine->name); ?> </b> had <?php echo e($turbine->current_fails); ?> fails between <?php echo e($turbine->log()->actual_date); ?> and <?php echo e(date('d-M-y')); ?> at <?php echo e($turbine->getHours($turbine->log()->actual_date)); ?> run hours. From the estimated run hours of <?php echo e($turbine->estimated_hours); ?>, Kindly schedule for the next maintainance.</li>
                          

                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button btn btn-secondary" data-dismiss="modal">Close</button>
                
                        </div>
                 
                    </div>
                </div>
            </div>


 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="turbine"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectForm" action="<?php echo e(url('turbine/add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                       <div class="modal-body">
                             <b><p id="check" class="text-center" ></p></b>
                    

                            <div class="form-row">
                                
                                <div class="col">
                                    <label for="name">Turbine Name</label>
                                    <input type="text" class=" form-control" name="name" required> 
                                </div>

                               </div>

                               <div class="form-row">
                                <div class="col">
                                    <label for="name">Maintainance Type</label>
                                    <input type="text" class=" form-control" name="inspection_type" required> 
                                </div>

                                </div>


                                 <div class="form-row">
                                <div class="col">
                                    <label for="name">Proposed Run Hours</label>
                                    <input type="text" class=" form-control" name="proposed_hours" required> 
                                </div>
                               
                                 <div class="col">
                                    <label for="name">Actual Run Hours</label>
                                    <input type="text" class=" form-control" name="actual_hours" required> 
                                </div>
                              </div>
                               <div class="form-row">
                                 <div class="col">
                                    <label for="name">Actual Date</label>
                                    <input type="text" class=" form-control" name="actual_date" required> 
                                </div>

                                 <div class="col">
                                    <label for="name">Total Fails</label>
                                    <input type="text" class=" form-control" name="total_fails" required> 
                                </div>
                                </div>
                                  
                            </div>
                            <div class="form-row">
                            <div class="col">
                            
                            <button type="submit" class="button btn btn-primary pull-right">Submit</button>
                            <button type="button" class="button btn btn-secondary pull-right" data-dismiss="modal">Close</button>
                       
                    </div>    

                        </div>
                             <br>  
                        </div>

                    </form>

                    </div>
                </div>
            </div>


</div>

   <?php $__env->stopSection(); ?>
                <?php $__env->startSection('js'); ?>

                <?php if(session('message') != NULL): ?>
<script type="text/javascript">
    
toastr.info('<?php echo e(session('message')); ?>')

</script>


<?php endif; ?>



       <?php if(isset($turbines_due[0]) && $turbines_due[0] != []): ?>
<script type="text/javascript">
    
 $('#maintain').modal('show');

</script>


<?php endif; ?>
                
                <script type="text/javascript">
                    function confirm_delete(url) {
    if (confirm("Are you sure you want to delete this turbine?")) {
    window.location = url;
  }
}
        $(document).ready(function () {


 $('.date').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
});
               $('#projects').DataTable(  {
         
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
       
    } );


                  $(".update").click(function () {
                $('#turbine_id').val($(this).data('turbine_id'));
                $('#turbine').val($(this).data('turbine'));
                $('#update').modal('show');
            });


                   $(".add").click(function () {
                $('#add').modal('show');
            });



             $(".update").click(function () {
                $('#turbine').html($(this).data('turbine')+' (Shutdown for '+$(this).data('type')+')');
                $('#turbine_id').val($(this).data('turbine_id'));
                $('#update').modal('show');
            });

            $(".log").click(function () {
               var turbine_id = $(this).data('turbine_id');
               var turbine  = '<b>'+$(this).data('turbine')+'</b>';
                var posting = $.post( '<?php echo e(url("turbine/logs")); ?>',  { turbine_id : turbine_id,_token: '<?php echo e(csrf_token()); ?>'} ).done(function( data ) {
                    content = "";
                    for (var i = 0; i < data.length; i++) {
                       content += '<tr><td>'+data[i]['inspection_type']+'</td>'+'<td>'+data[i]['proposed_hours']+'</td>'+'<td>'+data[i]['actual_hours']+'</td>'+'<td>'+data[i]['actual_date']+'</td>'+'<td>'+data[i]['total_fails']+'</td>'+'<td>'+(data[i]['remark'] ? data[i]['remark']:'') +'</td></tr>';
                    }
                $('#log_table').html(content);
                
                $('#log_turbine').html(turbine);
                //$('#header-container').hide();
                 $('#header-container').css('z-index',0);
                $('#log').modal('show');
                });
              
            });
            $('#log').on('hidden.bs.modal', function (e) {
                $('#header-container').css('z-index','1100');
})
           
        });

                </script>
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>