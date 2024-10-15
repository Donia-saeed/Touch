@extends('layouts.dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Create New Operation</h3>
                            </div>

                            <form method="POST" action="{{ route('operations.store') }}" novalidate>
                                @csrf
                                <div class="card-body">
                                    <!-- Title Input Field -->
                                    <div class="form-group mb-3">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            class="form-control @error('title') is-invalid @enderror w-75"
                                            id="title"
                                            name="title"
                                            placeholder="Enter title for your operation"
                                            value="{{ old('title') }}"
                                            required
                                        >
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Description Input Field -->
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea
                                            class="form-control @error('description') is-invalid @enderror w-75"
                                            id="description"
                                            name="description"
                                            rows="3"
                                            placeholder="Enter description for your operation">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Amount Input Field -->
                                    <div class="form-group mb-3">
                                        <label for="amount">Amount <span class="text-danger">*</span></label>
                                        <div class="input-group w-50">
                                            <input
                                                type="number"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                id="amount"
                                                name="amount"
                                                placeholder="Enter amount for your operation"
                                                value="{{ old('amount') }}"
                                                required
                                            >
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Type Radio Buttons -->
                                    <div class="form-group mb-3">
                                        <label for="type">Type <span class="text-danger">*</span></label>
                                        <div class="d-flex gap-4">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="type"
                                                    id="type_expenses"
                                                    value="0"
                                                    {{ old('type') == '0' ? 'checked' : '' }}
                                                    required
                                                >
                                                <label class="form-check-label" for="type_expenses">
                                                    Expenses
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="type"
                                                    id="type_income"
                                                    value="1"
                                                    {{ old('type') == '1' ? 'checked' : '' }}
                                                    required
                                                >
                                                <label class="form-check-label" for="type_income">
                                                    Income
                                                </label>
                                            </div>
                                        </div>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
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
