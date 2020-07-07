
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
                    <h2><i class="fa fa-ticket"></i>Turbine <?php echo e($turbine->name); ?></h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Turbines</a></li>
                            <li><a href="#"><?php echo e($turbine->name); ?></a></li>
                            <li>Systems</li>
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
                        <th class="text-left" width="90%">Name</th>
                        
                        <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $systems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr >
                        <td style="vertical-align: middle;" class="text-left"><?php echo e($system->name); ?>  <a class="btn btn-primary btn-md" href="<?php echo e(url('turbines/'.$turbine->name.'/'.$system->name.'/generate-report')); ?>?tid=<?php echo e($turbine->id); ?>&sid=<?php echo e($system->id); ?>">Generate Report</a></td>
                        
                        
                        <td style="color:white;">
                             
                           <a class="button" href="<?php echo e(url('turbines/'.$turbine->name.'/'.$system->name.'/view-devices')); ?>?tid=<?php echo e($turbine->id); ?>&sid=<?php echo e($system->id); ?>">Devices</a>

                           <a class="button update" data-turbine_id="<?php echo e($turbine->id); ?>" data-system_id="<?php echo e($system->id); ?>" data-system="<?php echo e($system->name); ?>"  href="#">Update Operation Log</a>
                            <a class="button log"  href="#" data-turbine_id="<?php echo e($turbine->id); ?>" data-system_id="<?php echo e($system->id); ?>" data-system="<?php echo e($system->name); ?>"  >Operation Logs</a>

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
                        <h4 class="modal-title" id="system"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectForm" action="<?php echo e(url('system/log/update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                      <input type="hidden" name="turbine_id" id="turbine_id" />
                      <input type="hidden" name="system_id" id="system_id" />
                        <div class="modal-body">
                             <b><p id="check" class="text-center" ></p></b>
                            <div class="form-row">
                                <div class="col">
                                    <label for="startDate">Start Date</label>
                                    <input placeholder="dd/mm/yyyy"   name="start_date" class="date form-control" placeholder="" required>
                                </div>
                                <div class="col">
                                    <label for="startDate">End Date</label>
                                    <input placeholder="dd/mm/yyyy"   name="end_date" class="date form-control" placeholder="" required>
                                </div>
                                
                            </div>


                            <div class="form-row">
                                
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
<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="log_system"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                       <div class="modal-body">
                         <b><p id="log_check" class="text-center"></p></b>
                            <table class="table table-striped table-bordered ">
                        <thead style="background-color: #4497D2;color: white">
                            <tr>
                            
                            <th class="text-left" >Start Date</th>
                            <th class="text-left" >End Date</th>
                            <th class="text-left" >Remark</th>
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

</div>

   <?php $__env->stopSection(); ?>
                <?php $__env->startSection('js'); ?>

                <?php if(session('message') != NULL): ?>
<script type="text/javascript">
    
toastr.info('<?php echo e(session('message')); ?>')

</script>


<?php endif; ?>
                
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


                $(".update").click(function () {
                $('#system').html($(this).data('system'));
                $('#turbine_id').val($(this).data('turbine_id'));
                $('#system_id').val($(this).data('system_id'));
                $('#update').modal('show');
            });

            $(".log").click(function () {
               var inspection_id= $(this).data('inspection_id');
               var turbine_id = $(this).data('turbine_id');
               var system_id = $(this).data('system_id');
               
                var posting = $.post( '<?php echo e(url("system/logs")); ?>',  { turbine_id : turbine_id,system_id : system_id, _token: '<?php echo e(csrf_token()); ?>'} );
               
                var system  = $(this).data('system');
                // Put the results in a div
                posting.done(function( data ) {
                    content = ""
                    for (var i = 0; i < data.length; i++) {
                       content += '<tr><td>'+data[i]['start_date']+'</td>'+'<td>'+data[i]['end_date']+'</td>'+'<td>'+data[i]['remark']+'</td></tr>';
                    }
                $('#log_table').html(content);
                
                $('#log_system').html(system);
                $('#log').modal('show');
                });
              
            });

           
        });

                </script>
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>