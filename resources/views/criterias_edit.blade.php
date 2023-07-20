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

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Criteria Data</h5>
                <form action="{{ route('criteria_update',['criteria_id'=>$criteria->id]) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Criteria Name</label>
                        <div class="col-sm-10"><input type="text" class="form-control" id="criteria" name="criteria" value="{{ $criteria->criteria }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label for="minMax" class="col-sm-2 col-form-label">Min / Max</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="minMax" name="minMax">
                                @if($criteria->min)
                                <option value="min">Min (current)</option>
                                <option value="max">Max</option>
                                @else
                                <option value="max">Max (current)</option>
                                <option value="min">Min</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                        <div class="col-sm-10"><input type="number" class="form-control" id="weight" name="weight" value="{{ $criteria->weight }}"/></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('criterias') }}"><button type="button" class="btn btn-secondary">Back</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-warning">Update Data</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection