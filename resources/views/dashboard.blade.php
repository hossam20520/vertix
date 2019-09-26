@extends('layouts.app')

@section('content')
<section id="services">
        <div class="container">
            <div class="row">
                @if (session('status'))


                <div class="alert alert-success" style="margin-top: 19px;">
                        <strong>Success!</strong> successful added.
                      </div>

                @endif

        <div class="col-md-8">
                        <div class="card-body">
                                <form method="POST" action="/save_projects" enctype="multipart/form-data">
                                    @csrf


                        <div class="form-group row">
                                <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('count') is-invalid @enderror" name="project_name" value="{{ old('count') }}" required autocomplete="name" autofocus>
                                
                                    @error('count')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                    <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('project meta') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="meta" type="text" class="form-control @error('meta') is-invalid @enderror" name="project_meta" value="Null" required autocomplete="count" autofocus>
                                    
                                        @error('count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="meta" type="text" class="form-control @error('meta') is-invalid @enderror" name="description" value="Null" required autocomplete="count" autofocus>
                                    
                                        @error('count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                        <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('client name') }}</label>
            
                                        <div class="col-md-6">
                                              
                                        
                                            <input  type="text" class="form-control @error('meta') is-invalid @enderror" name="client_name"  required autofocus>
                                        
                                            @error('count')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                <div class="form-group row">
                                    <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
        
                                    <div class="col-md-6">
                                            <input id="image_x" type="hidden" name="image"   value="not " >
                                    
                                        <input id="photo_name" type="file"  onchange="upload(this)" class="form-control @error('meta') is-invalid @enderror" name="photo_name"  required autofocus>
                                    
                                        @error('count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

               

                                <div class="form-group row">
                                      
                                        <div class="col-md-6">
                                                <img id="loaderr" src="{{ asset('images/opt/imgg.png')}}" style="
                                                width: 200px;
                                                height: 200px;
                                                margin-left: 300px;
                                            ">
                                           
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <input id="photo_name" type="file"  onchange="upload(this)" class="form-control @error('meta') is-invalid @enderror" name="photo_name"  required autofocus>
                                    
                                            <div >
                                                    <img id="loaderr" src="{{ asset('images/opt/imgg.png')}}" style="
                                                    width:100px;
                                                    height: 100px;
                                                   
                                                ">
                                                     <img id="loaderr" src="{{ asset('images/opt/imgg.png')}}" style="
                                                     width: 100px;
                                                     height: 100px;
                                                   
                                                 ">
                                                        <img id="loaderr" src="{{ asset('images/opt/imgg.png')}}" style="
                                                        width: 100px;
                                                        height: 100px;
                                                      
                                                    ">
                                                           <img id="loaderr" src="{{ asset('images/opt/imgg.png')}}" style="
                                                           width: 100px;
                                                           height: 100px;
                                                         
                                                       ">
                                                    
                                               
                                            </div>
                                        </div>


                                <button type="submit" class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>


                                



                                </form>
                        </div>
        </div>


               

            </div>
        </div>
</section>

<script src="{{ asset('script/jquery-1.12.4.min.js')}}"></script>
<script src="{{ asset('script/wow.min.js')}}"></script>
<script src="{{ asset('script/bootstrap.min.js')}}"></script>
<script src="{{ asset('script/slick.min.js')}}"></script>
<script src="{{ asset('script/jquery.nicescroll.min.js')}}"></script>
<script src="{{ asset('script/script.js')}}"></script>
<script>
  $('li .dropdown').click(function(){
      $('li .dropdown ').addClass('active').siblings('li').removeClass('active')
  })
</script>

<script>


    function upload(image){
        
        $.ajaxSetup({
     
     headers: {
      
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      
     }
      
     });
     var file_data = $(image).prop('files')[0];
     
     var formData = new FormData();
     formData.append('photo_name' ,file_data);

     var loader = "{{ asset('images/opt/load.gif')}}";
      $("#loaderr").attr('src' ,loader );
   jQuery.ajax({
   url: '/upload_image',
   type:'POST',
   contentType:false,
   processData:false,
   data:formData,
   dataType: 'json',
   success:function(response){

   console.log(response);
   $('#image_x').val(response.img);
   $("#loaderr").attr('src' ,response.img );

   },error:function (er){
      console.log(er);
   }
});



    }


     
    </script> 

@endsection