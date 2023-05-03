@extends('layout.seller.master')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
@endsection
@section('page')
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Today Order</h4>
						</div>
						<div class="card-body">
							0
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Today Pending Order</h4>
						</div>
						<div class="card-body">
							0
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Order</h4>
						</div>
						<div class="card-body">
							12
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Pending Orde</h4>
						</div>
						<div class="card-body">
							5
						</div>
					</div>
				</div>
			</div>                  
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Declined Order</h4>
						</div>
						<div class="card-body">
							0
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-shopping-cart"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Complete Order</h4>
						</div>
						<div class="card-body">
							6
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Today Earning</h4>
						</div>
						<div class="card-body">
							$0
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Today Pending Earning</h4>
						</div>
						<div class="card-body">
							$0
						</div>
					</div>
				</div>
			</div>                  
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>This month Earning</h4>
						</div>
						<div class="card-body">
							$0
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>This Year Earning</h4>
						</div>
						<div class="card-body">
							$600817.98
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Earning</h4>
						</div>
						<div class="card-body">
							$600817.98
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Today Product Sale</h4>
						</div>
						<div class="card-body">
							0
						</div>
					</div>
				</div>
			</div>                  
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>This Month Product Sale</h4>
						</div>
						<div class="card-body">
							0
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>This Year Product Sale</h4>
						</div>
						<div class="card-body">
							23
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Product Sale</h4>
						</div>
						<div class="card-body">
							23
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Product</h4>
						</div>
						<div class="card-body">
							33
						</div>
					</div>
				</div>
			</div>                  
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Product Report</h4>
						</div>
						<div class="card-body">
							5
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Product Review</h4>
						</div>
						<div class="card-body">
							7
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Seller</h4>
						</div>
						<div class="card-body">
							4
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total User</h4>
						</div>
						<div class="card-body">
							6
						</div>
					</div>
				</div>
			</div>                  
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Subscriber</h4>
						</div>
						<div class="card-body">
							1
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Blog</h4>
						</div>
						<div class="card-body">
							9
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Product Category</h4>
						</div>
						<div class="card-body">
							12
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Brand</h4>
						</div>
						<div class="card-body">
							13
						</div>
					</div>
				</div>
			</div>                  
		</div>

		<div class="section-body">
        	<div class="row mt-4">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h3>Today New Order</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive table-invoice">
								<table class="table table-striped" id="dataTable">
									<thead>
										<tr>
											<th width="5%">SN</th>
											<th width="10%">Customer</th>
											<th width="10%">Order Id</th>
											<th width="10%">Date</th>
											<th width="10%">Quantity</th>
											<th width="10%">Amount</th>
											<th width="10%">Order Status</th>
											<th width="10%">Payment</th>
											<th width="15%">Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </div>
      	</div>
	</section>
</div>

<script>
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection
