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
      href="{{ asset('') }}landing/assets/images/logos/favicon.png"
    />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('') }}landing/assets/css/styles.css" />

    <title>Spike Bootstrap Admin</title>
    <!-- Owl Carousel  -->
    <link
      rel="stylesheet"
      href="{{ asset('') }}landing/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css"
    />
    <link rel="stylesheet" href="{{ asset('') }}landing/assets/libs/aos/dist/aos.css" />
  </head>

  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img
        src="{{ asset('') }}landing/assets/images/logos/favicon.png"
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
                src="{{ asset('') }}landing/assets/images/logos/logo-light.svg"
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
                {{-- <li class="nav-item dropdown hover-dd mega-dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Demos
                    <span class="d-flex align-items-center">
                      <i class="ti ti-chevron-down"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-animate-up p-4 border">
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                        <h5 class="fs-5 fw-bolder">Different Demos</h5>
                        <h6 class="text-muted">Included with the Package</h6>
                      </div>
                    </div>
                    <div class="row justify-content-center my-4">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/demos/demo-main.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../main/index.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Main
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/demos/demo-dark.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../dark/index.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Dark
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/demos/demo-horizontal.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../horizontal/index.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Horizontal
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/demos/demo-minisidebar.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../minisidebar/index.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Minisidebar
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/demos/demo-rtl.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../rtl/index.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">RTL</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center mb-4">
                      <div class="col-md-12">
                        <h5 class="fs-5 fw-semibold mt-8">Different Apps</h5>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-lg-12">
                        <div class="row justify-content-between">
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/apps/app-calendar.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../main/app-calendar.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Calendar
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/apps/app-chat.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../main/app-chat.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Chat
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/apps/app-email.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../main/app-email.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Email
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/apps/app-contact.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../main/app-contact2.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Contact
                            </h6>
                          </div>
                          <div class="col">
                            <div
                              class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                            >
                              <img
                                src="{{ asset('') }}landing/assets/images/apps/app-invoice.jpg"
                                alt=""
                                class="img-fluid"
                              />
                              <a
                                target="_blank"
                                href="../main/app-invoice.html"
                                class="btn btn-primary lp-demos-btn fs-2 py-1 px-2 rounded-pill position-absolute top-50 start-50 translate-middle"
                                >Live Preview</a
                              >
                            </div>
                            <h6 class="mb-0 text-center fw-bolder fs-3">
                              Invoice
                            </h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </ul>
                </li> --}}
                {{-- submenu --}}
                {{-- <li
                  class="nav-item dropdown hover-dd mega-dropdown pages-dropdown"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Pages
                    <span class="d-flex align-items-center">
                      <i class="ti ti-chevron-down"></i>
                    </span>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-animate-up py-0 border"
                  >
                    <div class="row">
                      <div class="col-md-8">
                        <div class="p-4">
                          <div>
                            <div class="row">
                              <div class="col-6">
                                <div class="position-relative">
                                  <a
                                    target="_blank"
                                    href="../main/app-chat.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-chat.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Chat Application
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >New messages arrived</span
                                      >
                                    </div>
                                  </a>
                                  <a
                                    target="_blank"
                                    href="../main/app-invoice.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-invoice.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Invoice App
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >Get latest invoice</span
                                      >
                                    </div>
                                  </a>
                                  <a
                                    target="_blank"
                                    href="../main/app-contact2.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-mobile.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Contact Application
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >2 Unsaved Contacts</span
                                      >
                                    </div>
                                  </a>
                                  <a
                                    target="_blank"
                                    href="../main/app-email.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-message-box.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Email App
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >Get new emails</span
                                      >
                                    </div>
                                  </a>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="position-relative">
                                  <a
                                    target="_blank"
                                    href="../main/page-user-profile2.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-cart.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        User Profile
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >learn more information</span
                                      >
                                    </div>
                                  </a>
                                  <a
                                    target="_blank"
                                    href="../main/app-calendar.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-date.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Calendar App
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >Get dates</span
                                      >
                                    </div>
                                  </a>
                                  <a
                                    target="_blank"
                                    href="../main/app-contact.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-lifebuoy.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Contact List Table
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >Add new contact</span
                                      >
                                    </div>
                                  </a>
                                  <a
                                    target="_blank"
                                    href="../main/app-notes.html"
                                    class="d-flex align-items-center pb-6 position-relative lh-base"
                                  >
                                    <div
                                      class="bg-light rounded me-3 p-8 d-flex align-items-center justify-content-center"
                                    >
                                      <img
                                        src="{{ asset('') }}landing/assets/images/svgs/icon-dd-application.svg"
                                        alt=""
                                        class="img-fluid"
                                        width="24"
                                        height="24"
                                      />
                                    </div>
                                    <div class="d-inline-block">
                                      <h6
                                        class="mb-1 fw-semibold text-hover-primary"
                                      >
                                        Notes Application
                                      </h6>
                                      <span
                                        class="fs-2 d-block fw-normal text-muted"
                                        >To-do and Daily tasks</span
                                      >
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="position-relative p-4 border-start h-100">
                          <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                          <ul class="list-unstyled">
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/page-pricing.html"
                                >Pricing Page</a
                              >
                            </li>
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/authentication-login.html"
                                >Authentication Design</a
                              >
                            </li>
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/authentication-register.html"
                                >Register Now</a
                              >
                            </li>
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/authentication-error.html"
                                >404 Error Page</a
                              >
                            </li>
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/app-notes.html"
                                >Notes App</a
                              >
                            </li>
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/page-user-profile2.html"
                                >User Application</a
                              >
                            </li>
                            <li class="mb-3">
                              <a
                                class="fw-semibold text-dark text-hover-primary"
                                target="_blank"
                                href="../main/page-account-settings.html"
                                >Account Settings</a
                              >
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li> --}}
                {{-- <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="../docs/index.html"
                    target="_blank"
                    >Documentation</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="https://support.wrappixel.com/"
                    target="_blank"
                    >Support</a
                  >
                </li> --}}
              </ul>
            </div>
            {{-- <a
              class="d-none d-lg-block btn btn-primary fs-3 rounded btn-hover-shadow rounded-pill px-4 py-2"
              href="login"
              >Login</a
            > --}}
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
                  {{-- <div
                    class="d-sm-flex align-items-center justify-content-center gap-8 mb-8 pb-7"
                    data-aos="fade-up"
                    data-aos-delay="800"
                    data-aos-duration="1000"
                  >
                    <a
                      class="btn btn-primary rounded-pill d-block mb-3 mb-sm-0 scroll-link"
                      href="#production-template"
                      >Live Preview</a
                    >
                    <a
                      class="btn btn-outline-primary rounded-pill d-block"
                      href="../docs/index.html"
                      target="_blank"
                      >Documentation</a
                    >
                  </div> --}}
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
                  <div
                    class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                  >
                    <div class="bg-light p-3 pb-0">
                      <div
                        class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                      >
                        <img
                          src="{{ asset('') }}landing/assets/images/demos/demo-main.jpg"
                          alt=""
                          class="img-fluid"
                        />
                        <a
                          href="../main/index.html"
                          target="_blank"
                          class="btn btn-primary rounded-pill live-preview-btn"
                          >Live Preview</a
                        >
                      </div>
                    </div>
                    <div class="deshboard-templete-content p-3">
                      <a href="../main/index.html" target="_blank">
                        <h6 class="mb-1 fs-4">Main</h6>
                      </a>
                      <p class="mb-0">Demo</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div
                    class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                  >
                    <div class="bg-light p-3 pb-0">
                      <div
                        class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                      >
                        <img
                          src="{{ asset('') }}landing/assets/images/demos/demo-dark.jpg"
                          alt=""
                          class="img-fluid"
                        />
                        <a
                          href="../dark/index.html"
                          target="_blank"
                          class="btn btn-primary rounded-pill live-preview-btn"
                          >Live Preview</a
                        >
                      </div>
                    </div>
                    <div class="deshboard-templete-content p-3">
                      <a href="../dark/index.html" target="_blank">
                        <h6 class="mb-1 fs-4">Dark</h6>
                      </a>
                      <p class="mb-0">Demo</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div
                    class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                  >
                    <div class="bg-light p-3 pb-0">
                      <div
                        class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                      >
                        <img
                          src="{{ asset('') }}landing/assets/images/demos/demo-horizontal.jpg"
                          alt=""
                          class="img-fluid"
                        />
                        <a
                          href="../horizontal/index.html"
                          target="_blank"
                          class="btn btn-primary rounded-pill live-preview-btn"
                          >Live Preview</a
                        >
                      </div>
                    </div>
                    <div class="deshboard-templete-content p-3">
                      <a href="../horizontal/index.html" target="_blank">
                        <h6 class="mb-1 fs-4">Horizontal</h6>
                      </a>
                      <p class="mb-0">Demo</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div
                    class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                    data-aos="fade-up"
                    data-aos-delay="400"
                    data-aos-duration="1000"
                  >
                    <div class="bg-light p-3 pb-0">
                      <div
                        class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                      >
                        <img
                          src="{{ asset('') }}landing/assets/images/demos/demo-minisidebar.jpg"
                          alt=""
                          class="img-fluid"
                        />
                        <a
                          href="../minisidebar/index.html"
                          target="_blank"
                          class="btn btn-primary rounded-pill live-preview-btn"
                          >Live Preview</a
                        >
                      </div>
                    </div>
                    <div class="deshboard-templete-content p-3">
                      <a href="../minisidebar/index.html" target="_blank">
                        <h6 class="mb-1 fs-4">Minisidebar</h6>
                      </a>
                      <p class="mb-0">Demo</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div
                    class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                    data-aos="fade-up"
                    data-aos-delay="400"
                    data-aos-duration="1000"
                  >
                    <div class="bg-light p-3 pb-0">
                      <div
                        class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                      >
                        <img
                          src="{{ asset('') }}landing/assets/images/demos/demo-rtl.jpg"
                          alt=""
                          class="img-fluid"
                        />
                        <a
                          href="../rtl/index.html"
                          target="_blank"
                          class="btn btn-primary rounded-pill live-preview-btn"
                          >Live Preview</a
                        >
                      </div>
                    </div>
                    <div class="deshboard-templete-content p-3">
                      <a href="../rtl/index.html" target="_blank">
                        <h6 class="mb-1 fs-4">RTL</h6>
                      </a>
                      <p class="mb-0">Demo</p>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="mt-5">
                <div
                  class="badge text-bg-primary text-center mb-7 fs-4 py-6 px-4 d-table mx-auto rounded-pill"
                >
                  Apps
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="200"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-calendar.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/app-calendar.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/app-calendar.html">
                          <h6 class="mb-1 fs-4">Calendar</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="200"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-chat.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/app-chat.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/app-chat.html">
                          <h6 class="mb-1 fs-4">Chat</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="200"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-email.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/app-email.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/app-email.html">
                          <h6 class="mb-1 fs-4">Email</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="400"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-contact.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/app-contact2.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/app-contact2.html">
                          <h6 class="mb-1 fs-4">Contact</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="400"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-invoice.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/app-invoice.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/app-invoice.html">
                          <h6 class="mb-1 fs-4">Invoice</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="400"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-contact-list.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/app-contact.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/app-contact.html">
                          <h6 class="mb-1 fs-4">Contact List</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="600"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/page-user-profile2.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/page-user-profile2.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a
                          target="_blank"
                          href="../main/page-user-profile2.html"
                        >
                          <h6 class="mb-1 fs-4">User Profile</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="600"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-blog.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/blog-posts.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/blog-posts.html">
                          <h6 class="mb-1 fs-4">Blog</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="600"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-blog-details.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/blog-detail.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/blog-detail.html">
                          <h6 class="mb-1 fs-4">Blog Detail</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="800"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/eco-shop2.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/eco-shop2.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/eco-shop2.html">
                          <h6 class="mb-1 fs-4">eCommerce Shop</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="800"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-shop-details.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/eco-shop-detail2.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/eco-shop-detail2.html">
                          <h6 class="mb-1 fs-4">eCommerce Detail</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="800"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-product-list.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/eco-product-list.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/eco-product-list.html">
                          <h6 class="mb-1 fs-4">eCommerce List</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div
                      class="deshboard-templete-items rounded-3 border position-relative overflow-hidden mb-4"
                      data-aos="fade-up"
                      data-aos-delay="1000"
                      data-aos-duration="1000"
                    >
                      <div class="bg-light p-3 pb-0">
                        <div
                          class="deshboard-templete-img rounded-top-2 overflow-hidden position-relative"
                        >
                          <img
                            src="{{ asset('') }}landing/assets/images/apps/app-checkout.jpg"
                            alt=""
                            class="img-fluid"
                          />
                          <a
                            target="_blank"
                            href="../main/eco-checkout.html"
                            class="btn btn-primary rounded-pill live-preview-btn"
                            >Live Preview</a
                          >
                        </div>
                      </div>
                      <div class="deshboard-templete-content p-3">
                        <a target="_blank" href="../main/eco-checkout.html">
                          <h6 class="mb-1 fs-4">eCommerce Checkout</h6>
                        </a>
                        <p class="mb-0">Application</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
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
            src="{{ asset('') }}landing/assets/images/logos/logo-light.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-chat.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-invoice.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-mobile.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-message-box.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-cart.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-date.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-lifebuoy.svg"
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
                            src="{{ asset('') }}landing/assets/images/svgs/icon-dd-application.svg"
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
    <script src="{{ asset('') }}landing/assets/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('') }}landing/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}landing/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('') }}landing/assets/js/theme/app.init.js"></script>
    <script src="{{ asset('') }}landing/assets/js/theme/theme.js"></script>
    <script src="{{ asset('') }}landing/assets/js/theme/app.min.js"></script>
    <script src="{{ asset('') }}landing/assets/js/theme/sidebarmenu.js"></script>
    <script src="{{ asset('') }}landing/assets/js/theme/feather.min.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('') }}landing/assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}landing/assets/libs/aos/dist/aos.js"></script>
    <script src="{{ asset('') }}landing/assets/js/landingpage/landingpage.js"></script>
  </body>
</html>
