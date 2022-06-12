<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel 9 CRUD mySql</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300;400;500;700&display=swap');

		* {
			font-family: Roboto, 'sans-serif;';
		}
	</style>
</head>
<body>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Laravel 9 CRUD mySql</h2>
			</div>
			<div class="pull-right mb-2">
				<a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
			</div>
		</div>
	</div>
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
	<p>{{ $message }}</p>
	</div>
	@endif
<table class="table table-bordered table-hover">
	<tr style="text-align: center;">
		<th>ID</th>
		<th>Company Name</th>
		<th>Company Email</th>
		<th>Company Address</th>
		<th width="280px" style="text-align: right;">Action</th>
	</tr>
	@foreach ($companies as $company)
	<tr>
		<td style="text-align: center;">{{ $company->id }}</td>
		<td>{{ $company->name }}</td>
		<td>{{ $company->email }}</td>
		<td>{{ $company->address }}</td>
		<td style="text-align: right;">
			<form action="{{ route('companies.destroy',$company->id) }}" method="Post">
				<a class="btn btn-warning" href="{{ route('companies.edit',$company->id) }}">Edit</a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
{!! $companies->links() !!}
</body>
</html>