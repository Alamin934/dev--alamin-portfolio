@extends('backend.layouts.backend')

@section('title', 'Social Icons')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Social Icons</h4>

        <div class="card">
            <div class="card-body">
                <form method="POST" id="socialLinkSubmit">
                    @csrf
                    <div class="mb-3">
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
        $(document).on('submit', 'form#socialLinkSubmit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);

            $.ajax({
                type: "POST",
                url: "{{route('backend.dashboard.socialLink.store')}}",
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