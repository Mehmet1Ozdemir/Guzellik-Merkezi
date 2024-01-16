@extends('panel.layout.app')

@section('style')

    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/fontawesome/css/all.min.css')}}">

@endsection

@section('content')
    <style>

    </style>

        <!-- Page Wrapper -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Create Doctor</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                                <li class="breadcrumb-item active">Create Doctor</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
{{--                    @if (session('error'))--}}
{{--                        @dd(\Illuminate\Support\Facades\Session::get('error')->all())--}}
{{--                    @endif--}}
                        <!-- Personal Details -->
                        <div class="col-sm-12">
                            <form method="POST" action="{{ route('panel.dentistCreate') }}" enctype='multipart/form-data'>
                                @csrf
                                    <!-- Basic Information -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Doctor Information</h4>
                                            <div class="row form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="change-avatar">
                                                            <div class="profile-img">
                                                                <img src="{{asset('dentalTamplate/assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                            </div>
                                                            <div class="upload-img">
                                                                <div class="change-photo-btn">
                                                                    <span><i class="fa fa-upload"></i> Upload iamge</span>
                                                                    <input type="file" class="upload" name="photo">
                                                                </div>
                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name : <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Surname : <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="surname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Degree : <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number :</label>
                                                        <input type="text" class="form-control" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email : <span class="text-danger"></span></label>
                                                        <input type="email" class="form-control" name="email">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender :</label>
                                                        <select class="form-select form-control" name="gender">
                                                            <option value="">Make Your Choice</option>
                                                            <option value="0">Male</option>
                                                            <option value="1">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-0">
                                                        <label>Date of Birth :</label>
                                                        <input type="date" class="form-control" name="birth_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Units : <span class="text-danger">*</span></label>
                                                        <select class="form-select form-control" name="unit_id">
                                                            <option value="">Make Your Choice</option>
                                                        @foreach($units as $unit)
                                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Information -->

                                    <!-- About Me -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">About</h4>
                                            <div class="form-group mb-0">
                                                <label>Biography</label>
                                                <textarea class="form-control" rows="5" name="about_me"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /About Me -->

                                    <!-- Services and Specialization -->
                                    <div class="card services-card">
                                        <div class="card-body">
                                            <h4 class="card-title">Services and Specialization</h4>
                                            <div class="form-group">
                                                <label>Services</label>
                                                <br>
                                                @foreach($services as $service)
                                                <input type="checkbox" name="services[]" value="{{$service->id}}">
                                                    <label for="{{$service->name}}"> {{$service->name}}</label><br>
                                                @endforeach
{{--                                                <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="Tooth cleaning " id="services">--}}
{{--                                                <small class="form-text text-muted">Note : Type & Press enter to add new services</small>--}}
                                            </div>
                                            <div class="form-group mb-0">
                                                <label>Specialization </label>
                                                <br>
                                                @foreach($specializations as $specialization)
                                                    <input type="checkbox" name="specializations[]" value="{{$specialization->id}}">
                                                    <label for="{{$specialization->name}}"> {{$specialization->name}}</label><br>
                                                @endforeach
{{--                                                <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="Children Care,Dental Care" id="specialist">--}}
{{--                                                <small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Services and Specialization -->

                                    <!-- Education -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Education</h4>
                                            <div class="education-info">
                                                <div class="row form-row education-cont">
                                                    <div class="col-12 col-md-10 col-lg-11">
                                                        <div class="row form-row">
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Degree :</label>
                                                                    <input type="text" name="education_degree[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>University :</label>
                                                                    <input type="text" name="education_school_name[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Starting date :</label>
                                                                    <input type="date" name="education_start_date[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>End Date :</label>
                                                                    <input type="date" name="education_due_date[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Create More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Education -->

                                    <!-- Experience -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Experience</h4>
                                            <div class="experience-info">
                                                <div class="row form-row experience-cont">
                                                    <div class="col-12 col-md-10 col-lg-11">
                                                        <div class="row form-row">
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Business Name :</label>
                                                                    <input type="text" name="work_place_name[]" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Title :</label>
                                                                    <input type="text" name="work_title[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Starting Date:</label>
                                                                    <input type="date" name="work_start_date[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>End Date :</label>
                                                                    <input type="date" name="work_due_date[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Create More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Experience -->

                                <div class="submit-section submit-btn-bottom">
                                    <button type="submit" class="btn btn-primary submit-btn">Create Dentist</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Personal Details -->
                </div>

            </div>
        <!-- /Page Wrapper -->

    <script>
        @if (session('error'))
        Swal.fire({
            title: 'Hata!',
            text: '{{\Illuminate\Support\Facades\Session::get('error')}}',
            icon: 'error',
            confirmButtonText: 'Tamam'
        });
        @endif

        @if (session('success'))
        Swal.fire({
            title: 'Başarılı!',
            text: '{{\Illuminate\Support\Facades\Session::get('success')}}',
            icon: 'success',
            confirmButtonText: 'Tamam'
        });
        @endif
    </script>

@endsection


@section('js')

    <script src="{{asset('dentalTamplate/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('dentalTamplate/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('dentalTamplate/assets/js/profile-settings.js')}}"></script>

@endsection