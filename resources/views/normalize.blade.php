@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ranking Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Ranking</li>
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
                <h5 class="card-title">Normalisation</h5>
                <p>
                    Keterangan dengan (max) menunjukan bahwa semakin tinggi nilai pada <a href="{{ route('scoring') }}">Scoring</a> maka normalisasi akan mendekati 1. 
                    Jika (min) menunjukan semakin rendah nilai pada scoring maka nilai normalisasi akan mendekati 1 atau semakin tinggi.
                </p>
                <div class="dataTable-container">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="normalisation_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                @foreach ($criterias as $criterion)
                                    <th>{{ $criterion->criteria }} ({{ $criterion->min_max }})</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    @foreach ($criterias as $criterion)
                                        <td>{{ number_format($normalizedScores[$user->id][$criterion->id] ?? 0, 2) }}</td>
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
                <p>
                    Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table
                    you wish to conver to a datatable
                </p>
                <div class="dataTable-container">
                    <table class="table display table-striped dt-responsive nowrap" style="width:100%" id="ranking_table">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Total Score</th>
                                @foreach($criterias as $crit)
                                <th>{{ $crit->criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrix as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row['user_name'] }}</td>
                                    <td>{{ number_format($row['total_score'],2) }}</td>
                                    @foreach ($row['scores'] as $score)
                                        <td>{{ number_format($score['score'],2) }}</td>
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