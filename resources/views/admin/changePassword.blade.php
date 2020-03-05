@extends('layouts.admin_master')

@section('content')



<div class="container">


    <div class="row">
        <div class="col-12" style="padding-top: 100px;">
            <div class="page-title-box">
                <div class="page-title-right">
                    
                </div>
                <h1 class="page-title">Change Password</h1>
            </div>
        </div>
    </div>
    <!-- end page title -->

     @if(count($errors) > 0 )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.pass.update')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="emailaddress">New Password</label>
                            <input class="form-control" type="text" name="n_pass"  id="emailaddress" placeholder="Enter New Password" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Change Password</label>
                            <input class="form-control" type="text" name="c_pass"  id="emailaddress"  placeholder="Enter Confirm Password" >
                        </div>

                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
     </div>
 </div>


       
         
          
     
   




@endsection