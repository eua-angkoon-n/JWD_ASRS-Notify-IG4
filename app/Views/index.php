<?php 
// require_once __DIR__ . "/config/setting.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $title ?></title>
<?php 
include('Frame/link.php');
include('Frame/style.php');
include('Frame/script.php');
?>

</head>

<body class="hold-transition layout-top-nav">
    <!--sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed sidebar-collapse layout-navbar-fixed-->
    <div class="wrapper">

        <!-- Preloader -->
     
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper" style="width: 200; height: 721;"> <!-- style="width: 1980px; height: 1080;"
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?= $content ?>
            <!-- Main content -->

        </div>
        <!-- /.content-wrapper -->

       
    </div>
    <!-- ./wrapper -->

</body>


  