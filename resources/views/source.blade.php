@extends('app')

@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-weight:bold"><h1 style="margin:0">{!! $file[0]->name !!}</h1></div>
				<div class="panel-body">
					<?php
					if (strstr($file[0]->mime, 'image')) {
						?>
						<img style="width:230px; height:220px" src="{!! asset('file/'.$file[0]->id_users.'/'.$file[0]->name) !!}" style='width:1200px; height:800px'>
						<?php
					}
					elseif(strstr($file[0]->mime, 'audio')){
						?>
						<audio src="{!! asset('file/'.$file[0]->id_users.'/'.$file[0]->name) !!}" autobuffer autoloop loop controls></audio>
						<?php
					}
					elseif(strstr($file[0]->mime, 'video')){
						?>
						<video controls preload>
  						<source  src="{!! asset('file/'.$file[0]->id_users.'/'.$file[0]->name) !!}" type="video/mp4">
   						</video>
   						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
@endsection