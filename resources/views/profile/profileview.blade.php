@extends('layouts.backend')

@section('title', 'Profile')

@section('content_header', 'Profile')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header"></div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="row">
                            @if(!empty($show))
                                <div class="col-xs-12">
                                    <div id="user-profile-1" class="user-profile row">
                                        <div class="col-xs-12 col-sm-3 center">
                                            <div>
                                                <div class="space-12"></div>
                                                <span class="profile-picture">
                                                    @if($show->profile_pic)
                                                        <img id="avatar" class="editable img-responsive "
                                                             alt="Admin Image" height="250px"
                                                             width="170px"
                                                             src="{{asset('storage/user_image/'.$show->profile_pic)}}"/>
                                                    @else
                                                        <img id="avatar" class="editable img-responsive"
                                                             alt="No Image"
                                                             height="220px"
                                                             width="170px"
                                                             src="assets/UserImage/no-image.jpg"/>
                                                    @endif
                                                </span>
                                                <div class="space-4"></div>
                                                <div
                                                    class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                    <div class="inline position-relative">
                                                        <a href="#" class="user-title-label dropdown-toggle"
                                                           data-toggle="dropdown">
                                                            <i class="ace-icon fa fa-circle light-green"></i>
                                                            &nbsp;
                                                            <span class="white">{{$show->full_name}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hr hr12 dotted"></div>
                                            <div class="hr hr16 dotted"></div>
                                        </div>
                                        <div class="col-xs-12 col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-12" id="default-buttons">
                                                    <a class="btn btn-primary btn-block"
                                                       href="{{route('profile_update')}}">
                                                        <i class="fa fa-edit"></i> Edit Profile</a>
                                                </div>
                                            </div>
                                            <div class="space-12"></div>
                                            <div class="profile-user-info profile-user-info-striped">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Father Name</div>
                                                            <div class="profile-info-value">
                                                            <span class="editable"
                                                                  id="name">{{$show->father_name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Mother Name</div>
                                                            <div class="profile-info-value">
                                                            <span class="editable"
                                                                  id="name">{{$show->mother_name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Spouse Name</div>
                                                            <div class="profile-info-value">
                                                            <span class="editable"
                                                                  id="name">{{$show->spouse_name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Spouse TIN ID</div>
                                                            <div class="profile-info-value">
                                                            <span class="editable"
                                                                  id="name">{{$show->spouse_tin_no}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Age</div>
                                                            <div class="profile-info-value">
                                                                @if($show->dob)
                                                                    <span class="editable"
                                                                          name="age">{{$age}}</span>
                                                                @else
                                                                    <span class="editable" name="age"></span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Email</div>
                                                            <div class="profile-info-value"><span class="editable"
                                                                                                  name="email">{{$show->email}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Mobile Number</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="mobile">{{$show->mobile}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Resident Status
                                                            </div>
                                                            <div class="profile-info-value"><span class="editable"
                                                                                                  name="resident_status">
                                                                        @if($show->resident_status==1)
                                                                        Resident
                                                                    @elseif($show->resident_status==2)
                                                                        Non Resident
                                                                    @endif
                                                                    </span>
                                                            </div>
                                                        </div>


                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Profession
                                                            </div>
                                                            <div class="profile-info-value"><span class="editable"
                                                                                                  name="profession">
                                                                    {{$show->organization_name}}

                                                                    </span>
                                                            </div>

                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Organization Name
                                                            </div>
                                                            <div class="profile-info-value"><span class="editable"
                                                                                                  name="organization_name">
                                                                        @if($show->city_corporation_area==1)
                                                                        Dhaka City Corporation
                                                                    @elseif($show->city_corporation_area==2)
                                                                        Other City Corporation
                                                                    @elseif($show->city_corporation_area==3)
                                                                        Other without City Corporation
                                                                    @elseif($show->city_corporation_area==4)
                                                                        Chittagong City Corporation
                                                                    @endif
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> City Corporation Area
                                                            </div>
                                                            <div class="profile-info-value"><span class="editable"
                                                                                                  name="present_address">
                                                                        @if($show->city_corporation_area==1)
                                                                        Dhaka City Corporation
                                                                    @elseif($show->city_corporation_area==2)
                                                                        Other City Corporation
                                                                    @elseif($show->city_corporation_area==3)
                                                                        Other without City Corporation
                                                                    @elseif($show->city_corporation_area==4)
                                                                        Chittagong City Corporation
                                                                    @endif
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> NID</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="nid_no">{{$show->nid_no}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> eTin</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="tin_no">{{$show->tin_no}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Gender</div>
                                                            <div class="profile-info-value">
                                                                @if($show->gender==1)
                                                                    <span class="editable"
                                                                          name="gender">Male</span>
                                                                @elseif($show->gender==2)
                                                                    <span class="editable"
                                                                          name="gender">Male</span>
                                                                @else
                                                                    <span class="editable"
                                                                          name="gender"></span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Joined</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="created_at">{{$show->created_at}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Tax Zone</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="tax_zone">{{$show->tax_zone}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Tax Circle</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="tax_circle">{{$show->tax_circle}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Present Address</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="present_address">{{$show->present_address}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Permanent Address</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="permanent_address">{{$show->permanent_address}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Freedom Fighter Quota
                                                            </div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="is_freedom_fighter_quota">
                                                                    <?php echo $show->is_freedom_fighter_quota == 1 ? 'Yes' : 'No'; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Handicapped</div>
                                                            <div class="profile-info-value">
                                                                <span class="editable"
                                                                      name="is_handicapped">
                                                                    <?php echo $show->is_handicapped == 1 ? 'Yes' : 'No'; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> ETIN Certificate</div>
                                                            <div class="profile-info-value">
                                                                @if($show->e_tin_certificate)
                                                                    <a class="btn btn-info btn-sm" target="_blank"
                                                                       href="{{ url('storage/etin_certificate/'.$show->e_tin_certificate) }}">Preview</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="space-20"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection

