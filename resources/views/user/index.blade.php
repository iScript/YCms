@extends('layouts.master')




@section('content')

    <ul>
        <li> {{Auth::user()->nickname}} </li>
        <li> <img src="{{Auth::user()->avatar}}" /> </li>
    </ul>
@endsection
