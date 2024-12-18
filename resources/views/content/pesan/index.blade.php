@extends('content.app')

@section('content')
    <div class="position-relative overflow-hidden">
        <div class="position-relative overflow-hidden rounded-3">
        <img src="{{ asset('assets/images/backgrounds/banner.png') }}" alt="" class="w-100">
        </div>
    </div>
    <section
          class="hero-section bg-body-secondary position-relative overflow-hidden"
        >
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="text-center pt-5">
                  <h1 style="text-align: center; font-family: 'Mikado', sans-serif; font-weight: 900; margin: 0;">
                    <span style="color: #90C659;">THE GRAND TAMAN SAFARI PRIGEN</span><br>
                    <span style="color: #274E13;">TIKET UMUM</span>
                </h1>
                <div style="text-align: center; margin-top: 10px;">
                    <span style="display: inline-block; width: 80px; height: 6px; background-color: #274E13;"></span>
                </div>
                <br>
                <br>
                </div>
            </div>
            <div class="row">
              @foreach ($tikets as $tiket)
              <!-- column -->
              <div class="col-lg-4 col-md-6">
                <!-- Card -->
                <a href="{{ route('tickets.show', ['id' => $tiket->ID_KONTEN]) }}" style="text-decoration: none; color: inherit;">
                  <div class="card" style="cursor: pointer;">
                      <img class="card-img-top img-responsive" src="{{ asset('/assets/images/blog/blog-img1.png') }}" alt="Card image cap" style="width: 100%; height: auto;" />
                      <div class="card-body">
                          <h4 class="card-title" style="font-family: 'Mikado', sans-serif; font-size: 18px; font-weight: 900; color: #274E13; margin: 0 0 10px;">
                              {{ $tiket->TITLE }}
                          </h4>
                          <p class="card-text" style="font-size: 14px; color: #555; margin: 0 0 50px;">
                            {{ $tiket->DESCRIPSION }}
                          </p>
                          <span class="btn btn-primary" style="background-color: #274E13; border: 1px solid #274E13; color: #ffffff; padding: 10px 15px; text-decoration: none; border-radius: 0; font-weight: bold; font-size: 14px; position: absolute; bottom: 15px; right: 15px; display: inline-block;">
                            Beli Sekarang
                          </span>
                      </div>
                  </div>
                </a>
              </div>
              @endforeach
                <!-- Card -->
                </div>
                <!-- column -->
                </div>
                
        </div>
    </section>
@endsection
