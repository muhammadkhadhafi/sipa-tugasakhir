<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SIPA-Tugas Akhir">
  <meta name="author" content="Muhammad Khadafi">
  <meta name="nim" content="3042020026">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="/template/img/icons/icon-48x48.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

  <title>Sipa Politap</title>

  <link href="/template/css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  {{-- My CSS --}}
  <link rel="stylesheet" href="/assets/css/style.css">
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
</head>

<body>
  <div class="wrapper">
    @include('layouts.admin.partials.sidebar')

    <div class="main">
      @include('layouts.admin.partials.header')

      <main class="content">
        <div class="container-fluid p-0">
          @yield('container')
        </div>
      </main>

      @include('layouts.admin.partials.footer')
    </div>
  </div>

  <script src="/template/js/app.js"></script>

</body>

</html>
