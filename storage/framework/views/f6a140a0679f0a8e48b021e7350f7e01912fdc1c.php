<?php $__env->startSection('pageTitle'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
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
                            <li><a href="#"><?php echo e($system->name); ?></a></li>
                            <li>Devices</li>
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
                     <table class="table table-striped table-bordered  " id="projects">
                    <thead style="background-color: #4497D2;color: white">
                        <tr>
                        <th class="text-left" >Name</th>
                        <th class="text-left" >Check / Inspect</th>
                        <th class="text-left" >D</th>
                        <th class="text-left" >W</th>
                        <th class="text-left" >M</th>
                        <th class="text-left" >Q</th>
                        <th class="text-left" >S</th>
                        <th class="text-left" >CI</th>
                         <th class="text-left" >HGPI</th>
                          <th class="text-left" >MI</th>
                           <th class="text-left" >X</th>
                        <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody  style="color: black">

                        <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                         
                          <?php $__currentLoopData = $device->checks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check_key => $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr >    <td style="vertical-align: middle;" class="text-left" >
                                  <?php echo e($device->name); ?> 

                             </td>
                             <td ><?php echo e(substr($check->check,0,18)); ?>... <i class="fa fa-info-circle" style="font-size:24px" data-toggle="popover" data-trigger="hover" data-html="true" data-content="<?php echo e($check->check); ?>"></i>   </td>
                                                 


                         <td ><?php echo e($check->D); ?> </td>
                        <td ><?php echo e($check->W); ?>  </td>
                        <td ><?php echo e($check->M); ?>  </td>
                        <td ><?php echo e($check->Q); ?>  </td>
                        <td > <?php echo e($check->S); ?> </td>
                         <td ><?php echo e($check->CI); ?>  </td>
                        <td ><?php echo e($check->HGPI); ?>  </td>
                         <td ><?php echo e($check->MI); ?>  </td>
                        <td  >
                            <?php echo e($check->X); ?>  
                           
                        </td>      
                        <td  >
                            
                           <a class="button update" data-device='<?php echo e($device->name); ?>' data-check_id="<?php echo e($check->id); ?>" data-turbine_id="<?php echo e($turbine->id); ?>" data-system_id="<?php echo e($system->id); ?>" data-check="<?php echo e($check->check); ?>" href="#">Update Log</a>
                            <a class="button log"  href="#" data-device='<?php echo e($device->name); ?>'  data-check="<?php echo e($check->check); ?>" data-turbine_id="<?php echo e($turbine->id); ?>" data-system_id="<?php echo e($system->id); ?>" data-inspection_id="<?php echo e($check->id); ?>">View Log</a>
                        </td>   
                               </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        
                       
                  
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
                        <h4 class="modal-title" id="device"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectForm" action="<?php echo e(url('device/log/update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                      <input type="hidden" name="turbine_id" id="turbine_id" />
                      <input type="hidden" name="system_id" id="system_id" />
                      <input type="hidden" name="inspection_id" id="inspection_id" />
                        <div class="modal-body">
                             <b><p id="check" class="text-center" ></p></b>
                            <div class="form-row">
                                <div class="col">
                                    <label for="startDate">Inspection Date</label>
                                    <input placeholder="dd/mm/yyyy"   name="date" class="date form-control" placeholder="" required>
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
                        <h4 class="modal-title" id="log_device"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                       <div class="modal-body">
                         <b><p id="log_check" class="text-center"></p></b>
                            <table class="table table-striped table-bordered ">
                        <thead style="background-color: #4497D2;color: white">
                            <tr>
                            <th class="text-left" >Remark</th>
                            <th class="text-left" >Date</th>
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
             $('[data-toggle="popover"]').popover(); 
                $('.date').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
});
               $('#projects').DataTable(  { } );
               $(".update").click(function () {
                $('#check').html($(this).data('check'));
                $('#device').html($(this).data('device'));
                $('#inspection_id').val($(this).data('check_id'));
                $('#turbine_id').val($(this).data('turbine_id'));
                $('#system_id').val($(this).data('system_id'));
                $('#update').modal('show');
            });

            $(".log").click(function () {
               var inspection_id= $(this).data('inspection_id');
               var turbine_id = $(this).data('turbine_id');
               var system_id = $(this).data('system_id');
               
                var posting = $.post( '<?php echo e(url("device/logs")); ?>',  {inspection_id: inspection_id, turbine_id : turbine_id,system_id : system_id, _token: '<?php echo e(csrf_token()); ?>'} );
                var check = $(this).data('check');
                var device  = $(this).data('device');
                // Put the results in a div
                posting.done(function( data ) {
                    content = ""
                    for (var i = 0; i < data.length; i++) {
                       content += '<tr><td>'+data[i]['remark']+'</td>'+'<td>'+data[i]['date']+'</td></tr>';
                    }
                $('#log_table').html(content);
                
                $('#log_check').html(check);
                $('#log_device').html(device);
                $('#log').modal('show');
                });
              
            });

           
        });

                </script>
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>