@extends('layout_Dashboard.layoutDashboard',[
    'active'=> 'dashboard',
    'title' => 'Dashboard',
    ])
@section('main')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div> --}}

                            <div class="card-body">
                                <h5 class="card-title">User <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $user_count }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Kriteria <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-list-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $kriteria_count }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Penilaian <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $rekap_count }}</h6>
                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Customers Card -->
                    <div class="col-12">
                            <?php
                        $currentRekapId = null;
                        ?>
                        @foreach($rekapitulasi as $rekap)
                        <?php
                        // Check if the rekap_id has changed
                        if ($currentRekapId !== $rekap->id) {
                            $currentRekapId = $rekap->id;
                            $iteration = 1; // Reset iteration counter to 1
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title">{{ $rekap->nama_rekap }}</h5>
                                    </div>
                                    <div class="col-sm-6 p-3 d-flex justify-content-end">
                                        <a href="detail-penilaian/{{ $rekap->id }}" class="col-sm-5">
                                            <button type="button" class="btn btn-info btn-sm col-sm-12  text-white"><span class="bi bi-exclamation-circle"></span> Detail </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="">
                                    <table class="table display table-striped dt-responsive nowrap rekap" style="width:100%;" id="{{ $rekap->id }}">
                                        <thead>
                                            <tr>
                                                <th>Rangking</th>
                                                <th>Nama</th>
                                                <th>Nilai Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rankings as $rank)
                                            @if($rekap->id == $rank->id_rekap)
                                            <tr>
                                                <td>{{ $iteration}}</td>
                                                <td>{{ $rank->kandidatPenilaian->kandidats->name }}</td>
                                                <td>{{ $rank->nilai_ranking }}</td>
                                            </tr>
                                            <?php
                                                $iteration++; // Increment the iteration counter
                                            ?>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
 
                    </div>

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Komposisi Kriteria</h6> 
                        
                        <div id="chart" class=""></div>
                        <div class="mt-2">
                            <button class="btn btn-secondary btn-sm" id="download-svg">Download SVG</button>
                            <button class="btn btn-secondary btn-sm" id="download-png">Download PNG</button>
                        </div>
                    </div>
                    
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Jumlah Data Tiap Rekap</h6> 
                        
                        <div id="jumlah_nilai" class=""></div>
                        <div class="mt-2">
                            <button class="btn btn-secondary btn-sm" id="download2-svg">Download SVG</button>
                            <button class="btn btn-secondary btn-sm" id="download2-png">Download PNG</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- End Right side columns -->
        </div>
    </section>
</main>

@endsection

