<?php $__env->startSection('styles'); ?>
    <style>

        .datatable-head  .datatable-cell span{

            text-transform: uppercase;
            color: #B5B5C3 !important;
        }

        .datatable.datatable-default > .datatable-table > .datatable-head .datatable-row >
        .datatable-cell.datatable-cell-sort, .datatable.datatable-default > .datatable-table >
        .datatable-body .datatable-row > .datatable-cell.datatable-cell-sort, .datatable.datatable-default >
        .datatable-table > .datatable-foot .datatable-row > .datatable-cell.datatable-cell-sort
        {

            white-space: nowrap;
        }
        .datatable.datatable-default > .datatable-table{

            overflow-x: scroll;

        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--begin::Subheader-->
    <div class="container subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h2 style="color: #3a384e" class="d-flex align-items-center  font-weight-bolder my-1 mr-3">
                        Manage Tasks</h2>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Button-->

            <?php echo $__env->make('layouts.profile_button', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="container">
        <div class="h3 text-center">

            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="text-danger" role="alert">
                        <strong style="font-size: 13px; font-weight: 400;"><?php echo e($error); ?></strong><br>
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php echo $__env->make('flash::message', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <br>
        <div class="row ">


            <div class="col-xl-12 mt-5">
                <div class="col-xxl-12">
                    <div class="gutter-b">
                        <!--begin::Header-->
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header card-header-tabs-line">
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                                        <li class="nav-item mr-3">
                                            <a class="nav-link active" data-toggle="tab" href="#kt_apps_projects_view_tab_2">
						<span class="nav-icon mr-2"><span class="svg-icon mr-3"><!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Communication/Chat-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Communication / Chat-check</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"></path>
    </g>
</svg><!--end::Svg Icon--></span></span>
                                                <span class="nav-text font-weight-bold">Franchisee</span>
                                            </a>
                                        </li>

                                        <li class="nav-item mr-3">
                                            <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_3">
						<span class="nav-icon mr-2"><span class="svg-icon mr-3"><!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Devices/Display1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Devices / Display1</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3"></path>
        <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000"></path>
    </g>
</svg><!--end::Svg Icon--></span></span>
                                                <span class="nav-text font-weight-bold">Sales</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="tab-content pt-5">
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
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
                                                                4 Total </a>
                                                        </div>


                                                        <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                                            <a href="" class="text-dark font-weight-bolder font-size-h2">
                                                                02 Completed </a>
                                                        </div>

                                                        <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                                            <a href="" class="text-dark font-weight-bolder font-size-h2">
                                                                02 In progress </a>
                                                        </div>


                                                        <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                                            <a href="" class="text-dark font-weight-bolder font-size-h2">
                                                                02 Due </a>
                                                        </div>


                                                    </div>
                                                </div>

                                                <!--end::Stats-->
                                            </div>

                                        </div>

                                        <div class="card-custom gutter-b">
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
                                                            <th style="min-width: 150px">ID</th>
                                                            <th style="min-width: 150px">Task info</th>
                                                            <th style="min-width: 150px">Assigned To</th>
                                                            <th style="min-width: 150px">Start Date</th>
                                                            <th style="min-width: 150px">Due Date</th>
                                                            <th style="min-width: 150px">Priority</th>
                                                            <th style="min-width: 150px">Status</th>
                                                            <th class="" style="min-width: 150px">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T01 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Franchisee 1</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-danger  label-inline"> High </span>

                                                            </td>


                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T02 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Franchisee 2</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-danger  label-inline"> High </span>  </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T03 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Franchisee 3</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-primary  label-inline"> Low </span>  </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T04 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Franchisee 4 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-primary  label-inline"> Low </span>  </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>
                                    <!--end::Tab Content-->
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
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
                                                                06 Total </a>
                                                        </div>


                                                        <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                                            <a href="" class="text-dark font-weight-bolder font-size-h2">
                                                                03 Completed </a>
                                                        </div>

                                                        <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                                            <a href="" class="text-dark font-weight-bolder font-size-h2">
                                                                02 In progress </a>
                                                        </div>


                                                        <div class="text-center col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-dark d-block my-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                <i class="icon-3x text-dark-50 flaticon-statistics"></i>                                                <!--end::Svg Icon-->
                                            </span>
                                                            <a href="" class="text-dark font-weight-bolder font-size-h2">
                                                                02 Due </a>
                                                        </div>


                                                    </div>
                                                </div>

                                                <!--end::Stats-->
                                            </div>

                                        </div>

                                        <div class="card-custom gutter-b">
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
                                                            <th style="min-width: 150px">ID</th>
                                                            <th style="min-width: 150px">Task info</th>
                                                            <th style="min-width: 150px">Assigned To</th>
                                                            <th style="min-width: 150px">Start Date</th>
                                                            <th style="min-width: 150px">Due Date</th>
                                                            <th style="min-width: 150px">Priority</th>
                                                            <th style="min-width: 150px">Status</th>
                                                            <th class="" style="min-width: 150px">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T01 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">SalesPerson 1</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-danger  label-inline"> High </span>

                                                            </td>


                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T02 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">SalesPerson 2</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-danger  label-inline"> High </span>  </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T03 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">SalesPerson 3</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-primary  label-inline"> Low </span>  </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">T04 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold">Task description and information</span>
                                                            </td>
                                                            <td >
                                                                <span class="text-muted  font-weight-bold">SalesPerson 4 </span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/10/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> 04/11/2024</span>
                                                            </td>

                                                            <td >
                                                                <span class="label label-lg label-light-primary  label-inline"> Low </span>  </td>

                                                            <td >
                                                                <span class="text-muted  font-weight-bold"> In progress</span>
                                                            </td>


                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="" data-id="1" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                                </g>
                                                                            </svg>
                                                                        <!--end::Svg Icon-->
                                                                        </span>
                                                                </a >
                                                            </td>

                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Body-->
                                        </div>

                                    </div>





                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>

                </div>
            </div>




        </div>
    </div>


    <!--end::Entry-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <!--begin::Page Vendors(used by this page)-->
    <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="//www.amcharts.com/lib/3/serial.js"></script>
    <script src="//www.amcharts.com/lib/3/radar.js"></script>
    <script src="//www.amcharts.com/lib/3/pie.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="//www.amcharts.com/lib/3/themes/light.js"></script>


    <script>


        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        // Class definition
        function generateBubbleData(baseval, count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                series.push([x, y, z]);
                baseval += 86400000;
                i++;
            }
            return series;
        }

        function generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = 'w' + (i + 1).toString();
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }


        var KTamChartsChartsDemo = function() {

                var _demo11 = function () {
                    const apexChart = "#chart_11";
                    var options = {
                        series: [44, 55, 41, 17, 15],
                        chart: {
                            width: 380,
                            type: 'donut',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [primary, success, warning, danger, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();
                }

                // Private functions
                var demo1 = function() {
                    var chart = AmCharts.makeChart("kt_amcharts_1", {
                        "rtl": KTUtil.isRTL(),
                        "type": "serial",
                        "theme": "light",
                        "dataProvider": [{
                            "country": "Abu Dhabi",
                            "visits": 2025
                        }, {
                            "country": "Dubai",
                            "visits": 1882
                        }, {
                            "country": "Sharjah",
                            "visits": 1809
                        }, {
                            "country": "Ajman",
                            "visits": 1322
                        }, {
                            "country": "Riyadh",
                            "visits": 1122
                        }, {
                            "country": "Mecca",
                            "visits": 1114
                        }, {
                            "country": "India",
                            "visits": 984
                        },],
                        "valueAxes": [{
                            "gridColor": "#FFFFFF",
                            "gridAlpha": 0.2,
                            "dashLength": 0
                        }],
                        "gridAboveGraphs": true,
                        "startDuration": 1,
                        "graphs": [{
                            "balloonText": "[[category]]: <b>[[value]]</b>",
                            "fillAlphas": 0.8,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "visits"
                        }],
                        "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                        },
                        "categoryField": "country",
                        "categoryAxis": {
                            "gridPosition": "start",
                            "gridAlpha": 0,
                            "tickPosition": "start",
                            "tickLength": 20
                        },
                        "export": {
                            "enabled": false
                        }

                    });
                }



                return {
                    // public functions
                    init: function() {
                        demo1();
                        _demo11();
                    }
                };
            }();

            jQuery(document).ready(function() {
                KTamChartsChartsDemo.init();
            });


    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/afifi/franshiseManagement/resources/views/dashboard/tasks.blade.php ENDPATH**/ ?>