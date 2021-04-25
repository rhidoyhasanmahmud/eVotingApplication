@extends('layouts.backend')

@section('title', 'Profile Update')

@section('content_header', 'Profile Update')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header"></div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="well col-md-12">
                            <div class="inline middle blue bigger-50" id='percentage'> Your profile is {{$count}}%
                                complete
                                <div class="progress-bar progress-bar-success" style="width:{{$count}}%"></div>
                            </div>
                            &nbsp; &nbsp; &nbsp;
                            <div style="width: 80%;" data-percent="{{$count}}%"
                                 class="inline middle no-margin progress progress-striped active pos-rel">
                                <div class="progress-bar progress-bar-success" style="width:{{$count}}%"></div>
                            </div>
                        </div>
                        <div id="edit-basic" class="tab-pane in active">
                            <form method="post" action="{{url('user-profile-update')}}" id="the-form"
                                  class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <h4 class="header blue bolder smaller">General Information</h4>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Name of Assessee
                                                <sup class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited" data-validation="required"
                                                       placeholder="Enter Full Name" required="required"
                                                       onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode==32))"
                                                       name="full_name" type="text"
                                                       value="{{$show->full_name}}"/>
                                            </div>
                                            @error('full_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-sm-3 control-label required">TIN ID<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited"
                                                       data-validation="required,length"
                                                       maxlength="12" data-validation-length="12"
                                                       placeholder="Enter etin number" required="required"
                                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                       type="text" name="tin_no" value="{{$show->tin_no}}"/>
                                            </div>
                                            @error('tin_no')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-sm-3 control-label required">e-Tin Certificate<sup
                                                    class="text-danger">*</sup></label>
                                            @if(!$show->e_tin_certificate)
                                                <div class="col-sm-8">
                                                    <input type="file" name="e_tin_certificate" id="e_tin_certificate"
                                                           class="form-control" accept="  .pdf, .doc, .docx"/>

                                                </div>
                                                @error('e_tin_certificate')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            @else
                                                <div id="divbtn">
                                                    &nbsp;<b> &nbsp; E-Tin Certificate already Available</b>
                                                    <input type="button" id="btn" class="btn btn-info btn-sm"
                                                           value="Replace">
                                                    <a class="btn btn-info btn-sm" target="_blank"
                                                       href="{{ url('storage/etin_certificate/'.$show->e_tin_certificate) }}">Preview</a>
                                                    <input type="hidden" name="etin_varify" value="2"/>
                                                </div>
                                                <div class="col-sm-8" id="Create" style="display:none">
                                                    <input type="file" name="e_tin_certificate"
                                                           id="e_tin_certificate" class="form-control"
                                                           accept=".pdf,.doc,.docx,"/>
                                                    <input type="hidden" name="etin_varify" value="1"/>
                                                </div>
                                                @error('e_tin_certificate')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">NID<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited" type="text"
                                                       required="required"
                                                       data-validation="required,length"
                                                       data-validation-length="10"
                                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                       maxlength="10" placeholder="Enter NID Number"
                                                       name="nid_no" value="{{$show->nid_no}}"/>
                                            </div>
                                            @error('nid_no')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date of Birth<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                {{--                                                        <div class="input-medium">--}}
                                                {{--                                                            <div class="input-group">--}}
                                                @if($show->dob)
                                                    <input name="dob" type="date" required="required"
                                                           value="{{$show->dob->format('Y-d-m')}}"/>
                                                @else
                                                    <input name="dob" type="date" required="required" value=""/>
                                                @endif
                                            </div>
                                            @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <select name="gender" required="required">
                                                    <option value="" selected>Select Gender</option>
                                                    @if(strtolower($show->gender) == '1')
                                                        <option value="1" selected>Male</option>
                                                        <option value="2">Female</option>
                                                    @elseif(strtolower($show->gender) == '2')
                                                        <option value="2" selected>Female</option>
                                                        <option value="1">Male</option>
                                                    @else
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                            @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="form-group" id="form1" runat="server">
                                            <label class="col-sm-3 control-label">Profile Picture</label>
                                            <div class="col-md-8">
                                                <input type="file" name="image" class="form-control" id="imgInp"
                                                       accept=".jpeg,.png,.jpg,.gif,.svg">
                                            </div>

                                            <label class="col-sm-3 control-label"> </label>
                                            <div class="col-md-8">
                                                @if($show->profile_pic)
                                                    <img class="img-rounded" id="blah"
                                                         src="{{asset('storage/user_image/'.$show->profile_pic)}}"
                                                         alt="Your Image"
                                                         width="80" height="80"/>
                                                @else
                                                    <img class="img-rounded" id="blah"
                                                         src="assets/UserImage/no-image.jpg"
                                                         alt="Your Image" width="80" height="80"/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Father Name
                                                <sup class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited" data-validation="required"
                                                       placeholder="Enter Father Name" required="required"
                                                       onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode==32))"
                                                       name="father_name" type="text"
                                                       value="{{$show->father_name}}"/>
                                            </div>
                                            @error('father_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Mother Name
                                                <sup class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited" data-validation="required"
                                                       placeholder="Enter Mother Name" required="required"
                                                       onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode==32))"
                                                       name="mother_name" type="text"
                                                       value="{{$show->mother_name}}"/>
                                            </div>
                                            @error('mother_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Husband/Spouse Name
                                                <sup class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited" data-validation="required"
                                                       placeholder="Enter Husband/Spouse Name" required="required"
                                                       onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode==32))"
                                                       name="spouse_name" type="text"
                                                       value="{{$show->spouse_name}}"/>
                                            </div>
                                            @error('spouse_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Husband/Spouse TIN No
                                                </label>
                                            <div class="col-sm-8">
                                                <input class="form-control limited" data-validation="required"
                                                       placeholder="Enter Husband/Spouse TIN No"
                                                       onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode==32))"
                                                       name="spouse_tin_no" type="text"
                                                       value="{{$show->spouse_tin_no}}"/>
                                            </div>
                                            @error('spouse_tin_no')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Freedom Fighter Quota
                                                <sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="is_freedom_fighter_quota"
                                                        id="is_freedom_fighter_quota"
                                                        required>
                                                    <option value="">Select</option>
                                                    @if($show->is_freedom_fighter_quota == 1)
                                                        <option value="1" selected>Yes</option>
                                                        <option value="0">No</option>
                                                    @elseif($show->is_freedom_fighter_quota == 0)
                                                        <option value="1">Yes</option>
                                                        <option value="0" selected>No</option>
                                                    @else
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Is Handicapped
                                                <sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="is_handicapped" id="is_handicapped"
                                                        required>
                                                    <option value="">Select</option>
                                                    @if($show->is_handicapped == 1)
                                                        <option value="1" selected>Yes</option>
                                                        <option value="0">No</option>
                                                    @elseif($show->is_handicapped == 0)
                                                        <option value="1">Yes</option>
                                                        <option value="0" selected>No</option>
                                                    @else
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <h4 class="header blue bolder smaller">Contact</h4>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Email</label>
                                            <div class="col-sm-9">
                                                <input class="col-xs-12 col-sm-12" type="text"
                                                       name="email" value="{{$show->email}}" readonly/>
                                            </div>
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Profession<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="profession"
                                                        id="profession"
                                                        required>
                                                    <option value="">Select Profession</option>
                                                    @if($show->profession == 1)
                                                        <option value="1" selected>Govt. Service</option>
                                                        <option value="2">Non-Govt Service</option>
                                                        <option value="3">Private Service</option>
                                                        <option value="4">Business</option>
                                                        <option value="5">Professional</option>
                                                        <option value="6">Other</option>
                                                    @elseif($show->profession == 2)
                                                        <option value="1">Govt. Service</option>
                                                        <option value="2" selected>Non-Govt Service</option>
                                                        <option value="3">Private Service</option>
                                                        <option value="4">Business</option>
                                                        <option value="5">Professional</option>
                                                        <option value="6">Other</option>
                                                    @elseif($show->profession == 3)
                                                        <option value="1">Govt. Service</option>
                                                        <option value="2">Non-Govt Service</option>
                                                        <option value="3" selected>Private Service</option>
                                                        <option value="4">Business</option>
                                                        <option value="5">Professional</option>
                                                        <option value="6">Other</option>
                                                    @elseif($show->profession == 4)
                                                        <option value="1">Govt. Service</option>
                                                        <option value="2">Non-Govt Service</option>
                                                        <option value="3">Private Service</option>
                                                        <option value="4" selected>Business</option>
                                                        <option value="5">Professional</option>
                                                        <option value="6">Other</option>
                                                    @elseif($show->profession == 5)
                                                        <option value="1">Govt. Service</option>
                                                        <option value="2">Non-Govt Service</option>
                                                        <option value="3">Private Service</option>
                                                        <option value="4">Business</option>
                                                        <option value="5" selected>Professional</option>
                                                        <option value="6">Other</option>
                                                    @elseif($show->profession == 6)
                                                        <option value="1">Govt. Service</option>
                                                        <option value="2">Non-Govt Service</option>
                                                        <option value="3">Private Service</option>
                                                        <option value="4">Business</option>
                                                        <option value="5">Professional</option>
                                                        <option value="6" selected>Other</option>
                                                    @else
                                                        <option value="1">Govt. Service</option>
                                                        <option value="2">Non-Govt Service</option>
                                                        <option value="3">Private Service</option>
                                                        <option value="4">Business</option>
                                                        <option value="5">Professional</option>
                                                        <option value="6">Other</option>
                                                    @endif
                                                </select>
                                            </div>
                                            @error('organization_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Organization Name
                                                <sup class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                    <textarea class="col-xs-12 col-sm-10 form-control limited" cols="6"
                                                              rows="2" maxlength="500" type="text" required="required"
                                                              id="organization_name" placeholder="Enter Organization Name"
                                                              name="organization_name">{{$show->organization_name}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Resident Status
                                                <sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="resident_status"
                                                        id="resident_status"
                                                        required>
                                                    <option value="">Select Resident Status</option>
                                                    @if($show->resident_status == 1)
                                                        <option value="1" selected>Resident</option>
                                                        <option value="2">Non Resident</option>
                                                    @elseif($show->resident_status == 2)
                                                        <option value="1">Resident</option>
                                                        <option value="2" selected>Non Resident</option>
                                                    @else
                                                        <option value="1">Resident</option>
                                                        <option value="2">Non Resident</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">City Corporation
                                                <sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="city_corporation_area"
                                                        id="city_corporation_area"
                                                        required>
                                                    <option value="">Select City Corporation</option>
                                                    @if($show->city_corporation_area == 1)
                                                        <option value="1" selected>Dhaka City Corporation
                                                        </option>
                                                        <option value="2">Other City Corporation</option>
                                                        <option value="3">Other without City Corporation</option>
                                                        <option value="4">Chittagong City Corporation</option>
                                                    @elseif($show->city_corporation_area == 2)
                                                        <option value="1">Dhaka City Corporation
                                                        </option>
                                                        <option value="2" selected>Other City Corporation</option>
                                                        <option value="3">Other without City Corporation</option>
                                                        <option value="4">Chittagong City Corporation</option>
                                                    @elseif($show->city_corporation_area == 3)
                                                        <option value="1">Dhaka City Corporation
                                                        </option>
                                                        <option value="2">Other City Corporation</option>
                                                        <option value="3" selected>Other without City Corporation</option>
                                                        <option value="4">Chittagong City Corporation</option>
                                                    @elseif($show->city_corporation_area == 4)
                                                        <option value="1">Dhaka City Corporation
                                                        </option>
                                                        <option value="2">Other City Corporation</option>
                                                        <option value="3">Other without City Corporation</option>
                                                        <option value="4" selected>Chittagong City Corporation</option>
                                                    @else
                                                        <option value="1">Dhaka City Corporation</option>
                                                        <option value="2">Other City Corporation</option>
                                                        <option value="3">Other without City Corporation</option>
                                                        <option value="4">Chittagong City Corporation</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label required">Mobile No<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                <input class="form-control limited" type="text"
                                                       data-validation="required,length"
                                                       data-validation-length="11-12"
                                                       placeholder="Enter Mobile Number" required="required"
                                                       pattern="^(01)\d{9}\r?$" maxlength="11" minlength="11"
                                                       name="mobile_number" value="{{$show->mobile}}"/>
                                            </div>
                                            @error('mobile_number')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tax Zone<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                    <textarea class="col-xs-12 col-sm-10 form-control limited" cols="6"
                                                              rows="3" maxlength="500" type="text" required="required"
                                                              id="tax_zone" placeholder="Enter tax zone"
                                                              name="tax_zone">{{$show->tax_zone}}</textarea>
                                            </div>
                                            @error('tax_zone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tax Circle<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                    <textarea class="col-xs-12 col-sm-10 form-control limited" cols="6"
                                                              rows="3" maxlength="500" type="text" required="required"
                                                              id="tax_circle" placeholder="Enter tax circle"
                                                              name="tax_circle">{{$show->tax_circle}}</textarea>
                                            </div>
                                            @error('tax_circle')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Present Address<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                    <textarea class="col-xs-12 col-sm-10 form-control limited" cols="6"
                                                              rows="3" maxlength="500" type="text" required="required"
                                                              id="present_address" placeholder="Enter Present Address"
                                                              name="present_address">{{$show->present_address}}</textarea>
                                            </div>
                                            @error('present_address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Permanent Address<sup
                                                    class="text-danger">*</sup></label>
                                            <div class="col-sm-9">
                                                    <textarea class="col-xs-12 col-sm-10 form-control limited" cols="6"
                                                              rows="3" type="text" maxlength="500"
                                                              id="permanent_address"
                                                              placeholder="Enter Permanent Address" required="required"
                                                              name="permanent_address">{{$show->permanent_address}}</textarea>
                                            </div>
                                            @error('permanent_address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="checkbox col-sm-9">
                                                <label class="block">
                                                    <input type="checkbox" id="copy_presentaddress"
                                                           onchange="addressFunction()" class="ace input-md"/>
                                                    <span class="lbl bigger-100"> Same as present address</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix form-actions ">
                                    <div class="col-md-11">
                                        <button class="btn btn-info btn-sm" type="submit"><i
                                                class="ace-icon fa fa-check bigger-110"></i>Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix">
                                <sup class="text-danger">*</sup> <span class="required-text red">required</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#copy_presentaddress").on("click", function () {
                let permanent_address = $.trim($("#present_address").val());
                if (permanent_address !== '') {
                    if ($(this).is(":checked")) {
                        $('#permanent_address').val(permanent_address);
                    } else {
                        $("#permanent_address").val('');
                    }
                } else {
                    alert('Present address is empty');
                    return false;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#btn").click(function () {
                $("#Create").toggle();
                $("#divbtn").hide();
            });
        });
    </script>

@endsection

