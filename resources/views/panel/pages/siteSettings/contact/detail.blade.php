@extends('panel.layout.app')
@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Contact Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Management Panel</a></li>
                        <li class="breadcrumb-item active">Contact Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <!--
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-01.jpg">
                            </a>
                        </div>
                        -->
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{$contact->title}}</h4>
                            <h6 class="text-muted">{{$contact->email}}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i>{{$contact->town}}, {{$contact->getCountry->name}}</div>
                           <!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                           -->
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#cont_details_tab">Contact Informations</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Contact Details Tab -->
                    <div class="tab-pane fade show active" id="cont_details_tab">

                        <!-- Contact Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Contact Details</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#edit_contact_details"><i class="fa fa-edit me-1"></i>Update</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Title</p>
                                            <p class="col-sm-10">{{$contact->title}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Descriptions</p>
                                            <p class="col-sm-10">{{$contact->description}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Phone Number 1</p>
                                            <p class="col-sm-10">{{$contact->phone_1}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Phone Number 2</p>
                                            <p class="col-sm-10">{{$contact->phone_2}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">E-Mail</p>
                                            <p class="col-sm-10">{{$contact->email}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0">Address</p>
                                            <p class="col-sm-10 mb-0">{{$contact->address}}<br>
                                                {{$contact->town}},<br>
                                                {{$contact->getCity->name}}   {{$contact->zip_code}},<br>
                                                {{$contact->getCountry->name}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_contact_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Personal Informations</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateContactInformation">
                                                    <input type="hidden" name="contactID" value="{{$contact->id}}">
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Title :</label>
                                                                <input type="text" class="form-control" name="title" value="{{$contact->title}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Description :</label>
                                                                <input type="text"  class="form-control" name="description" value="{{$contact->description}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>E-Mail</label>
                                                                <input type="email" class="form-control" name="email" value="{{$contact->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Phone Number 1</label>
                                                                <input type="text" value="{{$contact->phone_1}}" name="phone_1" class="form-control">
                                                                <label>Phone Number 2</label>
                                                                <input type="text" value="{{$contact->phone_2}}" name="phone_2" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <h5 class="form-title"><span>Address</span></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Full Address :</label>
                                                                <input type="text" class="form-control" name="address" value="{{$contact->address}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="form-control" name="country_id" id="country_select">
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country->id}}" @if($contact->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>City :</label>
                                                                <select  class="form-control" name="city_id" id="city_select"  >
                                                                    <option selected disabled >Please Select</option>
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city->id}}"  @if($contact->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>District :</label>
                                                                <input type="text" class="form-control" name="town" value="{{$contact->town}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Post Code</label>
                                                                <input type="text" class="form-control" name="zip_code" value="{{$contact->zip_code}}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                                <button id="updateContactInformationButton" class="btn btn-primary w-100">Save Changes</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#country_select').change(function (event) {
            var country = $('#country_select').val();
            $.ajax({
                type: 'GET',
                url: '{{route('getCities')}}',
                data: {
                    country_id: country
                },
                success: function (data) {
                    $("#city_select").empty()
                    var innerDateSelect = "<option disabled selected>Seçim Yapınız</option>"
                    data.cities.forEach((item) => {
                        innerDateSelect += "<option value='" + item.id + "'>" + item.name + "</option>"
                    });
                    $("#city_select").append(innerDateSelect);
                }
            });
        });
    </script>

    <script>
        $('#updateContactInformationButton').click(function (event) {

            var formData = new FormData(document.getElementById('updateContactInformation'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.contactUpdate') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.Error != null){
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',
                            html: data.Error,
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }else{
                        console.log('success')
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            html: 'İletişim Güncelleme Başarılı!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",


                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    }

                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: '\n' + errors,
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });
                }
            });

        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });

        });
    </script>
@endsection