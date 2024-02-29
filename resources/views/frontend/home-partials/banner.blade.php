<div id="hero" class="hero route bg-image"
    style="background-image: url({{asset('storage/uploads/'.$banner->banner_image)}})">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
        <div class="table-cell">
            <div class="container">
                <h1 class="hero-title mb-4">{{$banner->banner_title}}</h1>
                @php
                $subTitles = json_decode($banner->banner_subTitle);
                @endphp
                <p class="hero-subtitle"><span class="typed"
                        data-typed-items="@foreach ($subTitles as $subTitle){{$subTitle->value.','}} @endforeach"></span>
                </p>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>