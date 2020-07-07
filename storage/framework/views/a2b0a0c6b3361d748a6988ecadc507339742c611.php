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
                    <h4><i class="fa fa-ticket"></i> <?php echo e($system->name); ?></h4>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Turbines</a></li>
                            <li><a href="#"><?php echo e($turbine->name); ?></a></li>
                            <li><?php echo e($system->name); ?></li>
                             <li>Report</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h2 class="text-center">Operation Logs <a class=" btn btn-success btn-xs" href="<?php echo e(url('system/generate/report')); ?>?tid=<?php echo e($turbine->id); ?>&sid=<?php echo e($system->id); ?>&type=1">Generate Report</a></h2>
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
                        <?php $__currentLoopData = $operationlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr >
                    
                        <td >
                             
                          <?php echo e($log->start_date); ?>

                        </td>
                         <td >
                             
                          <?php echo e($log->end_date); ?>

                        </td>
                         <td >
                             
                          <?php echo e($log->remark); ?>

                        </td>
                    </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         </div>



           <div class="col-lg-12 col-md-12">
            <br>
            <h2 class="text-center">Inspection Logs <a class="btn btn-success btn-xs" href="<?php echo e(url('system/generate/report')); ?>?tid=<?php echo e($turbine->id); ?>&sid=<?php echo e($system->id); ?>&type=2">Generate Report</a></h2>
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

                        <?php $__currentLoopData = $inspectionlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr >
                        
                         <td >
                             
                          <?php echo e($log->DeviceInspection->Device->name); ?>


                        </td>

                         <td >
                             
                          <?php echo e($log->DeviceInspection->check); ?>


                        </td>
                        
                         <td >
                             
                          <?php echo e($log->remark); ?>


                        </td>

                         <td >
                             
                          <?php echo e($log->date); ?>


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


    $('#projects1').DataTable(  {
         
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
       
    } );

                
            

           
        });

                </script>
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>