<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  {{-- Public DataTable --}}
  <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.28.0/dist/apexcharts.min.css">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/favicon.png') }}" alt="">
        <span class="d-none d-lg-block">Career Network</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              @if(Auth::user()->div_id)
              <span>{{ Auth::user()->division->div_name }}</span>
              @else
              <span> - </span>
              @endif
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('myprofile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> --}}
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> --}}
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item d-flex align-items-center ">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                  </button> 
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ ($active === "dashboard") ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Halaman Utama</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ ($active === "department" || $active === "division" || $active === "user") ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manajamen User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content {{ ($active === "department" || $active === "division" || $active === "user") ? '' : 'collapse' }}" data-bs-parent="#sidebar-nav">
          
          {{-- <li>
            <a href="{{ route('get_positions') }}">
              <i class="bi bi-circle"></i><span>Position</span>
            </a>
          </li> --}}
          
          {{-- <li>
            <a href="{{ route('get_departments') }}" class="{{ ($active === "department" ) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Departemen</span>
            </a>
          </li>
          <li>
            <a href="{{ route('get_divisions') }}" class="{{ ($active === "division" ) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Divisi</span>
            </a>
          </li> --}}
          <li>
            <a href="{{ route('get_users') }}" class="{{ ($active === "user" ) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        {{-- <a class="nav-link {{ ($active === "criteria" || $active === "scoring" || $active === "ranking") ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Ranking</span><i class="bi bi-chevron-down ms-auto"></i>
        </a> --}}
        <a class="nav-link {{ ($active === "penilaian" || $active === "criteria") ? '' : 'collapsed' }}"  href="{{ route('get_rekap') }}">
          <i class="bi bi-journal-check"></i>
          <span>Penilaian</span>
        </a>
        <ul id="forms-nav" class="nav-content {{ ($active === "criteria" || $active === "scoring" || $active === "ranking") ? '' : 'collapsed' }} ">
          <li>
            <a href="{{ route('criterias') }}" class="{{ ($active === "criteria" ) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Kriteria</span>
            </a>
          </li>
          <li>
            <a href="{{ route('get_rekap') }}" class="{{ ($active === "penilaian") ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Rekap</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      {{-- <li class="nav-heading">Features</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('get_logbook') }}" >
          <i class="bi bi-book"></i>
          <span>Logbook</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}

    </ul>

  </aside><!-- End Sidebar-->

  @yield('main')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Career Network 2022</span></strong>. All Rights Reserved
    </div>
    {{-- <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div> --}}
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">--}}
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>

  {{-- Public DataTable --}}
  <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>

<!-- Include the dom-to-image library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

<!-- Include the downloadjs library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/downloadjs/1.4.7/download.min.js"></script>


@if(isset($krit) && isset($label))
<!-- Your existing script -->
<script type="text/javascript">
    var nilai = @json($krit);
    var labels = @json($label);
    var options = {
      chart: {
        type: 'bar'
      },
      series: [{
        name: 'sales',
        data: nilai,
      }],
      xaxis: {
        categories: labels,
      }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    // Function to download chart as SVG
    function downloadSVG() {
        domtoimage.toSvg(document.getElementById('chart'))
            .then(function (dataUrl) {
                download(dataUrl, 'komposisi-kriteria.svg');
            });
    }

    // Function to download chart as PNG
    function downloadPNG() {
        domtoimage.toPng(document.getElementById('chart'))
            .then(function (dataUrl) {
                download(dataUrl, 'komposisi-kriteria.png');
            });
    }

    // Attach event listeners to the buttons
    document.getElementById('download-svg').addEventListener('click', downloadSVG);
    document.getElementById('download-png').addEventListener('click', downloadPNG);
</script>
@endif

@if(isset($jumlah_nilai) && isset($label_data))
<!-- Your existing script -->
<script type="text/javascript">
  var jumlah_nilai = @json($jumlah_nilai);
  var label_data = @json($label_data);
   var options = {
          series: [{
          data: jumlah_nilai,
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: label_data,
        }
      };

        var jml_nilai = new ApexCharts(document.querySelector("#jumlah_nilai"), options);
        jml_nilai.render();

        // Function to download chart as SVG
        function downloadSVG() {
            domtoimage.toSvg(document.getElementById('jumlah_nilai'))
                .then(function (dataUrl) {
                    download(dataUrl, 'jumlah-nilai.svg');
                });
        }

        // Function to download chart as PNG
        function downloadPNG() {
            domtoimage.toPng(document.getElementById('jumlah_nilai'))
                .then(function (dataUrl) {
                    download(dataUrl, 'jumlah-nilai.png');
                });
        }

        // Attach event listeners to the buttons
        document.getElementById('download2-svg').addEventListener('click', downloadSVG);
        document.getElementById('download2-png').addEventListener('click', downloadPNG);
</script>
@endif
  <script type="text/javascript">
    $(function () {
        $("#users_table").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });
        $(".rekap").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });
        $("#ranking").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });
        $("#table.Dashboard").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });
        $("#normalisasi").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });
        $("#scoring").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });
    });
  </script>
  

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>