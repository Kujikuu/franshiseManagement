<?php $__env->startSection('styles'); ?>

    <style>
        .table.table-head-custom thead tr, .table.table-head-custom thead th{

            white-space: nowrap;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!--begin::Subheader-->
    <div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h2 style="color: #3a384e"  class="d-flex align-items-center font-weight-bolder my-1 mr-3">Months</h2>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Button-->
            <?php echo $__env->make('layouts.profile_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="text-danger" role="alert">
                        <strong style="font-size: 13px; font-weight: 400;"><?php echo e($error); ?></strong><br>
                    </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <br>
            <div class="card card-custom gutter-b">
                <!--begin::Header-->

                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Months</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                    </h3>
                    <div class="card-toolbar">
                        
                            
                                
                                
                                
                            
                        



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
                                <th style="min-width: 150px">Name</th>
                                <th style="min-width: 300px">Cities</th>
                                <th class="" style="min-width: 150px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td >
                                    <span class="text-muted  font-weight-bold"><?php echo e($row['name']); ?>  </span>
                                </td>

                                <td >
                                    <?php $__currentLoopData = $row->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="label label-lg label-primary label-inline mb-1"> <?php echo e(isset($city->name) ? $city->name . ', '  . $city->country: null); ?> </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit_item-<?php echo e($row['id']); ?>"  class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>

                                    
                                        
                                                
                                                
                                                    
                                                        
                                                        
                                                        
                                                    
                                                
                                            
                                            
                                    
                                </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 1-->
            <?php echo e($data->links("pagination::bootstrap-4")); ?>


        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

    <div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add New  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begin::Form-->
                    <form class="form" method="POST" action="<?php echo e(route('month.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="text"  hidden class="form-control" name="id" value="0" />

                        <div class="card-body">
                            <!--begin: Code-->
                            <!--end: Code-->
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right">Name:</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="name">
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </div>
                            </div>


                            <div class="separator separator-dashed my-8"></div>

                            <div id="kt_repeater_1">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label text-right">Cities:</label>

                                    <div class="row targetDiv col-lg-10" id="div0">
                                        <div class="col-md-12">
                                            <div id="group1" class="fvrduplicate-qch">
                                                <div class="row entry-qch">
                                                    <select class="form-control" name="cities[]">
                                                        <option selected disabled >Please Select</option>
                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option  value="<?php echo e($city['id']); ?>"><?php echo e($city['name']  . ', ' . $city['country']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <button type="button" class="mt-2 form-control btn btn-sm font-weight-bolder btn-light-primary btn-add-qch">
                                                                <i class="la la-plus"></i>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>

        </div>
    </div>

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="edit_item-<?php echo e($row['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Form-->

                        <form class="form" method="POST" action="<?php echo e(route('month.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <input type="text"  hidden class="form-control" name="id" value="<?php echo e($row['id']); ?>" />

                            <div class="card-body">
                            <!--begin: Code-->
                            <!--end: Code-->
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right">Name:</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="name">
                                        <option <?php if($row['name'] == 'January'): ?> selected <?php endif; ?>>January</option>
                                        <option <?php if($row['name'] == 'February'): ?> selected <?php endif; ?>>February</option>
                                        <option <?php if($row['name'] == 'March'): ?> selected <?php endif; ?>>March</option>
                                        <option <?php if($row['name'] == 'April'): ?> selected <?php endif; ?>>April</option>
                                        <option <?php if($row['name'] == 'May'): ?> selected <?php endif; ?>>May</option>
                                        <option <?php if($row['name'] == 'June'): ?> selected <?php endif; ?>>June</option>
                                        <option <?php if($row['name'] == 'July'): ?> selected <?php endif; ?>>July</option>
                                        <option <?php if($row['name'] == 'August'): ?> selected <?php endif; ?>>August</option>
                                        <option <?php if($row['name'] == 'September'): ?> selected <?php endif; ?>>September</option>
                                        <option <?php if($row['name'] == 'October'): ?> selected <?php endif; ?>>October</option>
                                        <option <?php if($row['name'] == 'November'): ?> selected <?php endif; ?>>November</option>
                                        <option <?php if($row['name'] == 'December'): ?> selected <?php endif; ?>>December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-8"></div>

                                <div id="kt_repeater_1">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-right">Cities:</label>

                                        <div class="row targetDiv col-lg-10" id="div0">
                                            <div class="col-md-12">
                                                <div id="group1" class="fvrduplicate-qch">

                                                    <?php if(count($row->cities) > 0): ?>
                                                        <?php $__currentLoopData = $row->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $month_city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="row entry-qch">
                                                                <select class="form-control" name="cities[]">
                                                                    <option selected disabled >Please Select</option>
                                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option <?php if($month_city['id'] == $city['id']): ?> selected  <?php endif; ?> value="<?php echo e($city['id']); ?>"><?php echo e($city['name']  . ', ' . $city['country']); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <div class="">
                                                                    <div class="form-group">
                                                                        <?php if($key == count($row->cities ) - 1): ?>
                                                                            <button type="button" class="mt-2 form-control btn btn-sm font-weight-bolder btn-light-primary btn-add-qch">
                                                                                <i class="la la-plus"></i>Add
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button type="button" class="mt-2 form-control btn btn-sm font-weight-bolder btn-light-danger btn-remove-qch">
                                                                                <i class="la la-trash-o"></i>
                                                                            </button>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <div class="row entry-qch">
                                                            <select class="form-control" name="cities[]">
                                                                <option selected disabled >Please Select</option>
                                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($city['id']); ?>"><?php echo e($city['name']  . ', ' . $city['country']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <button type="button" class="mt-2 form-control btn btn-sm font-weight-bolder btn-light-primary btn-add-qch">
                                                                        <i class="la la-plus"></i>Add
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>



                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script>
        $('.kt_repeater_1').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo',
                'select': 'foo'
            },

            show: function () {
                $(this).slideToggle();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });



        $(document).on('click', '.btn-add-qch', function(e) {
            e.preventDefault();
            var controlForm = $(this).closest('.fvrduplicate-qch'),
                currentEntry = $(this).parents('.entry-qch:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                newEntry.find('textarea').val('');

                controlForm.find('.entry-qch:not(:last) .btn-add-qch')
                    .removeClass('btn-add-qch').addClass('btn-remove-qch')
                .removeClass('btn-success').addClass('btn-light-danger')

                .html(' <i class="la la-trash-o"></i>');
        }).on('click', '.btn-remove-qch', function(e) {
            $(this).closest('.entry-qch').remove();
            return false;
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel pros\travelAPI\resources\views/dashboard/months.blade.php ENDPATH**/ ?>