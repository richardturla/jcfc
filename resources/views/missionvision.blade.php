@extends('landing_page.app')

@section('content')
<style>
    /* Keep left and right margin in mobile for mission/vision/philosophy */
    .mission-section {
    padding-left: 2rem;
    padding-right: 2rem;
    }

    @media (min-width: 992px) {
    .mission-section {
        padding-left: 0; /* Let Bootstrap control larger screens */
        padding-right: 0;
    }
    }

    .text-justify {
    text-align: justify;
    }

</style>

<main class="main">
<!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="text-center row d-flex justify-content-center">
            <h1>Mission, Vision & Philosophy</h1>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <br>
        <br>
        <br>
        <div class="row d-flex justify-content-center">
        <div class="mb-4 col-lg-8 mission-section">
            <h1>PHILOSOPHY</h1>
            <p class="mt-5 mb-5 text-justify">
                Jose C. Feliciano College Foundation believes that through quality education, man can make a positive difference in the socio-economic development of the nation thereby uplifting the quality of life of every Filipino and preserving the resources in the national and international environment.
            </p>
            </div>

            <div class="mb-4 col-lg-8 mission-section">
            <h1>MISSION</h1>
            <p class="mt-5 mb-5 text-justify">
                We provide holistic, responsive, and globally recognized academic and training programs.
            </p>
            </div>

            <div class="col-lg-8 mission-section">
            <h1>VISION</h1>
            <p class="mt-5 mb-5 text-justify">
                We shall be the premier academic community through quality education and training.
            </p>
        </div>
        </div>
    </section><!-- /Contact Section -->

</main>
@endsection
