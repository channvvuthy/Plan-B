@extends('master')
@section('content')
    @include('home.header')
    <div class="container">
        {{-- start menu --}}
        @include('inc.header')
        {{--  End menu --}}
        <div class="row tap_nav">
            <div class="bhoechie-tab-container">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            {!!Html::image('icon/dc.png')!!} ALL CATEGORY
                        </a>
                        <a href="#" class="list-group-item text-center">
                            {!!Html::image('icon/dc.png')!!} DISCONUNT PRODUCTS
                        </a>
                        <a href="#" class="list-group-item text-center">
                            {!!Html::image('icon/prosell.png')!!} PRODUCTS FOR SELL
                        </a>
                        <a href="#" class="list-group-item text-center">
                            {!!Html::image('icon/Heart.png')!!} WANTED PRODUCT
                        </a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 bhoechie-tab">
                    <!-- flight section -->

                    <div class="bhoechie-tab-content active">
                        <center>

                            @foreach($menucat as $menucats)
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 max_width">
                                    <a href="#">{!!Html::image('icon/'.$menucats->icon)!!}<br/>{{$menucats->name}}</a>
                                </div>
                            @endforeach
                        </center>
                    </div>

                    <!-- train section -->
                    <div class="bhoechie-tab-content">
                        <center>
                            DISCOUNT PRODUCTS
                        </center>
                    </div>


                    <div class="bhoechie-tab-content">
                        <center>
                            PRODUCTS FOR SELL
                        </center>
                    </div>

                    <div class="bhoechie-tab-content">
                        <center>
                            WANTED PRODUCT
                        </center>
                    </div>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="path_item">
                    <ul>
                        <li class="glyphicon glyphicon-home"><a href="">Home</a></li>
                        <li><a href="">Category</a></li>
                        <li><a href="">Sub Category</a></li>
                    </ul>
                </div>
                <div class="main_detailitem">
                    <div class="detail_spacehead">
                        @if(empty(\Auth::check()))
                            <a href="#" class="modal-login saveads"><span class="save_item">Save</span></a>
                        @else
                            @php
                                $exists = DB::table('user_saves')
                                ->whereproduct_id($productdetail->id)
                                ->whereuser_id(Auth::user()->id)
                                ->count() > 0;
                            @endphp
                            @if($exists)
                                <a href="{{ route('product-unsave',array('userID'=>\Auth::user()->id,'productID'=>$productdetail->id,'key'=>bcrypt($productdetail->title))) }}"
                                   class="saveads saved"><span class="save_item">Save</span></a>
                            @else
                                <a href="{{ route('product-save',array('userID'=>\Auth::user()->id,'productID'=>$productdetail->id,'key'=>bcrypt($productdetail->title))) }}"
                                   class="saveads"><span class="save_item">Save</span></a>
                            @endif
                        @endif
                        <input type="hidden" name="pdoduct_id" value="{{ $productdetail->id }}">
                        <input type="hidden" name="user_id" value="{{ $productdetail->hasUser->id }}">
                        <div class="head_itemdetail">
                            <h3>{{ $productdetail->title }}</h3>
                            <div class="item_product">
                                <div class="col-sm-4 itemlist-ID">
                                    <p><span>Ad ID : </span>{{ $productdetail->post_code }}</p>
                                </div>
                                <div class="col-sm-6 itemlist-datepost">
                                    <p>
                                        <span>Posted On : </span>{{ date("d-M-y", strtotime($productdetail->created_at)) }}
                                    </p>
                                </div>
                                <div class="col-sm-2 itemlist-view">
                                    <p><span>View : </span>{{ $productdetail->hits }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail_space">
                        <div class="col-sm-8 padding_clear">
                            <div class="item_img">
                                <div class="gallery">
                                    <?php $imageArray = explode(",", $productdetail->hasImages->image);?>
                                    @foreach($imageArray as $itemslider)
                                        <div class="gallery__img-block  ">
                                            {{-- <span class="">{{ $productdetail->hasImages->image }}</span> --}}
                                            <img src="{{ asset('uploads') }}/{{$itemslider}}"
                                                 thumb-url="{{ asset('uploads') }}/{{$itemslider}}" class="">
                                        </div>
                                    @endforeach
                                    <div class="gallery__controls">

                                    </div>
                                </div>
                            </div>
                            <div class="articel_detail">
                                <div class="item_accessory">
                                    <div class="brand_item">
                                        <p>Brand : <span class="new">Apple</span></p>
                                    </div>
                                    <div class="price_ONitem" style="text-align: right;">
                                        @php
                                            $oldprice=$productdetail->price;
                                            $discount=$productdetail->discount;
                                            $newprice=$oldprice-$oldprice*$discount/100;
                                        @endphp
                                        @if ($productdetail->discount=='')
                                            <p>Price : <span class="new"
                                                             style="padding-left: 5px;">${{ $productdetail->price }}</span>
                                            </p>
                                        @else
                                            <p>Price : <span class="old">${{ $productdetail->price }}</span><span
                                                        class="new" style="padding-left: 5px;">${{ $newprice }}</span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="detail_descItem">
                                    <h3>Description</h3>
                                    <p style="margin-top: 20px;">{{ $productdetail->description }}</p>
                                </div>
                                <div class="detail_contactItem">
                                    <h3>Contact</h3>
                                    <p style="margin-top: 20px;">
                                        <span>Name </span>: {{ $productdetail->hasUser->username }}
                                    </p>
                                    <p><span>Phone </span>: {{ $productdetail->hasUser->phone }}</p>
                                    @if($productdetail->hasUser->location_id==Null)

                                    @else
                                        <p><span>Location </span>: {{ $productdetail->hasUser->hasLocation->name }}</p>
                                    @endif
                                    <p><span>Address </span>: {{ $productdetail->hasUser->address }}</p>
                                    <p><span>Store </span>: <a
                                                href="{{route('store',['phone'=>$productdetail->hasUser->phone])}}">: {{ asset($productdetail->hasUser->phone) }}</a>
                                    </p>

                                </div>
                                <hr>
                                @if(!empty($productdetail->getComment))
                                    @foreach($productdetail->getComment as $comment)
                                        <div class="row comments">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                @php
                                                    $email=md5(getUserName($comment->created_by)->email);
                                                @endphp
                                                <img src="https://www.gravatar.com/avatar/{{$email}}?d=mm&f=y" alt=""
                                                     width="60px" style="margin-bottom:10px;">
                                                <br>
                                                <div class="clearfix"></div>
                                                <a href="">
                                                    @if(!empty($comment->created_by))
                                                        {{getUserName($comment->created_by)->firstname}}
                                                        {{getUserName($comment->created_by)->lastname}}
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <p>{{$comment->description}}</p>
                                                <p><strong>{{$comment->created_at->diffForHumans()}}</strong></p>
                                                <div class="clearfix"><br></div>
                                                <hr>
                                                <div class="row">
                                                    @if(!empty(getCheck($comment->id)))
                                                        @foreach(getCheck($comment->id) as $reply)
                                                            <div class="col-md-3 col-xs-12 col-sm-2">
                                                                @php

                                                                    $email=md5(getUserName($reply->created_by)->email);
                                                                @endphp
                                                                <img src="https://www.gravatar.com/avatar/{{$email}}?d=mm&f=y"
                                                                     alt=""
                                                                     width="50px" style="margin-bottom:10px;">
                                                                <div class="clearfix"></div>
                                                                <a href="">
                                                                    {{getUserName($reply->created_by)->firstname}}

                                                                    {{getUserName($reply->created_by)->lastname}}
                                                                </a>
                                                            </div>
                                                            <div class="col-md-9 col-xs-12 col-sm-10">

                                                                <p>{{$reply->description}}</p>
                                                                <p>
                                                                    <strong>{{$comment->created_at->diffForHumans()}}</strong>
                                                                </p>
                                                            </div>
                                                            <div class="clearfix" style="margin-bottom: 15px;"></div>
                                                        @endforeach
                                                    @endif
                                                    <div class="cleafix"></div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <textarea name="messageReply"
                                                                      class="form-control messageReply"
                                                                      parent-id="{{$comment->id}}"
                                                                      post-id="{{$productdetail->id}}">{{old('message')}}</textarea>

                                                        <br>
                                                        <p class="replyError has-error"></p>
                                                        <button class="btn btn-default btn-xs @if(Auth::check()) reply @else loginReply @endif">
                                                            Reply
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <hr>
                                    @endforeach

                                @endif
                                @if(Auth::check())
                                    <form action="">
                                        <input type="hidden" name="_token" value="{{Session::token()}}">
                                        <div class="col-md-2">
                                            <img src="https://www.gravatar.com/avatar/{{Auth::user()->email}}?d=mm&f=y"
                                                 alt="" width="60px">
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="message" class="form-control message"
                                                      post-id="{{$productdetail->id}}"
                                                      placeholder="Comment Here">{{old('message')}}</textarea>
                                            <div class="error"></div>
                                            <br>
                                            <br>
                                            <button class="btn-primary btn btn-xs @if(Auth::check()) comment @else loginComment  @endif">
                                                <i class="glyphicon glyphicon-comment"></i> Comment
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                @else

                                    <div class="clearfix"></div>
                                    <div class="col-md-2">
                                        <img src="{{asset('images/default-user.jpg')}}" alt="" width="60px">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-10">
                                    <textarea name="message" class="form-control"
                                              placeholder="Comment Here">{{old('message')}}</textarea>

                                        <div class="clearfix"><h1></h1></div>
                                        <button class="btn-primary btn btn-xs @if(Auth::check()) comment @else loginComment  @endif">
                                            <i class="glyphicon glyphicon-comment"></i> Comment
                                        </button>
                                    </div>

                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 padding_right col-xs-12 priceLeft">
                            <div class="price_side mar_left">
                                @php
                                    $oldprice=$productdetail->price;
                                    $discount=$productdetail->discount;
                                    $newprice=$oldprice-$oldprice*$discount/100;
                                @endphp
                                @if ($productdetail->discount=='')
                                    <p>Price : <span class="new"
                                                     style="padding-left: 5px;color: #D00B0B;">${{ $productdetail->price }}</span>
                                    </p>
                                @else
                                    <p>Price : <span class="old">${{ $productdetail->price }}</span><span class="new"
                                                                                                          style="padding-left: 5px;color: #D00B0B;font-size: 18px;">${{ $newprice }}</span>
                                    </p>
                                @endif
                            </div>
                            <div class="profile_store mar_left">
                                <div class="cover_photo">
                                    @if(empty($productdetail->hasUser->photo))
                                        <img src="{{ asset('uploads') }}/default-post.png" alt="">
                                    @else
                                        <img src="{{ asset('uploads') }}/{{ $productdetail->hasUser->photo }}" alt="">
                                    @endif
                                </div>
                                <div class="user_store">{{ $productdetail->hasUser->username }}</div>
                            </div>
                            {{--  --}}
                            <ul class=" navtabs mar_left">
                                <li class="active"><a data-toggle="tab" href="#Info_"
                                                      class="Info_ glyphicon glyphicon-exclamation-sign">Information</a>
                                </li>
                                <li><a data-toggle="tab" href="#map_"
                                       class="map_ glyphicon glyphicon-map-marker">Map</a>
                                </li>
                            </ul>
                            <div class="tab-content mar_left padding_clear">
                                <div id="Info_" class="tab-pane fade in active">
                                    <ul>
                                        <li>
                                            <i class="glyphicon glyphicon-phone"></i>{{ $productdetail->hasUser->phone }}
                                        </li>
                                        <li>
                                            <i class="glyphicon glyphicon-user"></i> {{ $productdetail->hasUser->username }}
                                        </li>
                                        @if($productdetail->hasUser->location_id==Null)

                                        @else
                                            <li>
                                                <i class="glyphicon glyphicon-map-marker"></i> {{ $productdetail->hasUser->hasLocation->name }}
                                            </li>
                                        @endif
                                        <li> {{ $productdetail->hasUser->address }}</li>
                                    </ul>
                                </div>
                                <div id="map_" class="tab-pane fade">
                                    {{-- <div class="fram_map">
                                        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0"
                                          marginwidth="0"
                                          src="https://maps.google.com/maps?q={{$productdetail->hasUser->hasStore->location_name}}&hl=es;z=25.5&amp;output=embed"></iframe>
                                    </div> --}}
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="100%" height="400" id="gmap_canvas"
                                                    src="https://maps.google.com/maps?q={{$productdetail->hasUser->hasStore->location_name}} &t=&z=14&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"></iframe>
                                        </div>
                                        <style>.mapouter {
                                                overflow: hidden;
                                                height: 600px;
                                            }

                                            .gmap_canvas {
                                                background: none !important;
                                                height: 500px;
                                                width: 400px;
                                            }</style>
                                    </div>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqf3oycy4EC_xtJesUeGE8oLpF-KSt6p4&libraries=places&callback=initAutocomplete"
                                            async defer></script>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="shere_report_detail">
                    <div class="col-sm-6 share_icon padding_clear">
                        <p data-toggle="shares" data-html="true"
                           title="<a href='{{Share::load(route('item-detail',['title'=>$productdetail->title,'id'=>$productdetail->id]))->facebook()}}' class='fa fa-facebook' target='_blank'>facebook<a/>"
                           data-content="<a href='{{Share::load(route('item-detail',['title'=>$productdetail->title,'id'=>$productdetail->id]))->twitter()}}' class='fa fa-twitter' target='_blank'>twitter<a/>"
                           data-footer="<a href='{{Share::load(route('item-detail',['title'=>$productdetail->title,'id'=>$productdetail->id]))->twitter()}}' class='fa fa-twitter' target='_blank'>twitter<a/>"
                           data-placement="top">Share</p>
                    </div>
                    {{--  --}}
                    <div class="col-sm-6 report_icon padding_clear">
                        <a href="#" id="report_" onclick="report__form()">Report</a>
                    </div>
                </div>
                <div class="list_productItems">
                    <h4>Disclaimer</h4>
                    <div class="detail_space">
                        <p>{{ $productdetail->disclaimer }}</p>
                    </div>
                </div>
                <div class="list_productItems">
                    <h4>
                        Morefrom {{ (!empty($productdetail->hasUser->username))?$productdetail->hasUser->username:'' }}</h4>
                    <div class="detail_slider">
                        <div class="owl-carousel owl-theme">
                            {{-- <div id="owl-demo" class="owl-carousel owl-theme"> --}}
                            @if(!empty($productdetail->hasUser->Posts))
                                @foreach($productdetail->hasUser->Posts as $productitem)
                                    <div class="item">
                                        <div class="col-sm--3 padding_RL">
                                            <div class="itemsdAll height">
                                                <div class="img_itemsd">
                                                    <a href="{{ route('item-detail',[$productdetail->title,$productdetail->id]) }}">
                                                        @if ($productdetail->discount=='')
                                                            {{-- expr --}}
                                                        @else
                                                            <div class="dis_price">
                                                                <p>{{ $productdetail->discount }}%</p>
                                                                <p>Off</p>
                                                            </div>
                                                        @endif
                                                        @if(!empty($productitem->hasImages->image))
                                                            @php $imageArray = explode(",", $productitem->hasImages->image); @endphp
                                                            @if(!empty($imageArray[0]) && $imageArray[0]!="")
                                                                <img src="{{ asset('uploads') }}/{{ $imageArray[0] }}"
                                                                     alt="" class="img-responsive">
                                                            @endif
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="item-text">
                                                <p>{{ $productitem->title }}</p>
                                                @php
                                                    $oldprice=$productitem->price;
                                                    $discount=$productitem->discount;
                                                    $newprice=$oldprice-$oldprice*$discount/100;
                                                @endphp
                                                @if($productitem->discount=='')
                                                    <p class="price_itemsd">${{ $productitem->price }}</p>
                                                @else
                                                    <p class="price_itemsd">
                                                        <span>${{ $productitem->price }}</span>${{ $newprice }}</p>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                {{-- Report Form --}}
                <div class="modal modal__report fade" id="report_modal">
                    <div class="modal-dialog w-report">
                        <div class="modal-content" style="padding:10px;">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close"
                                        data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Report</h4>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form action="{{route('report')}}">
                                    <input type="hidden" value="{{ $productdetail->id }}" name="post_id">
                                    <div class="form-group">
                                        <label class="check_report radio-inline">
                                            <input type="radio" class="ch-report" value="Product already sold"
                                                   name="checkReport">Product already sold
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="check_report radio-inline">
                                            <input type="radio" class="ch-report"
                                                   value="Seller not responding/phone unreachable" name="checkReport">Seller
                                            not responding/phone unreachable
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="check_report radio-inline">
                                            <input type="radio" class="ch-report" value="Fraud reason"
                                                   name="checkReport">Fraud
                                            reason
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="check_report radio-inline">
                                            <input type="radio" class="ch-report" value="Wrong category"
                                                   name="checkReport">Wrong
                                            category
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="check_report radio-inline">
                                            <input type="radio" class="ch-report" value="Ad is duplicate"
                                                   name="checkReport">Ad is duplicate
                                        </label>
                                    </div>
                                    <div class="bt-footer">
                                        <button type="submit" class="report-send btn btn-default disabled">Send Report
                                        </button>
                                        <!-- Modal Footer -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End --}}
            </div>
        </div>
    </div>
    {{-- login --}}
    <div class="row">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="closemodal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3>
                            <center>Login to Your account</center>
                        </h3>
                        <br/>
                    </div>
                    <div class="modal-body">

                        {!! Form::open(['method' => 'POST', 'url' => route('users.login')]) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email or Phone Number') !!} <b>*</b>
                            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required',
                            'placeholder' => 'Your Email or Phone Number']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password') !!} <b>*</b>
                            {!! Form::password('password', ['class' => 'form-control', 'required' =>
                            'required','placeholder' => 'Your Password']) !!}
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="form-group">
                            <div class="checkbox{{ $errors->has('remember') ? ' has-error' : '' }}">
                                <label for="remember">
                                    {!! Form::checkbox('remember', '1', null, ['id' => 'remember']) !!}
                                    remember me
                                </label>
                            </div>
                            <small class="text-danger">{{ $errors->first('remember') }}</small>
                        </div>

                        <button type="submit" class="btn btn-danger">Login</button>
                        <span><a href="#" id="forgotpwd"> Forgot Password ?</a></span>

                        <hr>

                        <div class="form-group">
                            <h4>
                                <center>Login by using Facebook account</center>
                            </h4>
                            <a href="http://khdiscount.com//login/facebook"
                               class="btn btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> Login with facebook
                            </a>
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

    </div>
    {{-- footer --}}
    @include('home.footer')

    {{--end footer --}}

    {{--   End Modal Login form --}}
    <style>
        .owl-prev:before {
            content: '';
            position: absolute;
            background: url("{{asset('icon')}}/prev.png") no-repeat;
            background-size: contain;
            width: 30px;
            height: 30px;
        }

        .owl-next:before {
            content: '';
            position: absolute;
            background: url("{{asset('icon')}}/next.png") no-repeat;
            background-size: contain;
            width: 30px;
            height: 30px;
        }

        .owl-next:hover:before, .owl-prev:hover:before {
            opacity: .8;
            content: '';
            position: absolute;
        }

        .hide-bullets {
            list-style: none;
            margin-left: -40px;
            margin-top: 20px;
        }

        .report_icon {
            text-align: right;
        }

        .share_icon p, .report_icon a {
            position: relative;
            color: #fff;
            cursor: pointer;
            margin-bottom: 0;
        }

        .share_icon p {
            padding-left: 25px;
        }

        .share_icon p:before {
            content: '';
            position: absolute;
            left: 0;
            top: 3px;
            background: url("{{asset('icon')}}/shear_icon.png") no-repeat;
            background-size: contain;
            width: 18px;
            height: 18px;
        }

        .report_icon a:before {
            content: '';
            position: absolute;
            left: 0;
            top: -4px;
            background: url("{{asset('icon')}}/report_icon.png") no-repeat;
            background-size: contain;
            width: 18px;
            height: 18px;
        }

        .saveads {
            position: absolute;
            right: 10px;
            top: 0;
            width: 79px;
            text-align: right;
            font-weight: 900;
            font-size: 16px;
            color: #585757;
        }

        .saveads:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            background: url("{{asset('icon')}}/save_icon.png") no-repeat;
            background-size: contain;
            width: 20px;
            height: 39px;
        }

        .saveads:hover:before, .saved:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            background: url("{{asset('icon')}}/save_hover.png") no-repeat;
            background-size: contain;
            width: 20px;
            height: 39px;
        }

        /*slider*/
        .gallery__fullscreen__controls .prev {
            left: 0;
            background-image: url('{{asset('slider/img')}}/left_black_2x.png');
            background-size: 100%;
            border-radius: 0 20px 20px 0;
            background-position: right;
        }

        .gallery__fullscreen__controls .next {
            right: 0;
            background-image: url('{{asset('slider/img')}}/right_black_2x.png');
            background-size: 100%;
            border-radius: 20px 0 0 20px;
            background-position: left;
        }

        .gallery__controls-buttons .prev {
            left: -25px;
            background-image: url('{{asset('slider/img')}}/left_black.png');
            background-size: 30px;
            border-radius: 0 20px 20px 0;
            background-position: right;
        }

        .gallery__controls-buttons .next {
            right: -25px;
            background-image: url('{{asset('slider/img')}}/right_black.png');
            background-size: 30px;
            border-radius: 20px 0 0 20px;
            background-position: left;
        }

        /**/
    </style>
    <?php
    function getUserName($id = 1)
    {
        return App\User::find($id);
    }

    function getCheck($id = null)
    {
        return App\Model\Comment::where("parent_id", $id)->get();
    }
    ?>
    <script type="text/javascript">
        $("body").on("click", ".comment", function (e) {
            e.preventDefault();
            var object = $(".message");
            var message = object.val();
            var postID = object.attr('post-id');
            if (message == "") {
                object.addClass('has-error');
                $(".error").css({"color": "#d00b0b"});
                $(".error").text("Enter your message");
                return;

            } else {
                object.removeClass('has-error');
                $(".error").text("");
            }
            jQuery.ajax({
                url: "{{route('comment')}}",
                type: "GET",
                data: {id: postID, message: message},
                success: function () {
                    window.location.reload();
                },
                error: function () {

                }
            });
        });
        /*
         Reply Message
         */
        $("body").on('click', '.reply', function () {
            var objectReply = $(this).prev().prev().prev();
            var parentID = objectReply.attr('parent-id');
            var postID = objectReply.attr('post-id');
            var message = objectReply.val();
            if (message == "") {
                objectReply.addClass('has-error');

                $(this).prev().text('Please enter your message');
                $(this).prev().css({"color": "#d00b0b"});
                return;
            } else {
                objectReply.removeClass('has-error');
                $(this).prev().text('');
            }
            jQuery.ajax({
                url: "{{route('reply.comment')}}",
                type: "GET",
                data: {parent_id: parentID, post_id: postID, message: message},
                success: function () {
                    window.location.reload();
                },
                error: function () {

                }
            });


        });
    </script>
@stop