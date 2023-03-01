
@extends("admin_dashboard.layouts.app")

    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Information</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Information</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Information</h5>
                    <hr/>

                    <form action="{{ route('admin.information.update', $information) }}" method='post'>
                        @csrf
                        @method('PATCH')
    
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputSlogan" class="form-label">Slogan</label>
                                            <input type="text" value='{{old("slogan", $information->slogan)}}' name='slogan' required class="form-control" id="inputProductTitle">

                                            @error('slogan')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputTitle" class="form-label">Position</label>
                                            <input type="text" value='{{old("position", $information->position)}}' name='position' required class="form-control" id="inputProductTitle">

                                            @error('position')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputaddress" class="form-label">Address</label>
                                            <input type="text" value='{{old("address",$information->address)}}' name='address' required class="form-control" id="inputProductTitle">

                                            @error('address')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputmobile" class="form-label">Mobile</label>
                                            <input type="number" value='{{ old("mobile",$information->mobile) }}' class="form-control" required name='mobile' id="inputProductTitle">

                                            @error('mobile')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductEmail" class="form-label">Email</label>
                                            <input type="email" value='{{old("email", $information->email)}}' name='email' required class="form-control" id="inputProductTitle">

                                            @error('email')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductWebsite" class="form-label">Website</label>
                                            <input type="text" value='{{old("website", $information->website)}}' name='website' required class="form-control" id="inputProductTitle">

                                            @error('website')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="inputProductDescription" class="form-label">Logo</label>
                                                    <input id='thumbnail' required name='thumbnail' id="file" type="file">

                                                    @error('thumbnail')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div> --}}


                                        <button class='btn btn-primary' type='submit'>Add Category</button>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
    @endsection

@section("script")
<script>
    $(document).ready(function () {
        
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

    });

</script>
@endsection