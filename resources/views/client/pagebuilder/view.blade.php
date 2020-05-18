{{-- @extends('client.pagebuilder.layouts.app')
@push('header')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@endpush --}}

{{-- @push('css') --}}
    <style>
        *::-webkit-scrollbar-track {
            background: #6E7280 0% 0% no-repeat padding-box!important;
        }
        *::-webkit-scrollbar-thumb {
            background: #07090F 0% 0% no-repeat padding-box!important;
        }
        body {
            overflow: hidden;
        }
        {!!$view->css!!}
        /* style from database */

    </style>
{{-- @endpush --}}

{{-- @section('content') --}}
{!!$view->html!!}
    {{-- html from database --}}

    {{-- {{$title}} --}}
{{-- @endsection --}}
