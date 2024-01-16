    @extends('panel.layout.app')
@section('content')


            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome to the Management Panel</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Home Page</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{$dentist_count}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-muted">All Doctors</h6>
                                    <!--
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{$patient_count}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">All Patients</h6>
                                    <!--
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success w-50"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{$appointment_count}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">All Appintments</h6>
                                    <!--
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger w-50"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>---</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Income</h6>
                                    <!--
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-50"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <!-- Recent Orders -->
                        <div class="card card-table">
                            <div class="card-header">
                                <h4 class="card-title">Appintment List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0 w-100" id="appointments_table" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Doctor Name</th>
                                            <th>Patient Name</th>
                                            <th>Medical Procedure</th>
                                            <th>Apponitment Date</th>
                                            <th>Appointment State</th>
                                            <th>Detail</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Doctor Name</th>
                                            <th>Patient Name</th>
                                            <th>Medical Procedure</th>
                                            <th>Apponitment Date</th>
                                            <th>Appointment State</th>
                                            <th>Detail</th>
                                            <th>Delete</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Orders -->

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6  p-4">
                        <div class="card card-table  p-4">
                            <div class="card-header">
                                <h4 class="card-title">Doctor List</h4>
                            </div>
                            <div class="card-body p-2">

                                <div class="table-responsive">
                                    <table class="table table-hover  mb-0 w-100" id="patient_table" >
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Expertise</th>
                                            <th>Medical Procedure</th>
                                            <th>Profile</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Expertise</th>
                                            <th>Medical Procedure</th>
                                            <th>Profile</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex">

                        <!-- Recent Orders -->
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Doctors List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Earned</th>
                                            <th>Reviews</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Dr. Orali Fisher</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>
                                            <td>$3200.00</td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Loren Bivens</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>
                                            <td>$3100.00</td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Dr. Jerelyn Pino </a>
                                                </h2>
                                            </td>
                                            <td>Cardiology</td>
                                            <td>$4000.00</td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Dr. Rieko Thrash</a>
                                                </h2>
                                            </td>
                                            <td>Endodontics </td>
                                            <td>$3200.00</td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Dr. Gennaro Weiner</a>
                                                </h2>
                                            </td>
                                            <td>Orthopaedics</td>
                                            <td>$3500.00</td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Orders -->

                    </div>
                    <div class="col-md-6 d-flex">

                        <!-- Feed Activity -->
                        <div class="card  card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Patients List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Phone</th>
                                            <th>Last Visit</th>
                                            <th>Paid</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Rochel Dickey </a>
                                                </h2>
                                            </td>
                                            <td>8286329170</td>
                                            <td>20 Oct 2019</td>
                                            <td class="text-end">$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient2.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Arlow Ebert </a>
                                                </h2>
                                            </td>
                                            <td>2077299974</td>
                                            <td>22 Oct 2019</td>
                                            <td class="text-end">$200.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Niv Collazo</a>
                                                </h2>
                                            </td>
                                            <td>2607247769</td>
                                            <td>21 Oct 2019</td>
                                            <td class="text-end">$250.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient4.jpg" alt="User Image"></a>
                                                    <a href="profile.html"> Flo Sherrod</a>
                                                </h2>
                                            </td>
                                            <td>5043686874</td>
                                            <td>21 Sep 2019</td>
                                            <td class="text-end">$150.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient5.jpg" alt="User Image"></a>
                                                    <a href="profile.html">Korva Weiner</a>
                                                </h2>
                                            </td>
                                            <td>9548207887</td>
                                            <td>18 Sep 2019</td>
                                            <td class="text-end">$350.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Feed Activity -->

                    </div>
                </div>

            </div>


@endsection


    @section('js')
        <script type="text/javascript">

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    }
                });


            });

            var dataTable = null;

            dataTable = $('#patient_table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
                },
                order: [
                    [0, 'ASC']
                ],
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: true,
                ajax: '{{ route('fetchPatients') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name'},
                    {data: 'surname'},
                    {data: 'age'},
                    {data: 'detail'},
                    {data: 'delete'},

                ]
            });

        </script>

        <script type="text/javascript">



            var dataTable = null;

            dataTable = $('#appointments_table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
                },
                order: [
                    [0, 'ASC']
                ],
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: true,
                ajax: '{{ route('panel.appointmentsFetch') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'dentist_name'},
                    {data: 'patient_name'},
                    {data: 'operation'},
                    {data: 'date'},
                    {data: 'status'},
                    {data: 'detail'},
                    {data: 'delete'},

                ]
            });
        </script>

    @endsection