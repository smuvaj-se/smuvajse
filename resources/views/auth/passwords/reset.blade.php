@extends('layouts.app')

@section('content')

<reset-page>
    
    <reset-password-form

        messages="{{ session('status') ? session('status') : '' }}"

        errors-server="{{ $errors->has('email') ? $errors->first('email') : '' }}"

    >
        
    </reset-password-form>

</reset-page>

@endsection
