@extends('layouts.master')

@section('styles')

    <style>
        .table.table-head-custom thead tr, .table.table-head-custom thead th{

            white-space: nowrap;
        }
    </style>

@endsection
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h2 style="color: #3a384e"  class="d-flex align-items-center font-weight-bolder my-1 mr-3">Royalty Managment</h2>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Button-->
            @include('layouts.profile_button')

                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Advance Table Widget 1-->
            <div class="h3 text-center">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <span class="text-danger" role="alert">
                        <strong style="font-size: 13px; font-weight: 400;">{{ $error }}</strong><br>
                    </span>
                    @endforeach
                @endif
                @include('flash::message')
            </div>
            <br>

            <div class="col-xxl-12">
                <div class="gutter-b">

                    <div class="card-body p-0 position-relative overflow-hidden">
                        <!--begin::Chart-->
                        <div id="" class="" style="height: 100px"></div>
                        <!--end::Chart-->
                        <!--begin::Stats-->
                        <div class="mt-n25">
                            <!--begin::Row-->
                            <div class="row m-0">

                                <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                    <a href="" class="text-dark font-weight-bolder font-size-h2">
                                        $1,200 Royalty Collected till date</a>
                                </div>


                                    <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                        <a href="" class="text-dark font-weight-bolder font-size-h2">
                                              12 Upcoming royalties</a>
                                    </div>





                            </div>
                        </div>

                        <!--end::Stats-->
                    </div>

                </div>
            </div>
            <div class="card card-custom gutter-b">
                <!--begin::Header-->

                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Royalties</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                    </h3>
                    <div class="card-toolbar">

                        <a href="#" class="btn btn-success font-weight-bolder font-size-sm mr-2" data-toggle="modal" data-target="#add_item" >
                            <span class="svg-icon svg-icon-md svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                <i class="flaticon2-add-1  text-white"></i>
                                <!--end::Svg Icon-->
                            </span>Add New
                        </a>


                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>

                                    <li class="navi-item">
                                        <a href="#" id="csv" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" id="pdf" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-pdf-o"></i>
                                            </span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                    </div>
                </div>



                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->

                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" data-table="order-table" class="form-control light-table-filter" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center order-table kt_datatable" id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th style="min-width: 150px">Billing Period</th>
                                <th style="min-width: 150px">Franchisee Name</th>
                                <th style="min-width: 150px">Store Location</th>
                                <th style="min-width: 150px">Due Date</th>
                                <th style="min-width: 150px">Gross Sales</th>
                                <th style="min-width: 150px">Royalty %</th>
                                <th style="min-width: 150px">Amount</th>
                                <th style="min-width: 250px"></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>

                                <td >
                                    <span class="text-muted  font-weight-bold">Q4 2024 </span>
                                </td>

                                <td >
                                    <span class="text-muted  font-weight-bold">John Doe</span>
                                </td>
                                <td >
                                    <span class="text-muted  font-weight-bold">King Fahd Roday, Riyadh</span>
                                </td>

                                <td >
                                    <span class="text-muted  font-weight-bold">10/01/2025</span>
                                </td>


                                <td >
                                    <span class="text-muted  font-weight-bold">$3210</span>
                                </td>
                                <td >
                                    <span class="text-muted  font-weight-bold">10</span>
                                </td>



                                <td >
                                    <span class="text-muted  font-weight-bold">$21</span>
                                </td>


                                <td>

                                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-2" >
                             Mark as complete
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td >
                                    <span class="text-muted  font-weight-bold">Q3 2024 </span>
                                </td>

                                <td >
                                    <span class="text-muted  font-weight-bold">John Doe</span>
                                </td>
                                <td >
                                    <span class="text-muted  font-weight-bold">Tahlil Street Jeddah</span>
                                </td>

                                <td >
                                    <span class="text-muted  font-weight-bold">11/10/2024</span>
                                </td>

                                <td >
                                    <span class="text-muted  font-weight-bold">$5510</span>
                                </td>

                                <td >
                                    <span class="text-muted  font-weight-bold">10</span>
                                </td>



                                <td >
                                    <span class="text-muted  font-weight-bold">$21</span>
                                </td>

                                <td>

                                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-2" >
                                        Mark as complete
                                    </a>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 1-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->



@endsection

@section('scripts')


@endsection