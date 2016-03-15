@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-weight:bold"><h1 style="margin:0">Listes Inscrit</h1></div>
				<div class="panel-body">
					<table class="table table-responsive">
						<tr>
							<th class="table-bordered" style="text-align: center">Id</th>
							<th class="table-bordered" style="text-align: center">Username</th>
							<th class="table-bordered" style="text-align: center">Name</th>
							<th class="table-bordered" style="text-align: center">Lastname</th>
							<th class="table-bordered" style="text-align: center">Email</th>
							<th class="table-bordered" style="text-align: center">Role</th>
							<th class="table-bordered" style="text-align: center">Modifier</th>
						</tr>
						@foreach ($users as $user)
						<tr class="table-bordered">
							<td class="table-bordered">{!! $user->id !!}</td>
							<td class="table-bordered">{!! $user->username !!}</td>
							<td class="table-bordered">{!! $user->lastname !!}</td>
							<td class="table-bordered">{!! $user->name !!}</td>
							<td class="table-bordered">{!! $user->email !!}</td>
							<td class="table-bordered">{!! $user->role !!}</td>
							<td class="table-bordered">
							<a href='/admin/deleteuser/{!! $user->id !!}'><button class="btn btn-danger" style="margin:10px">delete</button></a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
