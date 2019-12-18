@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('businesses.store', [ 'state' => Request::segment(2) ]) }}" class="needs-validation" novalidate="" method="POST">                        
                @csrf
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="pt-2">
                            <span class="d-inline-block align-text-bottom mt-n2">
                                <a href="{{ route('businesses.index') }}">Businesses</a>
                                &nbsp; &raquo; &nbsp;
                            </span>
                            <h5 class="d-inline-block">Add New Business</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name">Business Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Business Name" value="{{ old('name') }}" required="" name="name">
                                <div class="invalid-feedback" style="{{ $errors->has('name') ? 'display:block;' : '' }}">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo" aria-describedby="logo">
                                    <label class="custom-file-label" for="logo">Upload Logo <em>(optional)</em></label>
                                </div>
                                <!-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <div class="form-buttons ml-auto">
                            <a type="cancel" href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Business</button>
                            </div>
                        </div>                  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection