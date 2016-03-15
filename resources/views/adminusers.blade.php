@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-weight:bold"><h1 style="margin:0">Listes des fichiers</h1></div>
				<div class="panel-body">
					<table class="table table-responsive">
						<tr>
							<th class="table-bordered" style="text-align: center">Source</th>
							<th class="table-bordered" style="text-align: center">Nom du fichier</th>
							<th class="table-bordered" style="text-align: center">Type de fichier</th>
							<th class="table-bordered" style="text-align: center">Modifier</th>
						</tr>
						@foreach ($files as $file)
						<tr class="table-bordered">
							<td class="table-bordered"><a href='/mine/source/{!! $file->id !!}'><img src="{{ asset('file/'.Auth::user()->id.'/'.$file->name) }}" style='width:100px'></a></td>
							<td class="table-bordered">{!! $file->name !!}</td>
							<td class="table-bordered">{!! $file->mime !!}</td>
							<td class="table-bordered">
								<a href='/admin/edit/{!! $file->id !!}'><button class="btn btn-primary" style="margin:10px">Edit</button></a>
								<a href='/admin/delete/{!! $file->id !!}'><button class="btn btn-danger" style="margin:10px">delete</button></a>
							</td>
						</tr>
						@endforeach
					</table>
					{!! $files->render(); !!}
				</div>
			</div>
		</div>
	</div>
	@endsection