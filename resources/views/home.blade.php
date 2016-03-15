@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Upload</div>

				<?php

				?>

				{!! Form::open(array('routes' => 'poster', 'class' => 'dropzone', 'files' => true)) !!}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				{!! Form::close() !!}
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection