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
    @if(session()->has('fail'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('fail') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="d-flex justify-content-between">
        <div class="">
            <button type="button" class="btn btn-info btn-sm mb-3 text-white" data-bs-toggle="modal" data-bs-target="#tambahKriteriaModal">Pilih Kriteria <span><i class="bi bi-plus-circle"></i></span></button>
            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahKandidatModal">Pilih Kandidat <span><i class="bi bi-plus-circle"></i></span></button>
            <button type="button" class="btn btn-warning btn-sm mb-3 ">Hitung Nilai <span><i class="bi bi-calculator"></i></span></button>
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
                    <table class="table  stripe table-responsive" style="width:100%;" id="ranking">
                        <thead>
                            <tr>
                                <th>Name</th>
                                @foreach($daftarKriteria as $dkrit)
                                <th>
                                    {{ $dkrit->kriterias->criteria }}   
                                    <form action="{{ route('delete_kriteria_penilaian',['id' => $dkrit->id, 'id_rekap'=>$rekap->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Menghapus Kriteria {{ $dkrit->kriterias->criteria }} Akan Menghapus Nilai Kriteria {{ $dkrit->kriterias->criteria }} Pada Kandidat?')"><span><i class="bi bi-trash"></i></span></button>
                                    </form>
                                </th>
                                @endforeach
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarKandidat as $dkand)
                            <tr>
                                <td>{{ $dkand->kandidats->name }}</td>
                                @foreach($daftarKriteria as $dkrit)
                                <td>
                                    @foreach($nilai as $nil)
                                        @if ($nil->kandidat_penilaian == $dkand->id && $nil->kriteria_penilaian == $dkrit->id)
                                            {{ $nil->nilai }}
                                        @endif
                                    @endforeach
                                </td>
                                @endforeach
                                <td>
                                    <a href="{{ route('update_kandidat_penilaian', ['id'=> $dkand->id, 'id_rekap'=> $rekap->id]) }}" class="btn btn-warning"><span> <i class="bi bi-pencil"></i></span></a>
                                    <form action="{{ route('delete_kandidat_penilaian', ['id'=> $dkand->id, 'id_rekap'=> $rekap->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Menghapus Kandidat {{ $dkand->kandidats->name }} Akan Menghapus Seluruh Nilai Pada Kandidat?')"><span><i class="bi bi-trash"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Normalisasi Nilai</h5>
                <div class="dataTable-container">
                    <table class="table  stripe table-responsive" style="width:100%;" id="ranking">
                        <thead>
                            <tr>
                                <th>Name</th>
                                @foreach($daftarKriteria as $dkrit)
                                <th>{{ $dkrit->kriterias->criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarKandidat as $dkand)
                            <tr>
                                <td>{{ $dkand->kandidats->name }}</td>
                                @foreach($daftarKriteria as $dkrit)
                                <td>
                                    @foreach($nilai as $nil)
                                        @if ($nil->kandidat_penilaian == $dkand->id && $nil->kriteria_penilaian == $dkrit->id)
                                            {{ $nil->nilai }}
                                        @endif
                                    @endforeach
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ranking</h5>
                <div class="dataTable-container">
                    <table class="table  stripe table-responsive" style="width:100%;" id="ranking">
                        <thead>
                            <tr>
                                <th>Ranking</th>
                                <th>Name</th>
                                <th>Total Nilai</th>
                                @foreach($daftarKriteria as $dkrit)
                                <th>{{ $dkrit->kriterias->criteria }}</th>
                                @endforeach
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarKandidat as $dkand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dkand->kandidats->name }}</td>
                                <td>1000</td>
                                @foreach($daftarKriteria as $dkrit)
                                <td>
                                    @foreach($nilai as $nil)
                                        @if ($nil->kandidat_penilaian == $dkand->id && $nil->kriteria_penilaian == $dkrit->id)
                                            {{ $nil->nilai }}
                                        @endif
                                    @endforeach
                                </td>
                                @endforeach
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
                                <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                                    <option selected="">Pilih Nama...</option>
                                    @foreach($tambahKandidat as $kand)
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
                <form action="{{ route('add_kriteria',['id'=> request()->route('id')]) }}" id="tambahKriteriaForm"  method="POST">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="kriteria" class="col-sm-3 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" id="criteria_id" name="criteria_id">
                                    <option selected="">Pilih Kriteria...</option>
                                    @foreach($tambahKriteria as $krit)
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