@extends('layout_Dashboard.layoutDashboard',[
'active' => 'penilaian',
'title' => 'Penilaian',
])
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Penilaian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Penilaian</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Rekap Penilaian</h5>
                <form action="{{ route('add_rekap') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Rekap Penilaian</label>
                        <div class="col-sm-10"><input type="text" class="form-control" id="nama_rekap" name="nama_rekap" /></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('get_rekap') }}"><button type="button" class="btn btn-secondary">Kembali</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-primary">Tambahkan Data</button></div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main>


@endsection