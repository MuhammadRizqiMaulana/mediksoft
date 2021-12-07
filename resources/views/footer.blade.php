<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Produk Lisensi : PT Global Eushanosoft &copy; gloosoft.com
    </div>
    <!-- Default to the left -->
    <div class="row">
      <div class="col-2">
            <i class="far fa-calendar-alt"></i> : {{ date('d F Y') }}
      </div>
      <div class="col-1">
          <i class="far fa-clock"></i> : {{ date('H.i') }}
      </div>
      <div class="col-3">
        <i class="far fa-user"></i> Login : {{(Auth::check()) ? auth()->user()->nama : ''}}
      </div>
      <div class="col-4">
        <i class="far fa-id-card"></i> User Lisensi : PT Global Eushanosoft
      </div>
    </div>
</footer>