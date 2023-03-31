@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Scoring Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Scoring</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div>
        <a href="{{ route('get_scoring_add') }}"><button type="button" class="btn btn-primary btn-sm w-25 mb-3">Add Score</button></a>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Matrix Data</h5>
                <p>
                    Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table
                    you wish to conver to a datatable
                </p>
                <div class="dataTable-container">
                    <table class="table  stripe table-responsive" style="width:100%;">
                        <thead>
                            <tr>
                                <th><!-- Empty for the left top corner of the table --></th>
                                @foreach($columns as $criteria)
                                <th>{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $user => $columns)
                            <tr>
                                <td><strong>{{ $user }}</strong></td>
                                @foreach($columns as $criteria => $grade)
                                <td>{{ $grade }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection