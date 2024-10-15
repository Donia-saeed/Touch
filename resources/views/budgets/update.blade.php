@extends('layouts.dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <h3 class="card-title">update your budget-name</h3>
                        </div>

                        <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                           <input type="hidden" name="id" value="{{ $budget->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" class="form-control w-50" id="name" name="name"
                                        placeholder="edit your budget name " value="{{ old('name', $budget->name) }}">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




    </div>
    </main>
    </div>
@endsection
