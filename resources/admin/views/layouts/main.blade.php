<script>
	window.Laravel = <?php echo json_encode([
	    'csrfToken' => csrf_token(),
	]); ?>
</script>

@extends('adminlte::page')

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('admin/css/admin.css') }}">
@endsection

@section('js')
	 <script src="{{ URL::asset('js/manifest.js') }}"></script>
	 <script src="{{ URL::asset('js/vendor.js') }}"></script>
	 <script src="{{ URL::asset('admin/js/app.js') }}"></script>
@endsection
