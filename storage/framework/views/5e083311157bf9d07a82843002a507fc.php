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
                    <h2 style="color: #3a384e"  class="d-flex align-items-center font-weight-bolder my-1 mr-3">Sales Associates</h2>
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
                <?php echo $__env->make('flash::message', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <br>

            <div class="card card-custom gutter-b">
                <!--begin::Header-->

                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Users</span>
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
                                <th style="min-width: 150px">ID</th>
                                <th style="min-width: 150px">First Name</th>
                                <th style="min-width: 150px">Last Name</th>
                                <th style="min-width: 150px">Email Address</th>
                                <th style="min-width: 150px">Contact Number</th>
                                <th style="min-width: 150px">Country</th>
                                <th style="min-width: 150px">Province</th>
                                <th style="min-width: 150px">City</th>
                                <th style="min-width: 150px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <span class="text-muted font-weight-bold">A<?php echo e($row->id); ?></span>
                                </td>

                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->first_name); ?></span>
                                </td>

                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->last_name); ?></span>
                                </td>

                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->email); ?></span>
                                </td>

                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->contact_number); ?></span>
                                </td>

                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->country); ?></span>
                                </td>
                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->province); ?></span>
                                </td>

                                <td>
                                    <span class="text-muted font-weight-bold"><?php echo e($row->city); ?></span>
                                </td>


                                <td>

                                    <a href="#" data-toggle="modal" data-target="#edit_item-<?php echo e($row->id); ?>"  class="btn btn-icon btn-light btn-hover-primary btn-sm">
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

                                    <a href="#" data-toggle="modal" data-target="#delete_record_modal" data-action="<?php echo e(route('associate.delete' , $row->id ?? $row->id)); ?>" data-id="<?php echo e($row->id); ?>" class="open_delete_modal btn btn-icon btn-light btn-hover-primary btn-sm">
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center text-muted">No associates found.</td>
                                </tr>
                            <?php endif; ?>
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

    <div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!--begin::Form-->
                    <form class="form" method="POST" action="<?php echo e(route('associate.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                            <div  class="row form-group">

                                <input style="text-transform: capitalize" hidden type="text" class="form-control  " name="id" value="0">


                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">First Name</label>
                                    <input required   type="text" class="form-control  " name="first_name" value="">
                                </div>

                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">Last Name</label>
                                    <input required   type="text" class="form-control  " name="last_name" value="">
                                </div>


                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">Email</label>
                                    <input required type="email" class="form-control  " name="email" value="">
                                </div>

                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">Contact Number</label>
                                    <input required  type="text" class="form-control  " name="contact_number" value="">
                                </div>

                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">Country</label>
                                    <select name="country" class="form-control">
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                        <option>Andorra</option>
                                        <option>Angola</option>
                                        <option>Antigua and Barbuda</option>
                                        <option>Argentina</option>
                                        <option>Armenia</option>
                                        <option>Australia</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                        <option>Belarus</option>
                                        <option>Belgium</option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bhutan</option>
                                        <option>Bolivia</option>
                                        <option>Bosnia and Herzegovina</option>
                                        <option>Botswana</option>
                                        <option>Brazil</option>
                                        <option>Brunei</option>
                                        <option>Bulgaria</option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi</option>
                                        <option>Cabo Verde</option>
                                        <option>Cambodia</option>
                                        <option>Cameroon</option>
                                        <option>Canada</option>
                                        <option>Central African Republic</option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>Colombia</option>
                                        <option>Comoros</option>
                                        <option>Congo (Congo-Brazzaville)</option>
                                        <option>Costa Rica</option>
                                        <option>Croatia</option>
                                        <option>Cuba</option>
                                        <option>Cyprus</option>
                                        <option>Czechia (Czech Republic)</option>
                                        <option>Democratic Republic of the Congo</option>
                                        <option>Denmark</option>
                                        <option>Djibouti</option>
                                        <option>Dominica</option>
                                        <option>Dominican Republic</option>
                                        <option>Ecuador</option>
                                        <option>Egypt</option>
                                        <option>El Salvador</option>
                                        <option>Equatorial Guinea</option>
                                        <option>Eritrea</option>
                                        <option>Estonia</option>
                                        <option>Eswatini (fmr. "Swaziland")</option>
                                        <option>Ethiopia</option>
                                        <option>Fiji</option>
                                        <option>Finland</option>
                                        <option>France</option>
                                        <option>Gabon</option>
                                        <option>Gambia</option>
                                        <option>Georgia</option>
                                        <option>Germany</option>
                                        <option>Ghana</option>
                                        <option>Greece</option>
                                        <option>Grenada</option>
                                        <option>Guatemala</option>
                                        <option>Guinea</option>
                                        <option>Guinea-Bissau</option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Honduras</option>
                                        <option>Hungary</option>
                                        <option>Iceland</option>
                                        <option>India</option>
                                        <option>Indonesia</option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland</option>
                                        <option>Israel</option>
                                        <option>Italy</option>
                                        <option>Jamaica</option>
                                        <option>Japan</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan</option>
                                        <option>Kenya</option>
                                        <option>Kiribati</option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan</option>
                                        <option>Laos</option>
                                        <option>Latvia</option>
                                        <option>Lebanon</option>
                                        <option>Lesotho</option>
                                        <option>Liberia</option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania</option>
                                        <option>Luxembourg</option>
                                        <option>Madagascar</option>
                                        <option>Malawi</option>
                                        <option>Malaysia</option>
                                        <option>Maldives</option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands</option>
                                        <option>Mauritania</option>
                                        <option>Mauritius</option>
                                        <option>Mexico</option>
                                        <option>Micronesia</option>
                                        <option>Moldova</option>
                                        <option>Monaco</option>
                                        <option>Mongolia</option>
                                        <option>Montenegro</option>
                                        <option>Morocco</option>
                                        <option>Mozambique</option>
                                        <option>Myanmar (formerly Burma)</option>
                                        <option>Namibia</option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands</option>
                                        <option>New Zealand</option>
                                        <option>Nicaragua</option>
                                        <option>Niger</option>
                                        <option>Nigeria</option>
                                        <option>North Korea</option>
                                        <option>North Macedonia</option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan</option>
                                        <option>Palau</option>
                                        <option>Palestine State</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea</option>
                                        <option>Paraguay</option>
                                        <option>Peru</option>
                                        <option>Philippines</option>
                                        <option>Poland</option>
                                        <option>Portugal</option>
                                        <option>Qatar</option>
                                        <option>Romania</option>
                                        <option>Russia</option>
                                        <option>Rwanda</option>
                                        <option>Saint Kitts and Nevis</option>
                                        <option>Saint Lucia</option>
                                        <option>Saint Vincent and the Grenadines</option>
                                        <option>Samoa</option>
                                        <option>San Marino</option>
                                        <option>Sao Tome and Principe</option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal</option>
                                        <option>Serbia</option>
                                        <option>Seychelles</option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore</option>
                                        <option>Slovakia</option>
                                        <option>Slovenia</option>
                                        <option>Solomon Islands</option>
                                        <option>Somalia</option>
                                        <option>South Africa</option>
                                        <option>South Korea</option>
                                        <option>South Sudan</option>
                                        <option>Spain</option>
                                        <option>Sri Lanka</option>
                                        <option>Sudan</option>
                                        <option>Suriname</option>
                                        <option>Sweden</option>
                                        <option>Switzerland</option>
                                        <option>Syria</option>
                                        <option>Taiwan</option>
                                        <option>Tajikistan</option>
                                        <option>Tanzania</option>
                                        <option>Thailand</option>
                                        <option>Timor-Leste</option>
                                        <option>Togo</option>
                                        <option>Tonga</option>
                                        <option>Trinidad and Tobago</option>
                                        <option>Tunisia</option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan</option>
                                        <option>Tuvalu</option>
                                        <option>Uganda</option>
                                        <option>Ukraine</option>
                                        <option>United Arab Emirates</option>
                                        <option>United Kingdom</option>
                                        <option>United States of America</option>
                                        <option>Uruguay</option>
                                        <option>Uzbekistan</option>
                                        <option>Vanuatu</option>
                                        <option>Vatican City</option>
                                        <option>Venezuela</option>
                                        <option>Vietnam</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">Province</label>
                                    <input   type="text" class="form-control  " name="province" value="">
                                </div>

                                <div class="col-12 col-md-12">
                                    <br>
                                    <label  class=" form-control-label">City</label>
                                    <input   type="text" class="form-control  " name="city" value="">
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
        <div class="modal fade" id="edit_item-<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Associate </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Form-->
                        <form class="form" method="POST" action="<?php echo e(route('associate.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">

                                <div  class="row form-group">

                                    <input style="text-transform: capitalize" hidden type="text" class="form-control" name="id" value="<?php echo e($row->id); ?>">


                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">First Name</label>
                                        <input required type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name', $row->first_name)); ?>">
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">Last Name</label>
                                        <input required type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name', $row->last_name)); ?>">
                                    </div>


                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">Email</label>
                                        <input required type="email" class="form-control" name="email" value="<?php echo e(old('email', $row->email)); ?>">
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">Contact Number</label>
                                        <input required type="text" class="form-control" name="contact_number" value="<?php echo e(old('contact_number', $row->contact_number)); ?>">
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">Country</label>
                                        <select name="country" class="form-control country-select" data-current="<?php echo e(old('country', $row->country)); ?>">
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                            <option>Andorra</option>
                                            <option>Angola</option>
                                            <option>Antigua and Barbuda</option>
                                            <option>Argentina</option>
                                            <option>Armenia</option>
                                            <option>Australia</option>
                                            <option>Austria</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                            <option>Belarus</option>
                                            <option>Belgium</option>
                                            <option>Belize</option>
                                            <option>Benin</option>
                                            <option>Bhutan</option>
                                            <option>Bolivia</option>
                                            <option>Bosnia and Herzegovina</option>
                                            <option>Botswana</option>
                                            <option>Brazil</option>
                                            <option>Brunei</option>
                                            <option>Bulgaria</option>
                                            <option>Burkina Faso</option>
                                            <option>Burundi</option>
                                            <option>Cabo Verde</option>
                                            <option>Cambodia</option>
                                            <option>Cameroon</option>
                                            <option>Canada</option>
                                            <option>Central African Republic</option>
                                            <option>Chad</option>
                                            <option>Chile</option>
                                            <option>China</option>
                                            <option>Colombia</option>
                                            <option>Comoros</option>
                                            <option>Congo (Congo-Brazzaville)</option>
                                            <option>Costa Rica</option>
                                            <option>Croatia</option>
                                            <option>Cuba</option>
                                            <option>Cyprus</option>
                                            <option>Czechia (Czech Republic)</option>
                                            <option>Democratic Republic of the Congo</option>
                                            <option>Denmark</option>
                                            <option>Djibouti</option>
                                            <option>Dominica</option>
                                            <option>Dominican Republic</option>
                                            <option>Ecuador</option>
                                            <option>Egypt</option>
                                            <option>El Salvador</option>
                                            <option>Equatorial Guinea</option>
                                            <option>Eritrea</option>
                                            <option>Estonia</option>
                                            <option>Eswatini (fmr. "Swaziland")</option>
                                            <option>Ethiopia</option>
                                            <option>Fiji</option>
                                            <option>Finland</option>
                                            <option>France</option>
                                            <option>Gabon</option>
                                            <option>Gambia</option>
                                            <option>Georgia</option>
                                            <option>Germany</option>
                                            <option>Ghana</option>
                                            <option>Greece</option>
                                            <option>Grenada</option>
                                            <option>Guatemala</option>
                                            <option>Guinea</option>
                                            <option>Guinea-Bissau</option>
                                            <option>Guyana</option>
                                            <option>Haiti</option>
                                            <option>Honduras</option>
                                            <option>Hungary</option>
                                            <option>Iceland</option>
                                            <option>India</option>
                                            <option>Indonesia</option>
                                            <option>Iran</option>
                                            <option>Iraq</option>
                                            <option>Ireland</option>
                                            <option>Israel</option>
                                            <option>Italy</option>
                                            <option>Jamaica</option>
                                            <option>Japan</option>
                                            <option>Jordan</option>
                                            <option>Kazakhstan</option>
                                            <option>Kenya</option>
                                            <option>Kiribati</option>
                                            <option>Kuwait</option>
                                            <option>Kyrgyzstan</option>
                                            <option>Laos</option>
                                            <option>Latvia</option>
                                            <option>Lebanon</option>
                                            <option>Lesotho</option>
                                            <option>Liberia</option>
                                            <option>Libya</option>
                                            <option>Liechtenstein</option>
                                            <option>Lithuania</option>
                                            <option>Luxembourg</option>
                                            <option>Madagascar</option>
                                            <option>Malawi</option>
                                            <option>Malaysia</option>
                                            <option>Maldives</option>
                                            <option>Mali</option>
                                            <option>Malta</option>
                                            <option>Marshall Islands</option>
                                            <option>Mauritania</option>
                                            <option>Mauritius</option>
                                            <option>Mexico</option>
                                            <option>Micronesia</option>
                                            <option>Moldova</option>
                                            <option>Monaco</option>
                                            <option>Mongolia</option>
                                            <option>Montenegro</option>
                                            <option>Morocco</option>
                                            <option>Mozambique</option>
                                            <option>Myanmar (formerly Burma)</option>
                                            <option>Namibia</option>
                                            <option>Nauru</option>
                                            <option>Nepal</option>
                                            <option>Netherlands</option>
                                            <option>New Zealand</option>
                                            <option>Nicaragua</option>
                                            <option>Niger</option>
                                            <option>Nigeria</option>
                                            <option>North Korea</option>
                                            <option>North Macedonia</option>
                                            <option>Norway</option>
                                            <option>Oman</option>
                                            <option>Pakistan</option>
                                            <option>Palau</option>
                                            <option>Palestine State</option>
                                            <option>Panama</option>
                                            <option>Papua New Guinea</option>
                                            <option>Paraguay</option>
                                            <option>Peru</option>
                                            <option>Philippines</option>
                                            <option>Poland</option>
                                            <option>Portugal</option>
                                            <option>Qatar</option>
                                            <option>Romania</option>
                                            <option>Russia</option>
                                            <option>Rwanda</option>
                                            <option>Saint Kitts and Nevis</option>
                                            <option>Saint Lucia</option>
                                            <option>Saint Vincent and the Grenadines</option>
                                            <option>Samoa</option>
                                            <option>San Marino</option>
                                            <option>Sao Tome and Principe</option>
                                            <option>Saudi Arabia</option>
                                            <option>Senegal</option>
                                            <option>Serbia</option>
                                            <option>Seychelles</option>
                                            <option>Sierra Leone</option>
                                            <option>Singapore</option>
                                            <option>Slovakia</option>
                                            <option>Slovenia</option>
                                            <option>Solomon Islands</option>
                                            <option>Somalia</option>
                                            <option>South Africa</option>
                                            <option>South Korea</option>
                                            <option>South Sudan</option>
                                            <option>Spain</option>
                                            <option>Sri Lanka</option>
                                            <option>Sudan</option>
                                            <option>Suriname</option>
                                            <option>Sweden</option>
                                            <option>Switzerland</option>
                                            <option>Syria</option>
                                            <option>Taiwan</option>
                                            <option>Tajikistan</option>
                                            <option>Tanzania</option>
                                            <option>Thailand</option>
                                            <option>Timor-Leste</option>
                                            <option>Togo</option>
                                            <option>Tonga</option>
                                            <option>Trinidad and Tobago</option>
                                            <option>Tunisia</option>
                                            <option>Turkey</option>
                                            <option>Turkmenistan</option>
                                            <option>Tuvalu</option>
                                            <option>Uganda</option>
                                            <option>Ukraine</option>
                                            <option>United Arab Emirates</option>
                                            <option>United Kingdom</option>
                                            <option>United States of America</option>
                                            <option>Uruguay</option>
                                            <option>Uzbekistan</option>
                                            <option>Vanuatu</option>
                                            <option>Vatican City</option>
                                            <option>Venezuela</option>
                                            <option>Vietnam</option>
                                            <option>Yemen</option>
                                            <option>Zambia</option>
                                            <option>Zimbabwe</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">Province</label>
                                        <input type="text" class="form-control" name="province" value="<?php echo e(old('province', $row->province)); ?>">
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <br>
                                        <label  class=" form-control-label">City</label>
                                        <input type="text" class="form-control" name="city" value="<?php echo e(old('city', $row->city)); ?>">
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
    // Set country select in edit modal to the current value when it's shown
    $(document).on('show.bs.modal', '[id^="edit_item-"]', function () {
        var modal = $(this);
        var sel = modal.find('.country-select');
        var current = sel.data('current');
        if (current) {
            sel.val(current);
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/afifi/franshiseManagement/resources/views/dashboard/associates.blade.php ENDPATH**/ ?>