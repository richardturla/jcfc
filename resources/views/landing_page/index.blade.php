@extends('landing_page.app')

@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="8000" data-bs-pause="false">
        <div class="carousel-inner">
            @foreach ($spotlights as $key => $spotlight)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/webcms/' . $spotlight->cover_image) }}" class="hero-bg" alt="">
                    <div class="overlay"></div>
                    <div class="carousel-caption">
                        <h2>{{ $spotlight->title }}</h2>
                        <p>{{ $spotlight->featured }}</p>
                        <a href="#" class="btn-get-started">Learn More</a>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <h1 class="mb-4 text-center events-header" data-aos="fade-up" data-aos-delay="100">Events</h1>
            <!-- MAIN EVENT -->
            @if($mainEvent)
                <div class="row about-row justify-content-center align-items-center main-event" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-5 col-md-6 events_image_div">
                        <img src="{{ asset('storage/webcms/' . $mainEvent->cover_image) }}" class="img-fluid events_image" alt="">
                    </div>

                    <div class="col-lg-5 col-md-6 content text-start">
                        <div class="text-block">
                            <h1>{{ strtoupper($mainEvent->title) }}</h1>
                            <p class="fst-italic">{!! $mainEvent->featured !!}</p>
                            <div class="text-end">
                                <a href="{{ route('webcms.showEvent', $mainEvent->id) }}" class="read-more">
                                    <span>Read More</span><i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- HORIZONTAL LINE -->
            <div class="my-4 horizontal-line"></div>

            <!-- SMALLER EVENTS -->
            <div class="row justify-content-center small-events">
                <h3 class="mb-4 text-center">Other Events</h3>
                @foreach ($smallEvents as $small)
                    <div class="col-auto small-event" data-aos="fade-up" data-aos-delay="300">
                        <div class="small-event-card">
                            <a href="{{ route('webcms.showEvent', $small->id) }}" class="text-decoration-none text-dark">
                                <img src="{{ asset('storage/webcms/' . $small->cover_image) }}" class="small-event-image" alt="">
                                <h5 class="small-event-title">{{ strtoupper($small->title) }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="text-center stats-item w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Students</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="text-center stats-item w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
              <p>Courses</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="text-center stats-item w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
              <p>Events</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="text-center stats-item w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
              <p>Trainers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Counts Section -->

    <!-- News Section -->
    <section id="news" class="py-5 section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="mb-5 text-center fw-bold" data-aos="fade-up" data-aos-delay="100">LATEST NEWS</h1>

            <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
                @forelse ($news as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="overflow-hidden border-0 shadow-sm card news-card h-100 rounded-3">
                            <a href="{{ route('webcms.showNews', $item->id) }}" class="text-decoration-none text-dark">

                                <div class="news-img-wrapper">
                                    @if($item->cover_image)
                                        <img src="{{ asset('storage/webcms/' . $item->cover_image) }}"
                                            alt="{{ $item->title }}"
                                            class="card-img-top news-img">
                                    @else
                                        <!-- Empty placeholder keeps layout consistent -->
                                        <div class="news-img-placeholder"></div>
                                    @endif
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="mb-2 fw-bold">{{ $item->title }}</h5>
                                    <p class="mb-3 text-muted flex-grow-1">{{ Str::limit($item->featured, 100) }}</p>
                                    <div class="mt-5 text-end">
                                        <!-- Read More fixed at bottom right -->
                                        <span class="bottom-0 mt-5 mb-3 read-more fw-semibold position-absolute end-0 me-3">
                                            Read More <i class="bi bi-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted">
                        <p>No news or announcements at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-5 text-center" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('webcms.news') }}" class="btn accent-btn">View All News</a>
            </div>

        </div>
    </section>
    <!-- /News Section -->

    <!-- Announcement Section -->
    <section id="announcement" class="py-5 section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="mb-5 text-center fw-bold" data-aos="fade-up" data-aos-delay="100">LATEST ANNOUNCEMENTS</h1>

            <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
                @forelse ($announcements as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="overflow-hidden border-0 shadow-sm card announcement-card h-100 rounded-3">
                            <a href="{{ route('webcms.showAnnouncement', $item->id) }}" class="text-decoration-none text-dark">
                                <div class="announcement-img-wrapper">
                                    @if($item->cover_image)
                                        <img src="{{ asset('storage/webcms/' . $item->cover_image) }}"
                                            alt="{{ $item->title }}"
                                            class="card-img-top announcement-img">
                                    @else
                                        <div class="announcement-img-placeholder"></div>
                                    @endif
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="mb-2 fw-bold">{{ $item->title }}</h5>
                                    <p class="mb-3 text-muted flex-grow-1">{{ Str::limit($item->featured, 100) }}</p>
                                    <div class="mt-auto text-end">
                                        <span class="read-more fw-semibold">
                                            Read More <i class="bi bi-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted">
                        <p>No announcements at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-5 text-center" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('webcms.news') }}" class="btn accent-btn">View All Announcements</a>
            </div>
        </div>
    </section>
    <!-- /Announcement Section -->


    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <i class="bi bi-eye" style="color: #ffbb2c;"></i>
              <h3><a href="" class="stretched-link">Lorem Ipsum</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item">
              <i class="bi bi-infinity" style="color: #5578ff;"></i>
              <h3><a href="" class="stretched-link">Dolor Sitema</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item">
              <i class="bi bi-mortarboard" style="color: #e80368;"></i>
              <h3><a href="" class="stretched-link">Sed perspiciatis</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item">
              <i class="bi bi-nut" style="color: #e361ff;"></i>
              <h3><a href="" class="stretched-link">Magni Dolores</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item">
              <i class="bi bi-shuffle" style="color: #47aeff;"></i>
              <h3><a href="" class="stretched-link">Nemo Enim</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item">
              <i class="bi bi-star" style="color: #ffa76e;"></i>
              <h3><a href="" class="stretched-link">Eiusmod Tempor</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="features-item">
              <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
              <h3><a href="" class="stretched-link">Midela Teren</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
            <div class="features-item">
              <i class="bi bi-camera-video" style="color: #4233ff;"></i>
              <h3><a href="" class="stretched-link">Pira Neve</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
            <div class="features-item">
              <i class="bi bi-command" style="color: #b2904f;"></i>
              <h3><a href="" class="stretched-link">Dirada Pack</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
            <div class="features-item">
              <i class="bi bi-dribbble" style="color: #b20969;"></i>
              <h3><a href="" class="stretched-link">Moton Ideal</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
            <div class="features-item">
              <i class="bi bi-activity" style="color: #ff5828;"></i>
              <h3><a href="" class="stretched-link">Verdo Park</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
            <div class="features-item">
              <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
              <h3><a href="" class="stretched-link">Flavor Nivelanda</a></h3>
            </div>
          </div><!-- End Feature Item -->

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                  <p class="category">Web Development</p>
                  <p class="price">$169</p>
                </div>

                <h3><a href="course-details.html">Website Design</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Antonio</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="mt-4 col-lg-4 col-md-6 d-flex align-items-stretch mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="course-item">
              <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                  <p class="category">Marketing</p>
                  <p class="price">$250</p>
                </div>

                <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-2-2.jpg" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Lana</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;42
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="mt-4 col-lg-4 col-md-6 d-flex align-items-stretch mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                  <p class="category">Content</p>
                  <p class="price">$180</p>
                </div>

                <h3><a href="course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-3-2.jpg" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Brandon</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;85
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>

    </section><!-- /Courses Section -->

    <!-- Trainers Index Section -->
    <section id="trainers-index" class="section trainers-index">

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Walter White</h4>
                <span>Web Development</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Trainers Index Section -->

  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
        document.addEventListener("DOMContentLoaded", function () {
            const heroCarousel = document.querySelector('#heroCarousel');
            const carousel = new bootstrap.Carousel(heroCarousel, {
                interval: 8000,
                pause: false,
                ride: 'carousel',
                wrap: true
            });

            // Resume smooth sliding after clicking arrows
            heroCarousel.addEventListener('slid.bs.carousel', () => {
                carousel.cycle();
            });
        });
    </script>

@endsection
