<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spike Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('auth/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('auth/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-6 col-lg-4 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('auth/assets/images/logos/logo.png') }}" width="180" alt="">
                </a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name" required>
                  </div>
                  <div class="mb-3">
                    <label for="username">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp"  name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="exampleInputtext1" aria-describedby="textHelp"  name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="exampleInputtext1" aria-describedby="textHelp"  name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputtext1" aria-describedby="textHelp"  name="password_confirmation" required>
                </div>
                  <button type="submit" class="btn btn-primary w-100 fs-4 mb-4 rounded-2">Register</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('auth/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('auth/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
