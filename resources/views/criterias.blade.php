@extends('layout_Dashboard.layoutDashboard',[
'active' => 'criteria',
'title' => 'Kriteria',
])
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Criteria Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Criteria</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div>
        <a href="{{ route('get_criteria_add') }}"><button type="button" class="btn btn-primary btn-sm w-25 mb-3">Add Criteria</button></a>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Kriteria</h5>
                <div class="dataTable-container">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="users_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Criteria</th>
                                <th>Min / Max</th>
                                <th>Weight</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criteria_data as $crit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $crit->criteria }}</td>
                                <td>{{ ucfirst($crit->minMax) }}</td>
                                <td>{{ $crit->weight }}</td>
                                <td>
                                    <a href="{{ route('criteria_edit',['criteria_id'=>$crit->id]) }}" class="btn btn-warning"><span> <i class="bi bi-pencil"></i></span></a>
                                    
                                    <form action="{{ route('criteria_delete', ['criteria_id'=> $crit->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Menghapus Kriteria {{ $crit->criteria }} Akan Menghapus Seluruh Nilai Yang Terkait Dengan Kriteria Tersebut?')"><span><i class="bi bi-trash"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Criteria</th>
                                <th>Min / Max</th>
                                <th>Weight</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection