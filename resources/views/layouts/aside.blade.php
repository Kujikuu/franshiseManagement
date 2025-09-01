
<div class="aside aside-left d-flex aside-fixed" id="kt_aside">
    <!--begin::Primary-->

    <!--end::Primary-->
    <!--begin::Secondary-->
    <div class="aside-secondary d-flex flex-row-fluid">
        <!--begin::Workspace-->
        <div class="aside-workspace scroll scroll-push my-2">
            <!--begin::Tab Content-->
            <div class="tab-content">
                <!--begin::Tab Pane-->
                <!--end::Tab Pane-->
                <a href="{{ URL::to('/') }}">
                    {{--<img style="max-height: 34px" alt="Logo" src="{{ asset('frontend/img/logo-black.png') }}" class="logo-default mt-5 ml-5" />--}}
                </a>
                <!--begin::Tab Pane-->
                <div class="tab-pane fade show active" id="kt_aside_tab_2">
                    <!--begin::Aside Menu-->
                    <div class="aside-menu-wrapper flex-column-fluid px-10 py-5" id="kt_aside_menu_wrapper">
                        <!--begin::Menu Container-->
                        <div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1">
                            <!--begin::Menu Nav-->
                            <ul class="menu-nav">
                                @if(auth()->user()->type == 'admin')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('dashboard') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(1)=='') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(1)=='' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(1)=='' ) text-primary  @endif flaticon-squares"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(1)=='' ) text-primary @endif font-size-h6 mb-0">
                                                    Financial Overview
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>

                                    <li class="menu-item menu-item-submenu @if(request()->segment(1)== 'dashboard' && (request()->segment(2) == 'users' )) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class=" menu-toggle text-muted text-hover-primary font-weight-bold side-link">
                                            <div class="list-item hoverable p-2 p-lg-3 mb-2 @if(request()->segment(1)== 'dashboard' && (request()->segment(2) == 'users')) active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label  ">
                                                        <span class="svg-icon svg-icon-xl  ">
                                                          <i style="font-size: 1.7rem"  class=" @if(request()->segment(1)=='cities' ) text-primary  @endif icon-xl fas fa-user"></i>                                             <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="text-muted font-size-h6 mb-0">
                                                        Users
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">

                                                <li class="menu-item @if(request()->segment(2) == 'users' && request()->segment(3) == 'franchisor' ) menu-item-active @endif" aria-haspopup="true">
                                                    <a href="{{ route('users' , 'franchisor') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot @if(request()->segment(2) == 'users' && request()->segment(3) == 'franchisor')  active @endif">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Franchisor</span>
                                                    </a>
                                                </li>

                                                <li class="menu-item @if(request()->segment(2) == 'users' && request()->segment(3) == 'franchisee' ) menu-item-active @endif" aria-haspopup="true">
                                                    <a href="{{ route('users' , 'franchisee') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot @if(request()->segment(2) == 'users' && request()->segment(3) == 'franchisee')  active @endif">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Franchisee</span>
                                                    </a>
                                                </li>

                                                <li class="menu-item @if(request()->segment(2) == 'users' && request()->segment(3) == 'sales' ) menu-item-active @endif" aria-haspopup="true">
                                                    <a href="{{ route('users' , 'sales') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot @if(request()->segment(2) == 'users' && request()->segment(3) == 'sales')  active @endif">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Sales</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>


                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('technical_requests') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='technical_requests') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='technical_requests' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='technical_requests' ) text-primary  @endif flaticon-list"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='technical_requests' ) text-primary @endif font-size-h6 mb-0">
                                                    Technical Requests
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>


                                @elseif(auth()->user()->type == 'franchisor')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('dashboard') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div class="list-item hoverable p-2 p-lg-3 mb-2 @if(request()->segment(1)== 'dashboard' && (request()->segment(2) == 'users')) active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label  ">
                                                        <span class="svg-icon svg-icon-xl  ">
                                                          <i style="font-size: 1.7rem"  class=" @if(request()->segment(1)=='dashboard' ) text-primary  @endif icon-xl flaticon-squares"></i>                                             <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="text-muted font-size-h6 mb-0">
                                                        Dashboard
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>


                                    {{--<li class="menu-item menu-item-submenu @if(request()->segment(1)== 'dashboard' && (request()->segment(2) == 'leads' || request()->segment(2) == 'myfranchise' )) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover">--}}
                                        {{--<a href="javascript:;" class=" menu-toggle text-muted text-hover-primary font-weight-bold side-link">--}}
                                            {{--<div class="list-item hoverable p-2 p-lg-3 mb-2 @if(request()->segment(1)== 'dashboard' && (request()->segment(2) == 'users')) active @endif ">--}}
                                                {{--<div class="d-flex align-items-center">--}}
                                                    {{--<!--begin::Symbol-->--}}
                                                    {{--<div class=" symbol-40 symbol-light mr-7">--}}
                                                    {{--<span class="symbol-label  ">--}}
                                                        {{--<span class="svg-icon svg-icon-xl  ">--}}
                                                          {{--<i style="font-size: 1.7rem"  class=" @if(request()->segment(1)=='dashboard' ) text-primary  @endif icon-xl flaticon-squares"></i>                                             <!--end::Svg Icon-->--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                    {{--<!--end::Symbol-->--}}
                                                    {{--<!--begin::Text-->--}}
                                                    {{--<div class="d-flex flex-column flex-grow-1 mr-2">--}}
                                                    {{--<span class="text-muted font-size-h6 mb-0">--}}
                                                        {{--Dashboard--}}
                                                    {{--</span>--}}

                                                    {{--</div>--}}
                                                    {{--<!--begin::End-->--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                        {{--<div class="menu-submenu">--}}
                                            {{--<i class="menu-arrow"></i>--}}
                                            {{--<ul class="menu-subnav">--}}

                                                {{--<li class="menu-item @if(request()->segment(2) == 'users' && request()->segment(3) == 'franchisor' ) menu-item-active @endif" aria-haspopup="true">--}}
                                                    {{--<a href="{{ route('leads') }}" class="menu-link">--}}
                                                        {{--<i class="menu-bullet menu-bullet-dot @if(request()->segment(2) == 'users' && request()->segment(3) == 'franchisor')  active @endif">--}}
                                                            {{--<span></span>--}}
                                                        {{--</i>--}}
                                                        {{--<span class="menu-text">Leads</span>--}}
                                                    {{--</a>--}}
                                                {{--</li>--}}




                                                {{--<li class="menu-item @if(request()->segment(2) == 'users' && request()->segment(3) == 'sales' ) menu-item-active @endif" aria-haspopup="true">--}}
                                                    {{--<a href="{{ route('myfranchise') }}" class="menu-link">--}}
                                                        {{--<i class="menu-bullet menu-bullet-dot @if(request()->segment(2) == 'users' && request()->segment(3) == 'sales')  active @endif">--}}
                                                            {{--<span></span>--}}
                                                        {{--</i>--}}
                                                        {{--<span class="menu-text">Franchise</span>--}}
                                                    {{--</a>--}}
                                                {{--</li>--}}


                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('associates') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='associates') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='associates' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='associates' ) text-primary  @endif flaticon2-user"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='associates' ) text-primary @endif font-size-h6 mb-0">
                                                    Sales Associate
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>

                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('leads') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='leads') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='leads' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='leads' ) text-primary  @endif flaticon2-group"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='leads' ) text-primary @endif font-size-h6 mb-0">
                                                    Leads Management
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>

                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('myfranchise') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='myfranchise') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='techmyfranchisenical_requests' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='myfranchise' ) text-primary  @endif flaticon-list"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='myfranchise' ) text-primary @endif font-size-h6 mb-0">
                                                    My Franchise
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>

                                    <li class="menu-item menu-item-submenu @if(request()->segment(1)== 'dashboard' && request()->segment(2)== 'units')) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class=" menu-toggle text-muted text-hover-primary font-weight-bold side-link">
                                            <div class="list-item hoverable p-2 p-lg-3 mb-2 @if(request()->segment(1)== 'dashboard' && (request()->segment(2) == 'users')) active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label  ">
                                                        <span class="svg-icon svg-icon-xl  ">
                                                          <i style="font-size: 1.7rem"  class=" @if(request()->segment(1)=='dashboard' ) text-primary  @endif icon-xl flaticon-list-1"></i>                                             <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="text-muted font-size-h6 mb-0">
                                                        My Units
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">

                                                <li class="menu-item @if(request()->segment(2) == 'units' &&  request()->segment(3) == '' ) menu-item-active @endif" aria-haspopup="true">
                                                    <a href="{{ route('units') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot @if(request()->segment(2) == 'units')  active @endif">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Overview</span>
                                                    </a>
                                                </li>

                                                <?php $units = \App\Models\User::where('franchisor_id' , auth()->user()->id)->get(); ?>

                                             @foreach($units as $unit)
                                                    <li class="menu-item @if(request()->segment(2) == 'units' &&  request()->segment(3) == $unit['id'] ) menu-item-active @endif" aria-haspopup="true">
                                                        <a href="{{ route('units.show' , $unit['id']) }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot ">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">{{ $unit['name'] }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </li>

                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('tasks') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='tasks') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='tasks' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='tasks' ) text-primary  @endif flaticon2-document"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='tasks' ) text-primary @endif font-size-h6 mb-0">
                                                    Tasks Management
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>

                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('performance') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='performance') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='performance' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='performance' ) text-primary  @endif flaticon-arrows"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='performance' ) text-primary @endif font-size-h6 mb-0">
                                                    Performance
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>

                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('royalty') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='royalty') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='royalty' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='royalty' ) text-primary  @endif flaticon-coins"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='royalty' ) text-primary @endif font-size-h6 mb-0">
                                                    Royalty Management
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>


                                    <li class="menu-item" aria-haspopup="true">
                                        <a  href="{{ route('technical_requests') }}" class="text-muted  text-hover-primary font-weight-bold side-link">
                                            <div @if(request()->segment(2)=='technical_requests') style="background: #fff; border-radius: 10px" @endif  class="list-item hoverable p-2 p-lg-3 mb-1 mt-2 @if(request()->segment(1)=='') active @endif ">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class=" symbol-40 symbol-light mr-7">
                                                    <span class="symbol-label ">
                                                        <span class="svg-icon svg-icon-xl  @if(request()->segment(2)=='technical_requests' ) svg-icon-success @endif">
                                                            <i style="font-size: 1.7rem" class=" @if(request()->segment(2)=='technical_requests' ) text-primary  @endif flaticon-list"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                    <span class="@if(request()->segment(2)=='technical_requests' ) text-primary @endif font-size-h6 mb-0">
                                                    Technical Requests
                                                    </span>

                                                    </div>
                                                    <!--begin::End-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </a>

                                    </li>


                                @endif




                            </ul>
                            <!--end::Menu Nav-->
                        </div>
                        <!--end::Menu Container-->
                    </div>
                    <!--end::Aside Menu-->
                </div>

                <!--end::Tab Pane-->

            </div>
            <!--end::Tab Content-->
        </div>
        <!--end::Workspace-->

        <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-4 py-lg-10">
            <!--begin::Aside Toggle-->
            <span class="aside-toggle btn btn-icon btn-primary btn-hover-primary shadow-sm" id="kt_aside_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Toggle Aside">
                <i class="ki ki-bold-arrow-back icon-sm"></i>
            </span>
        </div>

    </div>
    <!--end::Secondary-->
</div>

