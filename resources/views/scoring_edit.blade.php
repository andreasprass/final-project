@extends('layout_Dashboard.layoutDashboard',[
'active' => 'scoring',
'title' => 'Penilaian',
])
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
                <h5 class="card-title">Edit Score Data</h5>
                <form action="{{ route('scoring_update') }}" method="post" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="" disabled value="{{ old('user_id', $data_id->users->name) }}"/>
                            @foreach ($update as $data)
                                <input type="hidden" class="form-control" id="id" name="id[]" value="{{ old('id', $data->id) }}"/>
                                {{-- <input type="hidden" class="form-control" id="user_id" name="user_id[]" value="{{ old('user_id', $data->user_id) }}"/> --}}
                            @endforeach
                            
                        </div>
                    </div>
                    @foreach($update as $data)
                    <div class="row mb-3">
                        <label for="criteria-name" class="col-sm-2 col-form-label">{{ $data->criteria->criteria }}</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="criteria_id" name="criteria_id[]" value="{{ $data->criteria_id }}"/>
                            <input type="number" class="form-control" id="score" name="score[]" required  value="{{ old('score', $data->score) }}"/>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1"><a href="{{ route('scoring') }}"><button type="button" class="btn btn-secondary">Back</button></a></div>
                        <div class="col-sm-2"><button type="submit" class="btn btn-warning">Save Data</button></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
@endsection