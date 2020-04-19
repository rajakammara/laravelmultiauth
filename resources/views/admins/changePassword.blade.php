@extends('layouts.adminauth')

@section('content')
       <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
   
    <div class="row">
        <div class="col-xl-12 col-lg-8"> 
             <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <div class="card-body">
       @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @endif

      <form method="POST" action="{{url('changepassword')}}">
    
@csrf 



 @foreach ($errors->all() as $error)

    <p class="text-danger">{{ $error }}</p>

 @endforeach 



<div class="form-group row">

    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>



    <div class="col-md-6">

        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">

    </div>

</div>



<div class="form-group row">

    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>



    <div class="col-md-6">

        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

    </div>

</div>



<div class="form-group row">

    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>



    <div class="col-md-6">

        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">

    </div>

</div>



<div class="form-group row mb-0">

    <div class="col-md-8 offset-md-4">

        <button type="submit" class="btn btn-primary">

            Update Password

        </button>

    </div>

</div>

</form>
 
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
</div>
            <!-- End of Main Content -->
@endsection
@push('scripts')
<script type="text/javascript">
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prodimg')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
   </script> 
@endpush

@push('styles')
<style>
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
  </style>
@endpush