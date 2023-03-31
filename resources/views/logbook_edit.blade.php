@extends('layout_Dashboard.layoutDashboard')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Logbook Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Logbook</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle me-1"></i> A simple info alert with icon—check it out! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body ">
                <h5 class="card-title">{{ $update->users->name }}'s Logbook</h5>
                <form action="{{ route('logbook_update') }}" method="post">
                    @csrf
                    @method('put')
                    <!-- Quill Editor Default -->
                    <div id="editor"></div>
                    <!-- End Quill Editor Default -->
                    <input name="logbook" type="hidden" value="{{ $update->logbook }}"></input>
                    <input name="id" type="hidden" value="{{ $update->id }}"></input>
                    <div>
                        <a href="{{ route('get_logbook') }}"><button type="button"  class="btn btn-secondary mt-3">Back</button></a>
                        <button type="submit" onclick="submitQuill()" class="btn btn-warning mt-3">Submit Logbook</button>
                    </div>
                </form>
            </div>
        </div>
        
    </section>
</main>
@endsection