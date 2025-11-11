@extends('landing_page.app')

@section('content')
<style>
    /* ========== GLOBAL SECTION STYLING ========== */
    /* Adds side padding for mobile screens */
    .content-section {
        padding-left: 2rem;
        padding-right: 2rem;
    }

    @media (min-width: 992px) {
        .content-section {
            padding-left: 0; /* Let Bootstrap control larger screens */
            padding-right: 0;
        }
    }

    /* ========== TEXT UTILITIES ========== */
    .text-justify {
        text-align: justify;
    }

    /* ========== ADMISSION SECTION ========== */
    .admission-section h1 {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 1.5rem;
    }

    .requirements-list {
        list-style-type: disc;
        padding-left: 2rem;
        text-align: justify;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    /* Optional aesthetic improvements */
    .requirements-list li {
        margin-bottom: 0.5rem;
    }

</style>

<main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <h1>Admission Requirements</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Admission Requirements Section -->
    <section id="requirements" class="section admission-section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 content-section">
                <h1>Requirements</h1>
                <ul class="requirements-list">
                    <li>Admission Kit (Available at the Property Office)</li>
                    <li>SF9 / Report Card (Original & Photocopy)</li>
                    <li>PSA/NSO Birth Certificate (Photocopy)</li>
                    <li>2x2 Pictures (2 pcs)</li>
                    <li>Transfer Credentials (For College Transferees)</li>
                    <li>SF10 / Transcript of Records (Original)</li>
                </ul>
            </div>
        </div>
    </section>
</main>
@endsection
