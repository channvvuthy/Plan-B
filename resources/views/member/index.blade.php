@extends('layout.member.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.member.widget.header')
    @include('layout.member.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('member.index')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('member.index')}}"><i class="glyphicon glyphicon-signal"></i> Order</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if(!empty(Auth::user()->group['type']))
            @if(Auth::user()->group['type']=='qc')
                @include('member.qc')
            @else
                @include('member.otherMember')
            @endif

        @endif


    </div>
@stop