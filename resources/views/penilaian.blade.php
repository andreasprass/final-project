@extends('layout_Dashboard.layoutDashboard',[
'active' => 'penilaian',
])
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Rekap</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Rekap</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div>
        <a href="{{ route('get_add_rekap') }}"><button type="button" class="btn btn-primary btn-sm w-25 mb-3">Tambah Rekap Penilaian</button></a>
    </div>

    <section class="section">
        @foreach($rekapitulasi as $rekap)
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
                    <table class="table ranking stripe table-responsive" style="width:100%;" id="{{ $rekap->id }}">
                        <thead>
                            <tr>
                                <th>Rangking</th>
                                <th>Nama</th>
                                <th>Nilai Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jason</td>
                                <td>190</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Michael</td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Eric</td>
                                <td>170</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        
    </section>  
</main>


@endsection