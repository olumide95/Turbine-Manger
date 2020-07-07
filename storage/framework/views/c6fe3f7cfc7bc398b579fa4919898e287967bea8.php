
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
                    <h2><i class="fa fa-ticket"></i>Device 
</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Device</li>
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
                    <form id="projectForm" action="<?php echo e(url('/device/add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                     
                        <div class="modal-body">
                             <b><p id="check" class="text-center" ></p></b>
                            <div class="form-row">
                                <div class="col">
                                    <label for="startDate">System</label>
                                   <select name="system_id"  class="form-control " required> 
                                     <option value="" selected="true">Please select...</option>
                                   
                                    <?php $__currentLoopData = $systems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($system->id); ?>"><?php echo e($system->name); ?></option>
                                   

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </select>
                                </div>

                                <div class="col">
                                    <label for="startDate">Device Name</label>
                                    <input name="name" class="form-control" placeholder="" required>
                                </div>
                                
                            </div>

                            <div class="form-row">
                                    <div class="col">
                                    <label for="Remark">Inspection Period</label>
                                   
                                  <select name="inspection_period"  class="form-control " required> 
                                     <option value="" selected="true">Please select...</option>
                                   
                                   
                                     <option value="D">D</option>
                                     <option value="W">W</option>
                                     <option value="M">M</option>
                                     <option value="Q">Q</option>
                                     <option value="S">S</option>
                                     <option value="CI">CI</option>
                                     <option value="HGPI}">HGPI</option>
                                     <option value="MI">MI</option>
                                     <option value="X">X</option>

                                   

                                </select>
                                </div> 
                                


                                <div class="col">
                                    <label for="Remark">Turbine state</label>
                                   
                                  <select name="state" class="form-control " required> 
                                     <option value="" selected="true">Please select...</option>
                                   
                                   
                                     <option value="O">Operation</option>
                                     <option value="S">Shutdown</option>

                                   

                                </select>
                                </div>
                                
                            </div>
<div class="form-row">
                            

                   <div class="col">
                                    <label for="startDate">Check/Inspection</label>
                                    <textarea name="check" class="form-control"  required></textarea>
                                   
                                </div>         
                        </div>
                        
                            <button type="submit" class="button btn btn-primary">Submit</button>
                       
                    </form> 


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
                
                
                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>