<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Register</h3>
				</div>
				<div class="panel-body">
					<form action="{{route('affiliate_form_save')}}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-share-alt"></i></span>
								<input class="form-control" type="text" name="platform" placeholder="Platform">

							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-share-alt"></i></span>
								<input class="form-control" type="text" name="platform_id" placeholder="Platform ID">

							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-image"></i></span>
								<input class="form-control" type="file" name="nid" accept="image/*">
							</div>
						</div>
						

						<div class="form-group">

							<input class="btn btn-success pull-right" type="submit" name="submit" value="Submit">

						</div>

					</div>
				</form>
			</div>
		</div>
	</div>

</form>