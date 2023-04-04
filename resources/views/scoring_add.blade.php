@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Score Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Score</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Score Data</h5>
                <form action="{{ route('scoring_add') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="user_id" name="user_id[]">
                                <option selected>Choose User...</option>
                                @foreach ($users as $user)
                                    {{-- @if($user->id == $scorings->user_id) @continue @endif --}}
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach($criterias as $crit)
                    <div class="row mb-3">
                        <label for="criteria-name" class="col-sm-2 col-form-label">{{ $crit->criteria }}</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="criteria_id" name="criteria_id[]" value="{{ $crit->id }}"/>
                            <input type="number" class="form-control" id="score" name="score[]" />
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('scoring') }}"><button type="button" class="btn btn-secondary">Back</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-primary">Save Data</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection