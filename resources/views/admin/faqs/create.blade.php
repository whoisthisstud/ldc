@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('faqs.store') }}" class="needs-validation" novalidate="" method="POST">
        @csrf

        <div class="row">
            <div class="col-12">

                <section class="sub-header">
                    <div class="container">

                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="pt-1">
                                    <span class="d-inline-block">
                                        <a href="{{ route('faqs.index') }}" class="text-decoration-none">
                                            <!-- <i class="fas fa-home"></i> -->
                                            FAQs
                                        </a>
                                        &nbsp; &raquo; &nbsp;
                                    </span>
                                    <h5 class="d-inline-block">Add FAQ</h5>
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
                                            Save FAQ
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

            <!-- <div class="col-md-5 col-sm-12 pr-5 ml-3">
                <h5 class="">A New FAQ</h5>
                <p><small>Adding a new state is a pretty big deal!</small></p>
                <p><small>Don't worry about whether this will negatively affect your users. You can add a state and nothing will show until you add cities. <em>Go get 'em, tiger!</em></small></p>
            </div> -->

            <div class="col-12 mr-3">

                <section class="card shadow-5">

                    <div class="card-body row">
                        <div class="col-12 col-md-9 mb-3">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" placeholder="Question" value="{{ old('question') }}" required="" name="question">
                            <div class="invalid-feedback" style="{{ $errors->has('question') ? 'display:block;' : '' }}">
                                {{ $errors->first('question') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="type">Question Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="city">City</option>
                                <option value="state">State</option>
                                <option value="discount">Discount</option>
                                <option value="business">Business</option>
                                <option disabled>──────────</option>
                                <<option value="general">General FAQ</option>}
                                option
                            </select>
                        </div>
                        <div class="col-12 col-md-9 mb-3">
                            <label for="answer">Answer</label>
                            <!-- <input type="text" class="form-control" id="answer" placeholder="Answer" value="" required="" name="answer"> -->
                            <textarea class="form-control" id="answer" name="answer" required="">{{ old('answer') }}</textarea>
                            <div class="invalid-feedback" style="{{ $errors->has('answer') ? 'display:block;' : '' }}">
                                {{ $errors->first('answer') }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 pt-4 mb-3">
                            <div class="custom-control custom-switch pt-2">
                                <input type="checkbox" checked class="custom-control-input" id="is_active">
                                <label class="custom-control-label" for="is_active">Active</label>
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
                                    Save FAQ
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
<script src="//cdn.ckeditor.com/4.13.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'answer' );
</script>
@endsection