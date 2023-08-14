<style>
	.widget-user .widget-user-username{
		font-size: 22px;
	}
	.table_ds_giaithuong{
		font-size: 1.1em;
	}
</style>
<div class="row">
		<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h3><?= $count_user ?></h3>

							<p>Người tham dự</p>
						</div>
						<div class="icon">
							<i class="fa fa-user"></i>
						</div>
						
					</div>
				</div>



		<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= $count_nguoidung ?></h3>

							<p>Số lượt dự thi</p>
						</div>
						<div class="icon">
							<i class="fa fa-line-chart"></i>
						</div>
						
					</div>
				</div>

		<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?= $count_nguoidung_answerright ?></h3>

							<p>Số lượt trả lời đúng</p>
						</div>
						<div class="icon">
							<i class="fa fa-thumbs-up"></i>
						</div>
					 
					</div>
				</div>
				

				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?= round($count_nguoidung_answerright/$count_nguoidung*100,4) ?><sup style="font-size: 20px">%</sup></h3>

							<p>Tỷ lệ</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
					 
					</div>
				</div>
</div>

<div class="row">
	
	<div class="col-md-12">
		<!-- LINE CHART -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Biểu đồ lượt tham gia theo ngày</h3>

						<!-- <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div> -->
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Thống kê lượt tham gia</h3>

						<!-- <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div> -->
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>Ngày</th>
								<th>Lượt tham gia</th>
								<th>Lượt trả lời đúng</th>
							</thead>
							<tbody>
								<?php foreach ($chart_data as $row): ?>
									<tr>
										<td><?= date('d/m/Y',strtotime($row->NGAY)) ?></td>
										<td><?= $row->SL ?></td>
										<td><?= $row->SL_DUNG ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
	</div>

	
</div>


<script>	
	$(document).ready(function(){
		var areaChartData = {
				labels  : [
							<?php foreach ($chart_data as $row): ?>
								'<?=date('d/m/Y',strtotime($row->NGAY))  ?>',
							<?php endforeach; ?>
							//'January', 'February', 'March', 'April', 'May', 'June', 'July'
							],
				datasets: [
					{
						label               : 'Lượt tham gia',
						backgroundColor     : 'rgba(60,141,188,0.9)',
						borderColor         : 'rgba(60,141,188,0.8)',
						pointRadius          : false,
						pointColor          : '#3b8bba',
						pointStrokeColor    : 'rgba(60,141,188,1)',
						pointHighlightFill  : '#fff',
						pointHighlightStroke: 'rgba(60,141,188,1)',
						data                : [
												<?php foreach ($chart_data as $row) {
													echo $row->SL.',';
												} ?>
													//28, 48, 40, 19, 86, 27, 90
												]
					},
					{
						label               : 'Lượt tham gia trả lời đúng',
						backgroundColor     : '#e6062f',//'rgba(210, 214, 222, 1)',
						borderColor         : '#e6062f',//'rgba(210, 214, 222, 1)',
						pointRadius         : false,
						pointColor          : 'rgba(210, 214, 222, 1)',
						pointStrokeColor    : '#c1c7d1',
						pointHighlightFill  : '#fff',
						pointHighlightStroke: 'rgba(220,220,220,1)',
						data                : [
												<?php foreach ($chart_data as $row) {
													echo $row->SL_DUNG.',';
												} ?>
												//65, 59, 80, 81, 56, 55, 40
												]
					},
				]
			}

		var areaChartOptions = {
				maintainAspectRatio : false,
				responsive : true,
				legend: {
					display: false
				},
				scales: {
					xAxes: [{
						gridLines : {
							display : false,
						}
					}],
					yAxes: [{
						gridLines : {
							display : false,
						}
					}]
				}
			}
		//-------------
			//- LINE CHART -
			//--------------
			var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
			var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
			var lineChartData = jQuery.extend(true, {}, areaChartData)
			lineChartData.datasets[0].fill = false;
			lineChartData.datasets[1].fill = false;
			lineChartOptions.datasetFill = false

			var lineChart = new Chart(lineChartCanvas, { 
				type: 'line',
				data: lineChartData, 
				options: lineChartOptions
			})

	});
</script>