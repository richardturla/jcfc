<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Jose C. Feliciano College Foundation</span>
          </a>
          <div class="pt-3 footer-contact">
            <p><i class="fa fa-map-marker"></i> JCFC Avenue, Dau Access Road, Brgy. Dau,</p>
            <p>Mabalacat City, Pampanga, Philippines</p>
            <p class="mt-3"><strong>Phone:</strong> <span>(045) 624 5211</span></p>
            <p><strong>Email:</strong> <span>info@jcfc.edu.ph</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>GET IN TOUCH</h4>
          <ul>
            <li><a href="{{ route('webcms.index') }}">Home</a></li>
            <li><a href="{{ route('webcms.about') }}">About us</a></li>
          </ul>
          <div class="mt-4 social-links d-flex">
            <a href="https://x.com/jcfcupdates"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/jcfcmarketing"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/jcfc.officialpage/"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Programs</a></li>
            <li><a href="#">Admission</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12">
            <img src="{{ asset('assets/img/logo.png') }}" alt="jcfc logo" style="width: 150px; height: auto; object-fit: contain;">
        </div>
      </div>
    </div>

    <div class="container mt-4 text-center copyright">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Jose C. Feliciano College Foundation</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <b>Designed and Developed by</b>: JCFC - Management Information Systems
      </div>
    </div>

</footer>
