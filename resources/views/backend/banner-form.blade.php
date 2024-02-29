@extends('backend.layouts.backend')

@section('title', 'Banner')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Banner</h4>

        <div class="card">
            <div class="card-body banner-form">
                <ul class="error_msg"></ul>
                <form enctype="multipart/form-data" method="POST" id="bannerSubmit">
                    @csrf
                    {{-- Banner Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="banner_title">Banner Title</label>
                        <input type="text" class="form-control form-control-lg" id="banner_title" name="banner_title"
                            placeholder="I am Morgan Freeman" value="{{$banner->banner_title}}" />
                    </div>
                    {{-- Banner Sub Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="banner_subTitle">Sub Titles</label>
                        <input type="text" class="form-control form-control-lg" id="banner_subTitle"
                            name="banner_subTitle" placeholder="Designer, Developer, Freelancer, Photographer"
                            value="{{$banner->banner_subTitle}}" />
                        <small class="text-primary">Able to add multiple words, After write single word press
                            enter</small>
                    </div>
                    {{-- Banner Image --}}
                    <div class="mb-3">
                        <label class="form-label" for="banner_image">Banner Image</label>
                        <input type="file" id="banner_image" name="banner_image"
                            class="form-control form-control-lg dropify" data-height="350" />
                        <small class="text-primary">Image dimensions should be gretter than 1200X700</small>

                        <div class="text-end">
                            <small class="text-primary d-block">Current Image</small>
                            <img class="w-25" src="{{asset('storage/uploads/'.$banner->banner_image)}}" alt="">
                        </div>
                    </div>
                    {{-- Banner Social Links --}}
                    {{-- <div class="mb-3">
                        <label class="form-label fs-6" for="">Social Links</label>
                        <div id="social_links" class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="">Facebook</label>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="https://facebook.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Twitter</label>
                                    <input type="text" name="twitter" class="form-control"
                                        placeholder="https://twitter.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Instagram</label>
                                    <input type="text" name="instagram" class="form-control"
                                        placeholder="https://instagram.com">
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-3">
                                <div class="mb-3">
                                    <label class="form-label" for="">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control"
                                        placeholder="https://linkedin.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Skype</label>
                                    <input type="text" name="skype" class="form-control"
                                        placeholder="https://skype.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Youtube</label>
                                    <input type="text" name="youtube" class="form-control"
                                        placeholder="https://youtube.com">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('submit', 'form#bannerSubmit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);

            $.ajax({
                type: "POST",
                url: "{{route('backend.dashboard.banner.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status == 'success'){
                        $('.error_msg').html('');
                        //$('.banner-form').load(location.href+ ' form#bannerSubmit');
                        toastr.success('Banner Added Successfully');
                    }
                },error: function(err){
                    let error = err.responseJSON;
                    toastr.error('Banner not added. may be some fileds are required.');
                    $('.error_msg').html('');
                    $.each(error.errors, function (index, value) { 
                        $('.error_msg').append(`<li class='text-danger'>${value}</li>`);
                    });
                }
            });
        });
    });
</script>
@endpush