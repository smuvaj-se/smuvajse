@extends('layouts.app')

@section('content')

    <reset-page>

        <slot>

            <email-password-form 

                messages="{{ session('status') ? session('status') : '' }}"

                errors-server="{{ $errors->has('email') ? $errors->first('email') : '' }}"

            >
                
            </email-password-form>

        </slot>

    </reset-page>

@endsection
