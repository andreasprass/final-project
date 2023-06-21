@extends('layout_Dashboard.layoutDashboard',[
'active' => 'penilaian',
])
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">Rekap</li>
                <li class="breadcrumb-item active">Detail {{ $rekap->nama_rekap }}</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="d-flex justify-content-between">
        <div class="">
            <button type="button" class="btn btn-info btn-sm mb-3 text-white" data-bs-toggle="modal" data-bs-target="#tambahKriteriaModal">Tambah Kriteria <span><i class="bi bi-plus-circle"></i></span></button>
            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahKandidatModal">Tambah Kandidat <span><i class="bi bi-plus-circle"></i></span></button>
            
        </div>
        <div class="">
            <a href="{{ route('get_rekap') }}"><button type="button" class="btn btn-secondary btn-sm mb-3">Kembali</button></a>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $rekap->nama_rekap }}</h5>
                <div class="dataTable-container">
                    <table class="table  stripe table-responsive" style="width:100%;" id="detail_rekap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                @foreach($kriteriaPenilaian as $krit_pen)
                                <th>{{ $krit_pen->criteria->criteria }}</th>
                                @endforeach
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $det)
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="update_penilaian/" class="btn btn-warning"><span> <i class="bi bi-pencil"></i></span></a>
                                    <form action="delete_penilaian/" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span><i class="bi bi-trash"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kandidat Modal-->
        <div class="modal fade" id="tambahKandidatModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Nilai</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('add_kandidat',['id'=> request()->route('id')]) }}" id="tambahKandidatForm" method="POST" >
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="kandidat" class="col-sm-3 col-form-label">Nama Kandidat</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" id="kandidat" name="kandidat">
                                    <option selected="">Pilih Nama...</option>
                                    @foreach($kandidat as $kand)
                                    <option value="{{ $kand->id }}">{{ $kand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!-- End Nilai Modal-->

        <!-- Kriteria Modal-->
        <div class="modal fade" id="tambahKriteriaModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Kiteria</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahKriteriaForm">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="kriteria" class="col-sm-3 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" id="dept_id" name="dept_id">
                                    <option selected="">Pilih Kriteria...</option>
                                    @foreach($kriteria as $krit)
                                    <option value="{{ $krit->id }}">{{ $krit->criteria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-info text-white" id="tambahButton">Tambahkan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!-- End Nilai Modal-->
    </section>
</main>

@endsection