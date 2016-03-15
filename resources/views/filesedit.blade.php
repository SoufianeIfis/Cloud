@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-weight:bold"><h1 style="margin:0">Listes des fichiers</h1></div>
				<div class="panel-body">
				<!-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/mine') }}"> -->
				{!! Form::open(array('routes' => 'edit'))!!}
					<label class="table-bordered" style="text-align: center">Edit file</label>
					<input type="name" class="form-control" name="name" value="{{ old('name') }}">
					<button class="btn btn-primary" style="margin:10px">Edit</button>
				{!! Form::close() !!}
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection