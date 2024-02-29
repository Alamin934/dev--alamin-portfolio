<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{$about->section_title}}</h2>
            <p>{{$about->section_desc ?? ''}}</p>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset('storage/uploads/'.$about->user_photo)}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content">
                <h3>{{$about->position}}</h3>
                <p>{!!$about->summery!!}</p>
                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong>
                                <span>{{$about->dob}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                <span>{{$about->website}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                <span>{{$about->phone}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{$about->city}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{$about->age}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                <span>{{$about->degree}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                <span>{{$about->email}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                <span>{{$about->summery=='0' ? 'Not Available' : 'Available'}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>