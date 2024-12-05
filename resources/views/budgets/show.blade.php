@extends('layouts.dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Budget</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{ auth()->user()->name }}</li>

                </ol>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            {{ $budget->name }}
                        </li>

                    </ol>
                </nav>
                <div class="row">

                    <div class="col col-md-4 col-sm-4">
                        <div class="card bg-primary text-white mb-4 text-center">
                            <div class="card-body fs-5">Balance</div>
                            <div class="card-footer fs-5 d-flex align-items-center justify-content-center">
                                <div>{{ '$3000' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4">
                        <div class="card bg-primary text-white mb-4 text-center">
                            <div class="card-body fs-5">Total Income</div>
                            <div class="card-footer fs-5 d-flex align-items-center justify-content-center">
                                <div>{{ '$4000' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4">
                        <div class="card bg-primary text-white mb-4 text-center">
                            <div class="card-body fs-5">Total Outcome</div>
                            <div class="card-footer fs-5 d-flex align-items-center justify-content-center">
                                <div>{{ '$1000' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-4 col-sm-4">
                            <a class="btn btn-warning text-white mb-4 w-10 mt-4 fs-5"
                            href="{{ route('operations.create' , $budget->id) }}"> Create New-Operation</a>

                        </div>
                    </div>



                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Financial operations
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>amount</th>
                                    <th>type</th>
                                    <th>actions</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($operations as $operation)
                                    <tr>
                                        <td>{{ $operation->title }}</td>
                                        <td>{{ $operation->description }}</td>
                                        <td>{{ $operation->amount }}</td>
                                        <td>{{ $operation->type }}</td>
                                        <td>
                                            <a href="{{ route('operations.edit', ['budget' => $budget->id, 'operation' => $operation->id]) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="deleteForm" action="{{ route('operations.destroy', ['budget' => $budget->id, 'operation' => $operation->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete()">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    </div>
@endsection
