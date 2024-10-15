@extends('layouts.dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Create New Budget</h3>
                            </div>

                            <form method="POST" action="{{ route('budgets.store') }}" novalidate>
                                @csrf
                                <div class="card-body">
                                    <!-- Name Input Field -->
                                    <div class="form-group mb-3">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror w-75"
                                            id="name"
                                            name="name"
                                            placeholder="Enter a name for your budget"
                                            value="{{ old('name') }}"
                                            required
                                        >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Form Submit Button -->
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
