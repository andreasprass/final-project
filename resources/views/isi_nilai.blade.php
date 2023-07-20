@extends('layout_Dashboard.layoutDashboard',[
'active' => 'penilaian',
'title' => 'Penilaian',
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
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Isi Nilai</h5>
                <form action="{{ route('isi_nilai',['id_rekap' => $id_rekap, ]) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('put')
                    <input type="hidden" id="id_rekap" name="id_rekap" value="{{ $id_rekap }}">
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Kandidat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $kandidat->kandidats->name }}" disabled/>
                            
                        </div>
                    </div>
                    @foreach($data as $nil)
                    <input type="hidden" id="id" name="id[]" value="{{ $nil->id }}">
                    <input type="hidden" id="kandidat_penilaian" name="kandidat_penilaian[]" value="{{ $nil->kandidat_penilaian }}">
                    <div class="row mb-3">
                        <label for="inputPhone" class="col-sm-2 col-form-label">{{ $nil->kriteriaPenilaian->kriterias->criteria }}</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="kriteria_penilaian" name="kriteria_penilaian[]" value="{{ $nil->kriteria_penilaian }}">
                            <input type="text" class="form-control" id="nilai" name="nilai[]" value="{{ $nil->nilai }}">
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('get_detail_penilaian', ['id' => $id_rekap]) }}"><button type="button" class="btn btn-secondary">Kembali</button></a></div>
                        <div class="col-sm-2 ml-5"><button type="submit" class="btn btn-primary">Simpan Nilai</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection