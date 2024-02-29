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
                    @if ($social_links->twitter)
                    <a href="https://{{$social_links->twitter}}" target="_blank" class="twitter"><i
                            class="bx bxl-twitter"></i></a>
                    @endif

                    @if ($social_links->facebook)
                    <a href="https://{{$social_links->facebook}}" target="_blank" class="facebook"><i
                            class="bx bxl-facebook"></i></a>
                    @endif

                    @if ($social_links->instagram)
                    <a href="https://{{$social_links->instagram}}" target="_blank" class="instagram"><i
                            class="bx bxl-instagram"></i></a>
                    @endif

                    @if ($social_links->google_plus)
                    <a href="https://{{$social_links->google_plus}}" target="_blank" class="google-plus"><i
                            class='bx bxl-google-plus'></i></a>
                    @endif

                    @if ($social_links->linkedin)
                    <a href="https://{{$social_links->linkedin}}" target="_blank" class="linkedin"><i
                            class="bx bxl-linkedin"></i></a>
                    @endif

                    @if ($social_links->youtube)
                    <a href="https://{{$social_links->youtube}}" target="_blank" class="youtube"><i
                            class='bx bxl-youtube'></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>