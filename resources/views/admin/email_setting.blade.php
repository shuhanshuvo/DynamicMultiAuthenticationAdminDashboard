@extends('layouts.admin_master')

@section('content')


<main class="app-content">
   <div class="app-title">
      <div>
         <h1><i class="fa fa-edit"></i> SEND TO EMAIL FOR USER </h1>
      </div>
   </div>
   <div class="row">
   <div class="col-md-12">
   <div class="tile">

         <div class="col-lg-6">
            <form action="{{route('admin.send.email')}}" method="post" enctype="multipart/form-data">
            	@csrf
            
            <div class="form-group">
               <label class="col-md-3 control-label"><strong>EMAIL SENT TO</strong></label><br>
               <input type="text" name="email" value="user@gmail.com" class="form-control">
            </div>
 
            <div class="form-group">
               <label class="col-md-3 control-label"><strong>EMAIL TEMPLATE</strong></label><br>
               <textarea id="summernote" cols="6" rows="6" value="" required="" class="form-control" name="message"></textarea>
            </div>
             <div class="form-group" style="padding-bottom: 63px;">
            
            <input type="submit" name="send" class="btn btn-primary form-control" value="Send" />
            </div>
        </form>
         </div>
     </div>
   </div>
   </div>
</main>

@endsection

