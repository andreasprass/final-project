@extends('layout_Dashboard.layoutLogBookAcc')
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
                <h5 class="card-title">Today's Logbook</h5>
                <form action="{{ route('logbook_acc') }}" method="post">
                    @csrf
                    @method('put')
                    <!-- Quill Editor Default -->
                    <div id="editor-acc"></div>
                    <!-- End Quill Editor Default -->
                    <input name="logbook" type="hidden" value="{{ $acc->logbook }}"></input>
                    <input name="id" type="hidden" value="{{ $acc->id }}"></input>
                    <select name="accepted" class="form-select mt-3" aria-label="Default select example">
                        @if($acc->accepted == 1)
                        <option selected value="1">Approved</option>
                        <option value="2">Revision</option>
                        @elseif($acc->accepted == 2)
                        <option value="1">Approved</option>
                        <option selected value="2">Revision</option>
                        @else
                        <option selected>Choose Approval Status...</option>
                        <option value="1">Approved</option>
                        <option value="2">Revision</option>
                        @endif
                    </select>
                    <div>
                        <a href="{{ route('get_logbook') }}"><button type="button"  class="btn btn-secondary mt-3">Back</button></a>
                        <button type="submit" class="btn btn-info mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
        
    </section>
</main>
@endsection