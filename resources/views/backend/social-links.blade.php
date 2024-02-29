@extends('backend.layouts.backend')

@section('title', 'Social Icons')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Social Icons</h4>

        <div class="card">
            <div class="card-body social-form">
                <form method="POST" id="socialLinkSubmit">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fs-6" for="">Social Links</label>
                        <div id="social_links" class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="">Facebook</label>
                                    <input type="text" value="{{$social_links->facebook}}" name="facebook"
                                        class="form-control" placeholder="https://facebook.com">
                                    <small class="text-primary">Write without https://</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Twitter</label>
                                    <input type="text" value="{{$social_links->twitter}}" name="twitter"
                                        class="form-control" placeholder="https://twitter.com">
                                    <small class="text-primary">Write without https://</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Instagram</label>
                                    <input type="text" value="{{$social_links->instagram}}" name="instagram"
                                        class="form-control" placeholder="https://instagram.com">
                                    <small class="text-primary">Write without https://</small>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-3">
                                <div class="mb-3">
                                    <label class="form-label" for="">Linkedin</label>
                                    <input type="text" value="{{$social_links->linkedin}}" name="linkedin"
                                        class="form-control" placeholder="https://linkedin.com">
                                    <small class="text-primary">Write without https://</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Google Plus</label>
                                    <input type="text" value="{{$social_links->google_plus}}" name="google_plus"
                                        class="form-control" placeholder="https://googleplus.com">
                                    <small class="text-primary">Write without https://</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Youtube</label>
                                    <input type="text" value="{{$social_links->youtube}}" name="youtube"
                                        class="form-control" placeholder="https://youtube.com">
                                    <small class="text-primary">Write without https://</small>
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
                        $('.social-form').load(location.href+ ' form#socialLinkSubmit');
                        toastr.success('Social Links Added Successfully');
                    }
                }
            });
        });
    });
</script>
@endpush