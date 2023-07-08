<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sipa Politap</title>

  <!-- Custom fonts for this template-->
  <link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .bg-login-khadafi {
      /* background: url("https://source.unsplash.com/4rDCa5hBlCs/600x800"); */
      /* background: url("https://images.unsplash.com/photo-1687426158600-fe2ff990b7b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80/600x800"); */
      background: url("https://images.unsplash.com/photo-1654538437185-3c57bb290bb5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1951&q=80/600x800");
      background-position: center;
      background-size: cover;
    }
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-khadafi"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 text-uppercase"><strong>Sipa</strong> Politap</h1>
                  </div>

                  @if (session()->has('danger'))
                    <div class="alert alert-danger">
                      <span class="small">{{ session('danger') }}</span>
                    </div>
                  @endif

                  <form action="/login" class="user" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('userid') is-invalid @enderror"
                        id="userid" placeholder="User ID" name="userid" autofocus required
                        value="{{ old('userid') }}">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password"
                        placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                        <label class="custom-control-label" for="remember">Remember
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  {{-- Button Ubah Password Massal --}}
                  {{-- <form action="/gantipassword" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger mt-3"><i class="fas fa-trash"></i> Ubah semua
                      password</button>
                  </form> --}}
                  {{-- End --}}
                  <br><br><br><br><br><br>
                  <div class="text-left">
                    <span class="small">Copyright &copy; 2023 POLITAP. All rights reserved.</span>
                    <a href="https://github.com/muhammadkhadhafi?tab=repositories" target="_blank"
                      class="small text-info">Muhammad Khadafi</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/template/vendor/jquery/jquery.min.js"></script>
  <script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/template/js/sb-admin-2.min.js"></script>

</body>

</html>
