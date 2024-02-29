@extends('backend.layouts.backend')

@section('title', 'About')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">About</h4>

        <div class="card">
            <div class="card-body about-form">
                <div class="error_msg row"></div>
                <form enctype="multipart/form-data" method="POST" id="aboutSubmit">
                    @csrf
                    {{-- About Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="section_title">Section Title <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" id="section_title" name="section_title"
                            placeholder="About" value="" />
                    </div>
                    {{-- About Description --}}
                    <div class="mb-3">
                        <label class="form-label" for="section_desc">Section Description</label>
                        <textarea rows="3" class="form-control form-control-lg" id="section_desc" name="section_desc"
                            placeholder="This description is for under the title"></textarea>
                    </div>
                    <div class="row mb-4">
                        {{-- Person Photo --}}
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="user_photo">User Photo <span
                                    class="text-danger">*</span></label>
                            <input type="file" id="user_photo" name="user_photo"
                                class="form-control form-control-lg dropify" data-height="250" />
                            <small class="text-primary">Photo dimensions should be 400X400 to 600X600</small>

                        </div>
                        {{-- User Current Photo --}}
                        <div class="col-md-2">
                            <span class="d-block">Current Photo</span>
                            {{-- <img class="w-25" src="" alt=""> --}}
                        </div>
                        {{-- User Postion & Summery --}}
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label class="form-label" for="position">Position <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" id="position" name="position"
                                    placeholder="UI/UX Designer & Web Developer." value="" />
                            </div>
                            <div>
                                <label class="form-label" for="summery">Summery <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control form-control-lg" id="summery" name="summery"
                                    placeholder="Write something about your self"></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- User About Information --}}
                    <div class="mb-3">
                        <label class="form-label fs-6" for="">User Information</label>
                        <div id="user_information" class="row">
                            <div class="col-md-6">
                                {{-- Date of Birth --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Birthday <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control" />
                                </div>
                                {{-- Website --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Webiste <span class="text-danger">*</span></label>
                                    <input type="text" name="website" class="form-control"
                                        placeholder="Enter your website url">
                                </div>
                                {{-- Phone --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter your phone number">
                                </div>
                                {{-- City --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">City <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control"
                                        placeholder="Enter your city, state, country">
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-3">
                                {{-- Age --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Age <span class="text-danger">*</span></label>
                                    <input type="number" maxlength="2" name="age" class="form-control"
                                        placeholder="Enter your Age">
                                </div>
                                {{-- Degree/Education --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Degree <span class="text-danger">*</span></label>
                                    <input type="text" name="degree" class="form-control"
                                        placeholder="Enter your education status">
                                </div>
                                {{-- Email --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter your email">
                                </div>
                                {{-- Freelancing --}}
                                <div class="mb-3">
                                    <label class="form-label" for="">Freelance <span
                                            class="text-danger">*</span></label>
                                    <select name="freelance" class="form-select">
                                        <option @disabled(true) @selected(true)>Select</option>
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $(document).on('submit', 'form#aboutSubmit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);

            $.ajax({
                type: "POST",
                url: "{{route('backend.dashboard.about.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if(response.status == 'success'){
                        $('.error_msg').html('');
                        //$('.about-form').load(location.href+ ' form#aboutSubmit');
                        toastr.success('About Added Successfully');
                    }
                },error: function(err){
                    let error = err.responseJSON;
                    toastr.error('About not added. may be some fileds are required.');
                    $('.error_msg').html('');
                    $.each(error.errors, function (index, value) { 
                        $('.error_msg').append(`<div class="col-4"><li class='text-danger'>${value}</li></div>`);
                    });
                }
            });
        });
    });
</script>
@endpush