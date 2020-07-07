
<?php $__env->startSection('content'); ?>

<!-- Content
    ================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Dashboard</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
          
      
                <div class="col-sm-4">
            
                    <div class="tile-stats tile-blue">
                        <div class="icon"><i class="entypo-chart-bar"></i></div>
                        <div class="num" data-start="0" data-end="<?php echo e($turbine); ?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo e($turbine); ?></div>
            
                        <h3>Number of Turbines</h3>
                    </div>
            
                </div>
                
                <div class="clear visible-xs"></div>
            
                <div class="col-sm-4">
            
                    <div class="tile-stats tile-aqua">
                        <div class="icon"><i class="entypo-mail"></i></div>
                        <div class="num" data-start="0" data-end="" data-postfix="" data-duration="1500" data-delay="1200"><?php echo e($system); ?></div>
            
                        <h3>Number of Systems</h3>
                    </div>
            
                </div>
             
<div class="col-sm-4">
            
                    <div class="tile-stats tile-green">
                        <div class="icon"><i class="entypo-users"></i></div>
                        <div class="num" data-start="0" data-end="" data-postfix="" data-duration="1500" data-delay="600"><?php echo e($device); ?></div>
            
                        <h3>Number of System Devices</h3>
                        
                    </div>
            
                </div>
           

          
        </div>

    </div>
    <!-- Content / End -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>