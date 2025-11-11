<style>
    .navmenu .dropdown ul {
    left: 0 !important;
    top: calc(100% - 1px) !important;
    }

    .navmenu .dropdown ul ul {
    top: 0 !important;
    left: auto !important;
    right: calc(100% - 1px) !important;
    }

    .navmenu .dropdown ul {
    transition: opacity 0.2s ease, visibility 0.2s ease;
    }
    .navmenu .dropdown ul {
    z-index: 9999;
    }
    /* Show full name by default, hide abbreviation */
    .sitename .short {
    display: none;
    }

    /* On mobile view, switch to abbreviation */
    @media (max-width: 665px) {
    .sitename .full {
        display: none;
    }
    .sitename .short {
        display: inline;
    }
    }
</style>

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center">

      <a href="{{ route('webcms.index') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/logo.png') }}" alt="JCFC Logo">
        <h1 class="sitename">
            <span class="full">Jose C. Feliciano College Foundation</span>
            <span class="short">JCFC</span>
        </h1>

      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('webcms.index') }}" class="{{ request()->routeIs('webcms.index') ? 'active' : '' }}">Home<br></a></li>
          <li class="dropdown"><a href="#"><span>Programs</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>BASIC EDUCATION</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Kindergarten</a></li>
                  <li><a href="#">Complete Elementary Education</a></li>
                  <li><a href="#">Junior High School</a></li>
                  <li><a href="#">Senior High School</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>ACADEMIC TRACKS</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">STEM (Science, Technology, Engineering & Mathematics)</a></li>
                  <li><a href="#">ABM (Accountancy, Business and Management)</a></li>
                  <li><a href="#"> HUMSS (Humanities, Education and Social Sciences)</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>INSTITUTE OF CRIMINAL JUSTICE AND LAW ENFORCEMENT</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Bachelor Science in Criminology</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>INSTITUTE OF BUSINESS AND HOSPITALITY MANAGEMENT</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Bachelor of Science in Accountancy</a></li>
                  <li><a href="#">Bachelor of Science in Accounting Information System</a></li>
                  <li><a href="#">Bachelor of Science in Tourism Management</a></li>
                  <li><a href="#">Bachelor of Science in Business Administration Major in Marketing Management</a></li>
                  <li><a href="#">Bachelor of Science in Hospitality Management</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>INSTITUTE OF TEACHER EDUCATION</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Bachelor of Secondary Education Major in English</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>INSTITUTE OF MARITIME EDUCATION</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Bachelor of Science in Marine Transportation</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>TECHNICAL VOCATIONAL TRACKS</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Home Economics</a></li>
                  <li><a href="#">Industrial Arts</a></li>
                  <li><a href="#">Information and communication Technology</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Admissions</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('webcms.admissions-requirements') }}">Admission Requirements</a></li>
              <li><a href="#">Enrollment Procedures</a></li>
              <li><a href="#">Scholarshiop & Financial Aid details</a></li>
              <li><a href="#">Academic Calendar</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{ route('webcms.news-and-announcements-events-view') }}" class="{{ request()->routeIs('webcms.events') || request()->routeIs('webcms.showEvent') ||
          request()->routeIs('webcms.news') || request()->routeIs('webcms.showNews') || request()->routeIs('webcms.news-and-announcements-events-view') ? 'active' : '' }}"><span>News & Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('webcms.news') }}">Announcements</a></li>
              <li><a href="{{ route('webcms.events') }}">Upcoming Events</a></li>
              <li><a href="#">Press Releases</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{ route('webcms.about') }}" class="{{ request()->routeIs('webcms.about') ? 'active' : '' }}"><span>About</span><i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('webcms.mission-vision') }}">Mission & Vision</a></li>
                <li><a href="{{ route('webcms.history') }}">History</a></li>
                <li><a href="{{ route('webcms.about') }}">Contacts</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="courses.html">Apply Now</a>

    </div>
</header>
