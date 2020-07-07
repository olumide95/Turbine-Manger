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

                        <form action="<?php echo e(url('turbine/update/logs')); ?>/<?php echo e($turbine->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                        <tbody  style="color: black" id="log_table">
                            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                             <input type="hidden" name="log_id[]" value="<?php echo e($log->id); ?>"/>
                            <td><?php echo e($key+1); ?> </td>
                            <td> <input type="text" name="inspection_type[]" value="<?php echo e($log->inspection_type); ?>"/></td>
                            <td>  <input type="text" name="proposed_hours[]" value="<?php echo e($log->proposed_hours); ?>"/></td>

                            <td> <input type="text" name="actual_hours[]" value="<?php echo e($log->actual_hours); ?>"/></td>
                            <td>
<input placeholder="dd/mm/yyyy" name="actual_date[]" class="date form-control"  value="<?php echo e(date_format(date_create($log->actual_date),"d/m/Y")); ?>" placeholder="">
                            </td>

                            <td><input type="text" name="total_fails[]" value="<?php echo e($log->total_fails); ?>"/> </td>


                            <td><textarea  name="remark[]"><?php echo e($log->remark); ?></textarea>  </td>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

   <?php $__env->stopSection(); ?>
                <?php $__env->startSection('js'); ?>

                <?php if(session('message') != NULL): ?>
<script type="text/javascript">
    
toastr.info('<?php echo e(session('message')); ?>')

</script>


<?php endif; ?>


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
      
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>