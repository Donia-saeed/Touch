@extends('layouts.dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
               
                <div class="row">
                    <!-- left column -->
                    <div class="card mb-4 mt-4">
                
                        <div class="card-header">
                          <h3 class="card-title">create new budget</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('budgets.store') }}">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name for your budget">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">File input</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                            </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                          </div>
                          <!-- /.card-body -->
            
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">add</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
             

              
                        
            </div>
        </main>
    </div>
@endsection
