<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('results') ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
                    <li class="breadcrumb-item active"><?php echo lang('results') ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<?php
$con = mysqli_connect("localhost","dennis","31684544*Mm","gitarimbiuki");
if(!$con){
    echo "Problem in database connection..." .mysqli_error();
}else{
    //$sql = "SELECT name,constituency,ward,polling_station,votes FROM polls";
    $sql = "SELECT  name AS name,  SUM(votes) AS votes FROM polls GROUP BY name";
    $result = mysqli_query($con,$sql);
    $chart_data = "";
    while($row = mysqli_fetch_array($result)){
        $name[] = $row['name'];
        $constituency[] = $row['constituency'];
        $ward[] = $row['ward'];
        $polling_station[] = $row['polling_station'];
        $votes[] = $row['votes'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
</head>

<body>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">

            <div class="card-body">
                <canvas id="chartjs_bar"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx,{
        type: 'bar',
        data: {
            labels: <?php echo json_encode($name );?>,
            datasets: [{
                backgroundcolor: [
                    "#ffd322",
                    "#5945fd",
                    "#25d5f2",
                    "#2ec551",
                    "#ff344e",
                ],
                data: <?php echo json_encode($votes);?>,
            }]
        },
        options:{
            legend: {
                display:true,
                position:'bottom',
                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
        }
    });
</script>

</body>
</html>
<!-- /.graph 2 -->

<!-- /.graph 2 -->

<?php include viewPath('includes/footer'); ?>

<script>
    $('#dataTable1').DataTable()
</script>

