@extends('ui.master')

@section('title')
    Edit Drivers
@endsection

@section('content')

    <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Driver Details</h5>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="POST" name="" action="{{route('admin.update_driver')}}" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" id="hid_id" name="hid_id" value="{{$editedoffers_data->id}}">

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname" value="{{$editedoffers_data->fname}}" required>
                                        @error('fname')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lname" id="lname" value="{{$editedoffers_data->lname}}" required>
                                        @error('lname')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{$editedoffers_data->email}}" required>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    

                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" value="">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{$editedoffers_data->mobile}}" required>
                                        @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Whatsapp No</label>
                                        <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" value="{{$editedoffers_data->whatsapp_no}}" required>
                                        @error('whatsapp_no')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" value="{{$editedoffers_data->dob}}" data-language="en" class="datepicker-here form-control digits" aria-describedby="basic-addon2">
                                        @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{$editedoffers_data->address}}" required>
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Pan No</label>
                                        <input type="text" class="form-control" name="pan_no" id="pan_no" value="{{$editedoffers_data->pan_no}}" required>
                                        @error('pan_no')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Landmark</label>
                                        <input type="text" class="form-control" name="landmark" id="landmark" value="{{$editedoffers_data->landmark}}" required>
                                        @error('landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="" hidden>Select</option>
                                            <option value="male" {{$editedoffers_data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{$editedoffers_data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{$editedoffers_data->gender == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Vehicle Type</label>
                                            <select id="business_categoryId" name="vehicle_type" class="form-control" required aria-label="select example">
                                                <option value="{{old('vehicle_type')}}">Select Typ</option>
                                                @foreach($categoriesveh as $vehicleType)
                                                <option value="{{$vehicleType->id}}" {{$editedoffers_data->vehicle_type ==  $vehicleType->id ? "selected" : ""}}>{{$vehicleType->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('vehicle_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Vehicle Name</label>
                                        <input type="text" class="form-control" name="vehicle_name" id="vehicle_name" value="{{$editedoffers_data->vehicle_name}}" required>
                                        @error('vehicle_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Vehicle No</label>
                                        <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="{{$editedoffers_data->vehicle_no}}" required>
                                        @error('vehicle_no')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Emergency Contact Name</label>
                                        <input type="text" class="form-control" name="emergency_contact_name" id="emergency_contact_name" value="{{$editedoffers_data->emergency_contact_name}}" required>
                                        @error('emergency_contact_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Emergency Contact No</label>
                                        <input type="text" class="form-control" name="emergency_contact_no" id="emergency_contact_no" value="{{$editedoffers_data->emergency_contact_no}}" required>
                                        @error('emergency_contact_no')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Relation</label>
                                        <input type="text" class="form-control" name="relation" id="relation" value="{{$editedoffers_data->relation}}" required>
                                        @error('relation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Bank Account No</label>
                                        <input type="text" class="form-control" name="bank_account_no" id="bank_account_no" value="{{$editedoffers_data->bank_account_no}}" required>
                                        @error('bank_account_no')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Job Start Time</label>
                                            <select id="preferred_job_timing_id" name="preferred_job_timing_id" class="form-control" required aria-label="select example">
                                                <option value="{{old('preferred_job_timing_id')}}">Select Period</option>
                                                @foreach($categoriesjob as $jobtimingType)
                                                <option value="{{$jobtimingType->id}}" <?php echo $editedoffers_data->preferred_job_timing_id ==  $jobtimingType->id ? "selected" : ""; ?>>{{$jobtimingType->start_time}}</option>
                                                @endforeach
                                            </select>
                                            @error('preferred_job_timing_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Area</label>
                                            <select id="preferred_area_id" name="preferred_area_id" class="form-control" required aria-label="select example">
                                                <option value="{{old('preferred_area_id')}}">Select Area</option>
                                                @foreach($categoriesarea as $areaType)
                                                <option value="{{$areaType->id}}" <?php echo $editedoffers_data->preferred_area_id ==  $areaType->id ? "selected" : ""; ?>>{{$areaType->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('preferred_area_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Driver License</label>
                                        <input type="text" class="form-control" name="driver_license" id="driver_license" value="{{$editedoffers_data->driver_license}}" required>
                                        @error('driver_license')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row g-3">


                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">IFSC Code</label>
                                        <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="{{$editedoffers_data->ifsc_code}}" required>
                                        @error('ifsc_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">Aadhaar No</label>
                                        <input type="text" class="form-control" name="aadhar" id="aadhar" value="{{$editedoffers_data->aadhar}}" required>
                                        @error('aadhar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                   

                                </div>

                                <div class="row g-3">
                                <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">Image</label>
                                        <img src="\{{$editedoffers_data->image}}" alt="people" class="offrlck" width="56" id="img-upload">
                                        <input class="form-control offrimg" type="file" id="image" name="image" required="">
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">License Image</label>
                                        <img src="\{{$editedoffers_data->license_image}}" alt="people" class="offrlck" width="56" id="img-upload1">
                                        <input class="form-control offrimg" type="file" id="license_image" name="license_image" required="">
                                        @error('license_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="form-check">

                                    </div>
                                </div>
                                <button class="btn order-btn" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends -->

@endsection

@section('script')
    <script>
        function readURL(input) {
           if (input.files && input.files[0]) {
             var reader = new FileReader();
   
             reader.onload = function(e) {
               $('#img-upload').attr('src', e.target.result);
             }
   
             reader.readAsDataURL(input.files[0]);
           }
         }
   
         $("#image").change(function() {
           readURL(this);
         });
   
         function readURL1(input) {
           if (input.files && input.files[0]) {
             var reader = new FileReader();
   
             reader.onload = function(e) {
               $('#img-upload1').attr('src', e.target.result);
             }
   
             reader.readAsDataURL(input.files[0]);
           }
         }
   
         $("#license_image").change(function() {
           readURL1(this);
         });
   
   </script>
@endsection