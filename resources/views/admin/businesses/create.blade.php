@extends('layouts.app')

@section('content')
<div class="container">
            
    <form action="{{ route('businesses.store') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">                        
        @csrf

        <div class="row">
            <div class="col-12">

                <section class="sub-header">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="pt-1">
                                    <span class="d-inline-block align-text-bottom mt-n2">
                                        <a href="{{ route('businesses.index') }}" class="text-decoration-none">
                                            <!-- <i class="fas fa-home"></i> -->
                                            Businesses
                                        </a>
                                        &nbsp; &raquo; &nbsp;
                                    </span>
                                    <h5 class="d-inline-block">Add Business</h5>               
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-none d-md-inline-block">
                                <ul class="submenu ml-auto mb-0 text-right">
                                    <li class="nav-item d-inline-block">
                                        <a type="cancel" href="{{ url()->previous() }}" class="btn btn-sm btn-default">Cancel</a>
                                    </li>

                                    <li class="nav-item d-inline-block">
                                        <button type="submit" class="btn btn-sm btn-primary btn-badge">
                                            <i class="fas fa-save mr-1"></i>
                                            Save Business
                                        </button>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>  
                <!-- <hr class="h-separator"> -->
            </div>
        </div>

        <div class="row justify-content-between mt-5 mb-4">

            <div class="col-md-5 col-sm-12 pr-5 ml-3">
                <h5 class="">A New Business</h5>
                <p><small>Before you can associate a business to a discount, that business must first be created. You can do that here. </small></p>

                <p><small>To add a new business, you will need the business name and a 250px by 250px (minimum) PNG logo. The click the save button. </small></p>

                <p><small>You may <em>optionally</em> invite a Business Manager to manage a business account, after creating the business. Managed invites and other settings within a businesses' profile. </small></p>

                <p><small>The more cities in which you create discounts for this business, the more cities this business will be associated with. </small></p>
            </div>

            <div class="col-md-6 col-sm-12 mr-3">

                <section class="card shadow-5">

                    <div class="card-body row">
                        <div class="col-md-12 mb-3">
                            <label for="name">Business Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Business Name" value="{{ old('name') }}" required="" name="name">
                            <div class="invalid-feedback" style="{{ $errors->has('name') ? 'display:block;' : '' }}">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="logo">Business Logo - 250px by 250px PNG</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo" aria-describedby="logo">
                                <label class="custom-file-label" for="logo">Upload Logo <em>(optional)</em></label>
                            </div>
                            <!-- dropzone here -->

                            <div class="invalid-feedback" style="{{ $errors->has('logo') ? 'display:block;' : '' }}">
                                {{ $errors->first('logo') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-sm-block d-md-none">
                        <ul class="submenu ml-auto mb-0 text-right">
                            <li class="nav-item d-inline-block">
                                <a type="cancel" href="{{ url()->previous() }}" class="btn btn-sm btn-default">Cancel</a>
                            </li>

                            <li class="nav-item d-inline-block">
                                <button type="submit" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-save mr-1"></i>
                                    Save State
                                </button>
                            </li>
                        </ul>
                    </div>

                </section>

            </div>
        </div>

    </form>

</div>
@endsection

@section('scripts')
<<script>
    $(document).on('change', '.custom-file-input', function (event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    });
</script>
@endsection