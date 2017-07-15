@extends('layout.leaders.master')
@section('title')
    Leader
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('createUser')}}"><i class="fa fa-id-card"></i> Variation</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('createVariation')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Variation</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Variation Name</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="variationName" id="" class="form-control">
                            <span class="text-danger">{{$errors->first('variationName')}}</span>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="variationDescription" id="" cols="30" rows="7"
                                      class="form-control textarea"></textarea>
                            <span class="text-danger">{{$errors->first('variationDescription')}}</span>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height:35px;"><i class="glyphicon-save glyphicon"></i> Save</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
        <div class="panel panel-default SystemForm">
            <div class="panel-heading">
                <form action="{{route('searchGroup')}}" method="get">
                    <img src="{{asset('icon/1489866801_icon-111-search.png')}}" alt="" id="isearch">
                    <input type="text" name="search" id="search" placeholder="search...">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>

            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($variations as $variation)
                        <tr>
                            <td>
                                <a href="{{route('editVariation',['id'=>$variation->id])}}"><span class="glyphicon-edit glyphicon"></span></a>&nbsp;
                                <a href="{{route('deleteVariation',['id'=>$variation->id])}}" onclick="return confirm('Are you sure to delete this item?')"><i class="glyphicon-trash glyphicon"></i></a>&nbsp;
                                <a href="{{route('activeVriation',['id'=>$variation->id])}}">@if($variation->status=="1") <i class="glyphicon glyphicon-ok-circle"></i> @else <i class="	glyphicon glyphicon-ban-circle"></i>@endif</a></td>

                            <td>{{$variation->id}}</td>
                            <td>{{$variation->name}}</td>
                            <td>{!!$variation->description!!}</td>
                            <td>{{($variation->status)?"active":"inactive"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$variations->render()}}
        </div>
    </div>

@stop