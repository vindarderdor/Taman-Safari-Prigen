<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link
      rel="shortcut icon"
      type="image/png"
      href="{{ asset('') }}assets/images/logos/favicon.png"
    />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/styles.css" />

    <title>Spike Bootstrap Admin</title>
    <!-- Owl Carousel  -->
    <link
      rel="stylesheet"
      href="{{ asset('') }}assets/libs/owl.carousel/dist/assets/owl.carousel.min.css"
    />
    <link rel="stylesheet" href="{{ asset('') }}assets/libs/aos/dist/aos.css" />
  </head>

  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img
        src="{{ asset('') }}assets/images/logos/favicon.png"
        alt="loader"
        class="lds-ripple img-fluid"
      />
    </div>
    <div id="main-wrapper flex-column">
      <header class="header">
        <nav class="navbar navbar-expand-lg py-0">
          <div class="container">
            <a class="navbar-brand me-0 py-0" href="../main/index.html">
              <img
                src="{{ asset('') }}assets/images/logos/logo-light.svg"
                alt="img-fluid"
              />
            </a>
            <button
              class="navbar-toggler border-0 p-0 shadow-none"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar"
              aria-controls="offcanvasNavbar"
            >
              <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <div
              class="collapse navbar-collapse justify-content-center"
              id="navbarSupportedContent"
            >
              <ul class="navbar-nav align-items-center mb-2 mb-lg-0">
              </ul>
            </div>
            @if (!Auth::check())
            <li><a class="d-none d-lg-block btn btn-primary fs-3 rounded btn-hover-shadow rounded-pill px-4 py-2" href="/login">Login</a></li>
        @else
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="" value="Logout" class="d-none d-lg-block btn btn-primary fs-3 rounded btn-hover-shadow rounded-pill px-4 py-2">
                </form>
            </li>
        @endif
          </div>
        </nav>
      </header>
      <div class="body-wrapper overflow-hidden pt-0">
        <section
          class="hero-section bg-body-secondary position-relative overflow-hidden"
        >
          <div class="container">
            <div class="row justify-content-center pt-5">
              <div class="col-lg-9 pt-lg-5">
                <div class="text-center pt-5">
                  <h1
                    class="fw-bolder mb-4 fs-12"
                    data-aos="fade-up"
                    data-aos-delay="400"
                    data-aos-duration="1000"
                  >
                    Welcome to BookWise
                  </h1>
                  <p
                    class="fs-5 mb-5 fw-normal"
                    data-aos="fade-up"
                    data-aos-delay="600"
                    data-aos-duration="1000"
                  >
                  Your Gateway to Limitless Learning
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="production py-7 py-lg-5" id="production-template">
          <div class="container">
            <div class="deshboard-templete position-relative mt-5 mb-2">
              <div class="row">
                <div class="col-md-6 col-lg-4">
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="footer-part py-7 mt-8">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="text-center">
                <p class="mb-0">
                  All rights reserved by Spike Admin. Designed & Developed by<a
                    target="_blank"
                    class="text-primary text-hover-primary ms-1"
                    href="https://www.wrappixel.com/"
                    >Wrappixel</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <div
        class="offcanvas offcanvas-start modernize-lp-offcanvas"
        tabindex="-1"
        id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel"
      >
        <div class="offcanvas-header p-4">
          <img
            src="{{ asset('') }}assets/images/logos/logo-light.svg"
            alt=""
            class="img-fluid"
            width="150"
          />
        </div>
        <div class="offcanvas-body p-4">
          <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Demos <i class="ti ti-chevron-down fs-14"></i
              ></a>
              <ul class="dropdown-menu ps-2">
                <li>
                  <a
                    class="dropdown-item text-dark"
                    target="_blank"
                    href="../dark/index.html"
                    >Dark</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-dark"
                    target="_blank"
                    href="../horizontal/index.html"
                    >Horizontal</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-dark"
                    target="_blank"
                    href="../main/index.html"
                    >main</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-dark"
                    target="_blank"
                    href="../minisidebar/index.html"
                    >Minisidebar</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-dark"
                    target="_blank"
                    href="../rtl/index.html"
                    >RTL</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item mt-3 dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Pages <i class="ti ti-chevron-down fs-14"></i
              ></a>
              <div class="dropdown-menu mt-3 ps-1">
                <!-- apps -->
                <div class="row">
                  <div class="col-12">
                    <div class="position-relative">
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-chat.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Chat Application
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >New messages arrived</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-invoice.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Invoice App
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Get latest invoice</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-mobile.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Contact Application
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >2 Unsaved Contacts</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-message-box.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Email App
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Get new emails</span
                          >
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="position-relative">
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-cart.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            User Profile
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >learn more information</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-date.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Calendar App
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Get dates</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-lifebuoy.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Contact List Table
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Add new contact</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-7 position-relative lh-base"
                      >
                        <div
                          class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('') }}assets/images/svgs/icon-dd-application.svg"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Notes Application
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >To-do and Daily tasks</span
                          >
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <!-- quick links -->
                    <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                    <ul class="list-unstyled px-1">
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/page-pricing.html"
                          >Pricing Page</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/authentication-login.html"
                          >Authentication Design</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/authentication-register.html"
                          >Register Now</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/authentication-error.html"
                          >404 Error Page</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/app-notes.html"
                          >Notes App</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/page-user-profile2.html"
                          >User Application</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="../main/page-account-settings.html"
                          >Account Settings</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item mt-3">
              <a
                class="nav-link fs-3 text-dark"
                aria-current="page"
                href="../docs/index.html"
                >Documentation</a
              >
            </li>
            <li class="nav-item mt-3">
              <a class="nav-link fs-3 text-dark" href="#">Pages</a>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <a
              class="btn btn-primary btn-hover-shadow rounded-pill w-100"
              href="https://discord.com/invite/eMzE8F6Wqs"
              >Live Help</a
            >
          </form>
        </div>
      </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('') }}assets/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('') }}assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('') }}assets/js/theme/app.init.js"></script>
    <script src="{{ asset('') }}assets/js/theme/theme.js"></script>
    <script src="{{ asset('') }}assets/js/theme/app.min.js"></script>
    <script src="{{ asset('') }}assets/js/theme/sidebarmenu.js"></script>
    <script src="{{ asset('') }}assets/js/theme/feather.min.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('') }}assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}assets/libs/aos/dist/aos.js"></script>
    <script src="{{ asset('') }}assets/js/landingpage/landingpage.js"></script>
  </body>
</html>
