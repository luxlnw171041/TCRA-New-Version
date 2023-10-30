@extends('layouts.theme')

@section('content')

{{ $type }}

<hr>

@foreach($data_Customer as $item_Customer)
	<p>
		{{ $item_Customer->demerit }}
	</p>
	<br>
@endforeach

<hr>

@foreach($data_Driver as $item_Driver)
	<p>
		{{ $item_Driver->demerit }}
	</p>
	<br>
@endforeach

@endsection
