
<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->

<link rel="stylesheet" href="<?php echo e(url('css/bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('css/colors/main.css')); ?>" id="colors">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="<?php echo e(url('css/toastr.css')); ?>" rel="stylesheet">
    
 <link rel="stylesheet"  href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css"/>

   <link href="<?php echo e(url('css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" >
   <link href="<?php echo e(url('css/datepicker.min.css')); ?>" rel="stylesheet">
<style> .pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #337ab7;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #337ab7;
  border-color: #337ab7;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

.dashboard-content {
    padding: 40px 15px;
    padding-bottom: 0;
    position: relative;
    z-index: 10;
    height: 100%;
    margin-left: 135px;
}

.dashboard-nav, .dashboard #logo {
     min-width: 0px; 
     max-width: 140px; 
}

.dashboard-nav ul li a {
    padding: 11px 15px;
}

.dashboard-nav {
    background-color: #193b52;

    }
.modal-backdrop {
    position: static;
}
select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 8px);
}
</style>
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
    <header id="header-container" class="fixed fullwidth dashboard">

    <!-- Header -->
    <div id="header" class="not-sticky">
        <div class="container">
            
            <!-- Left Side Content -->
            <div class="left-side">
                
                <!-- Logo -->
                <div id="logo" style="background-color: white">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('images/logo.jpeg')); ?>" alt="" style="    max-height: 100px;"></a>
                    <a href="<?php echo e(url('/')); ?>" class="dashboard-logo"><img src="<?php echo e(url('images/logo.jpeg')); ?>" alt="" style="    max-height: 78px;"></a>
                </div>

                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>

                <!-- Main Navigation -->
                
                <div class="clearfix">  <h3 class="text-center" style="padding-left:25%; font-style: bold"><b>TURBINE MANAGEMENT SYSTEM</b></h3></div>
                <!-- Main Navigation / End -->
                
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">

   
             
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clear-fix"></div>
<div id="dashboard" style="padding-top: 80px;">

    <!-- Navigation
    ================================================== -->

    <!-- Responsive Navigation Trigger -->
    <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
    
    <div class="dashboard-nav">
        <div class="dashboard-nav-inner" style="max-height: 440px;">

            <ul data-submenu-title="Main">
                <li>
                  <a href="<?php echo e(url('/')); ?>"><i class="sl sl-icon-screen-desktop"></i>Dashboard</a></li>
                 
                            
                    <li><a href="<?php echo e(url('/turbines')); ?>"><i class="fa fa-ticket"></i> Turbines</a> </li>
                      <li><a href="<?php echo e(url('/device/add')); ?>"><i class="fa fa-ticket"></i> Add Device</a>
                          
                </li>
                
              <li>
<a href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                   
                                  </li> 
            </ul>
          
        </div>
    </div>
    <!-- Navigation / End -->

 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
    <!-- Content
    ================================================== -->
    
    <!-- Content / End -->

  <?php echo $__env->yieldContent('content'); ?>
</div>



</body>

<!-- Scripts
================================================== -->

  <script type="text/javascript" src="<?php echo e(url('scripts/jquery-1.12.4.js')); ?>"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/popper.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('scripts/bootstrap.js')); ?>"></script>
<script src="<?php echo e(url('scripts/toastr.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/mmenu.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/chosen.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/slick.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/rangeSlider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/magnific-popup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/waypoints.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/counterup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/tooltips.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('scripts/custom.js')); ?>"></script>

<script src="<?php echo e(url('js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(url('js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('js/dataTables.fixedHeader.min.js')); ?>"></script>
 <script src="<?php echo e(url('js/bootstrap-datepicker.min.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
<script type="text/javascript">

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
</script>
</html> 

