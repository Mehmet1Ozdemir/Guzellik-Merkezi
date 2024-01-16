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
                    <h3 class="page-title">Doctor Detail</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Detail</a></li>
                        <li class="breadcrumb-item active">Doctor Details</li>
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
                <form method="POST" action="{{ route('panel.dentistUpdate') }}" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="data" value="{{$data}}">
                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Doctor Informations</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{$dentist->profile_picture_path}}" alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i>Upload Image</span>
                                                    <input type="file" class="upload" name="photo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ad : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{$dentist->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Soyad : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="surname" value="{{$dentist->surname}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ünvan : <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="title" value="{{$dentist->title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefon :</label>
                                        <input type="text" class="form-control" name="phone" value="{{$dentist->phone_number}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-Posta : <span class="text-danger"></span></label>
                                        <input type="email" class="form-control" name="email" value="{{$dentist->email}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cinsiyet :</label>
                                        <select class="form-select form-control" name="gender" >
                                            <option value="">Seçim Yapınız</option>
                                            <option @if($dentist->gender == 0) selected @endif value="0">Male</option>
                                            <option @if($dentist->gender == 1) selected @endif value="1">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Date of Birth :</label>
                                        <input type="date" class="form-control" name="birth_date" value="{{$dentist->birth_date}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Units : <span class="text-danger">*</span></label>
                                        <select class="form-select form-control" name="unit_id">
                                            <option value="">Make Your Choice</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}"
                                                {{($unit->id==$dentist->unit_id)?'selected':''}}>{{$unit->name}}</option>
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
                                <textarea class="form-control" rows="5" name="about_me">{{$dentist->about}}</textarea>
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
                                    <input type="checkbox" name="services[]" @foreach($dentist->serviceSpecialization as $ser) @if($ser->service_spec_id == $service->id ) checked @endif @endforeach value="{{$service->id}}">
                                    <label for="{{$service->name}}"> {{$service->name}}</label><br>
                                @endforeach
                            </div>
                            <div class="form-group mb-0">
                                <label>Specialization </label>
                                <br>
                                @foreach($specializations as $specialization)
                                    <input type="checkbox" name="specializations[]"  @foreach($dentist->serviceSpecialization as $ser) @if($ser->service_spec_id == $specialization->id ) checked @endif @endforeach value="{{$specialization->id}}">
                                    <label for="{{$specialization->name}}"> {{$specialization->name}}</label><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Services and Specialization -->

                    <!-- Education -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Education </h4>
                            <div class="education-info">
                                <div class="row form-row education-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        @foreach($educations as $education)
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Degree :</label>
                                                    <input type="text" name="education_degree[]" class="form-control" value="{{$education->title}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>University :</label>
                                                    <input type="text" name="education_school_name[]" class="form-control" value="{{$education->name}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Starting Date :</label>
                                                    <input type="date" name="education_start_date[]" class="form-control" value="{{$education->start_date}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>End Date:</label>
                                                    <input type="date" name="education_due_date[]" class="form-control" value="{{$education->due_date}}">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i>Create More</a>
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
                                        @foreach($experiences as $experience)
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Business Name :</label>
                                                    <input type="text" name="work_place_name[]" class="form-control" value="{{$experience->name}}">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Title :</label>
                                                    <input type="text" name="work_title[]" class="form-control" value="{{$experience->title}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Starting Date :</label>
                                                    <input type="date" name="work_start_date[]" class="form-control" value="{{$experience->start_date}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>End Date:</label>
                                                    <input type="date" name="work_due_date[]" class="form-control" value="{{$experience->due_date}}">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                        <button type="submit" class="btn btn-primary submit-btn">Update Dentist Information</button>
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