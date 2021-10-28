@extends('admin.layoutV2')
@section('title','Dashboard')
@section('content')

<div class="main-panel">
  <div class="container">
    <div class="page-inner">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-secondary mr-3">
                <i class="fa fa-archive"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Produk</a></b></h5>
                <small class="text-muted">{{ count($product) }}</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-danger mr-3">
                <i class="fa fa-sort-amount-down"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Pengeluaran</a></b></h5>
                <small class="text-muted">@currency($pemasukan[0]->total)</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-warning mr-3">
                <i class="fa fa-sort-amount-up"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Pemasukan</a></b></h5>
                <small class="text-muted">@currency($pengeluaran[0]->total)</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success mr-3">
                <i class="fa fa-signature"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Keuntungan</a></b></h5>
                <small class="text-muted">@currency(total_keuntungan_penjualan_keseluruhan()[0]->total)</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Grafik Penjualan</div>
            </div>
            <div class="card-body">
              <div class="chart-container" style="min-height: 375px">
                <canvas id="statisticsChart"></canvas>
              </div>
              <div id="myChartLegend"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>

var ctx = document.getElementById('statisticsChart').getContext('2d');

var statisticsChart = new Chart(ctx,{
	type: 'line',
	data: {
		labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
		datasets: [ {
			label: "Pengeluaran",
			borderColor: '#f3545d',
			pointBackgroundColor: 'rgba(243, 84, 93, 0.6)',
			pointRadius: 0,
			backgroundColor: 'rgba(243, 84, 93, 0.4)',
			legendColor: '#f3545d',
			fill: true,
			borderWidth: 2,
			data: [
              {{ hitung_pengeluaran('2021-01-01', '2021-02-01') }}, 
              {{ hitung_pengeluaran('2021-02-01', '2021-03-01') }}, 
              {{ hitung_pengeluaran('2021-03-01', '2021-04-01') }}, 
              {{ hitung_pengeluaran('2021-04-01', '2021-05-01') }}, 
              {{ hitung_pengeluaran('2021-05-01', '2021-06-01') }}, 
              {{ hitung_pengeluaran('2021-06-01', '2021-07-01') }}, 
              {{ hitung_pengeluaran('2021-07-01', '2021-08-01') }}, 
              {{ hitung_pengeluaran('2021-08-01', '2021-09-01') }}, 
              {{ hitung_pengeluaran('2021-09-01', '2021-10-01') }}, 
              {{ hitung_pengeluaran('2021-10-01', '2021-11-01') }}, 
              {{ hitung_pengeluaran('2021-11-01', '2021-12-01') }}, 
              {{ hitung_pengeluaran('2021-12-01', '2021-01-01') }}
            ]
		}, {
			label: "Pemasukan",
			borderColor: '#177dff',
			pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
			pointRadius: 0,
			backgroundColor: 'rgba(23, 125, 255, 0.4)',
			legendColor: '#177dff',
			fill: true,
			borderWidth: 2,
			data: [
              {{ hitung_pemasukan('2021-01-01', '2021-02-01') }}, 
              {{ hitung_pemasukan('2021-02-01', '2021-03-01') }}, 
              {{ hitung_pemasukan('2021-03-01', '2021-04-01') }}, 
              {{ hitung_pemasukan('2021-04-01', '2021-05-01') }}, 
              {{ hitung_pemasukan('2021-05-01', '2021-06-01') }}, 
              {{ hitung_pemasukan('2021-06-01', '2021-07-01') }}, 
              {{ hitung_pemasukan('2021-07-01', '2021-08-01') }}, 
              {{ hitung_pemasukan('2021-08-01', '2021-09-01') }}, 
              {{ hitung_pemasukan('2021-09-01', '2021-10-01') }}, 
              {{ hitung_pemasukan('2021-10-01', '2021-11-01') }}, 
              {{ hitung_pemasukan('2021-11-01', '2021-12-01') }}, 
              {{ hitung_pemasukan('2021-12-01', '2021-01-01') }}
            ]
		}]
	},
	options : {
		responsive: true, 
		maintainAspectRatio: false,
		legend: {
			display: false
		},
		tooltips: {
			bodySpacing: 4,
			mode:"nearest",
			intersect: 0,
			position:"nearest",
			xPadding:10,
			yPadding:10,
			caretPadding:10
		},
		layout:{
			padding:{left:5,right:5,top:15,bottom:15}
		},
		scales: {
			yAxes: [{
				ticks: {
					fontStyle: "500",
					beginAtZero: false,
					maxTicksLimit: 5,
					padding: 10
				},
				gridLines: {
					drawTicks: false,
					display: false
				}
			}],
			xAxes: [{
				gridLines: {
					zeroLineColor: "transparent"
				},
				ticks: {
					padding: 10,
					fontStyle: "500"
				}
			}]
		},
		legendCallback: function(chart) { 
			var text = []; 
			text.push('<ul class="' + chart.id + '-legend html-legend">'); 
			for (var i = 0; i < chart.data.datasets.length; i++) { 
				text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
				if (chart.data.datasets[i].label) { 
					text.push(chart.data.datasets[i].label); 
				} 
				text.push('</li>'); 
			} 
			text.push('</ul>'); 
			return text.join(''); 
		}  
	}
});
</script>
@endpush