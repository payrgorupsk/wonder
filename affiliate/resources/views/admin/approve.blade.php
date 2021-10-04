<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<div class="container-fluid col-xs-8 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>Approve Affiliates</b>
		</div>
		<div class="panel-body">
			<div class="table-responsive">

				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>User ID</th>
							<th>User Name</th>
							<th>Platform</th>
							<th>Platform ID</th>
							<th>Document</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach($Wo_affiliate as $row)
						<tr>
							<td>{{$row->user_id}}</td>
							<td>{{$row->first_name.' '.$row->last_name}}</td>
							<td>{{$row->platform}}</td>
							<td>{{$row->platform_id}}</td>
							<td><a href="{{asset($row->nid)}}" target="_blank"><img src="{{asset($row->nid)}}" width="100px"></a></td>
							<td>@if ($row->status == 0) <a class="btn btn-success" href="#">Approve</a>@endif</td>
						</tr>
						@endforeach

					</tbody>

					
				</table>

				{{ $Wo_affiliate->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>
</div>