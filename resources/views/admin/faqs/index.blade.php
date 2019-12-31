@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">

            <section class="sub-header">
                <div class="container">

                    <div class="row">
                        <div class="col-6 d-flex">
                            <div class="pt-1">
                                <span class="d-inline-block align-text-middle mt-n2 pt-1">
                                    <a href="{{ route('home') }}" class="text-decoration-none">
                                        <i class="fas fa-home"></i>
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">Frequently Asked Questions</h5>
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('faqs.create') }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add FAQ
                                </a>
                            </div>
                        </div>

                        <div class="col-6">
                            <ul class="submenu ml-auto mb-0 text-right">
                                <li class="nav-item d-inline-block">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-secondary btn-badge  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-file-download mr-1"></i>
                                            Export
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="exportBtn">
                                            <a class="dropdown-item" href="#">XLS</a>
                                            <a class="dropdown-item" href="#">CSV</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                        </div>
                                    </div>

                                </li>
                                <li class="nav-item d-inline-block">
                                    <a class="btn btn-sm btn-primary btn-badge" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
            <!-- <hr class="h-separator"> -->
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <section class="mt-5 mb-4">
                <div class="container">
                    <div class="row">
                    	<div class="col-12">

                    		@if( $faqs->count() > 0 )
	                    		<div class="accordion" id="faqs">

	                    			@foreach($faqs as $faq)
									<div class="card">
										<div class="card-header" id="q{{ $faq->id }}" data-toggle="collapse" data-target="#a{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="q{{ $faq->id }}">
											<h5 class="mb-0">
												{{ $faq->question }}

												@if(isset($faq->type))
													<span class="badge badge-warning float-right">{{ ucwords($faq->type) }}</span>
												@endif

												@if($faq->is_active)
													<span class="badge badge-primary ml-1">Active</span>
												@else
													<span class="badge badge-secondary ml-1">Inactive</span>
												@endif
											</h5>
										</div>

										<div id="a{{ $faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="q{{ $faq->id }}" data-parent="#faqs">
											<div class="card-body">{!! $faq->answer !!}</div>
										</div>
									</div>
									@endforeach
								</div>
		                    @else
		                    	<div class="d-block">
		                    		<h3>No FAQ's have been added.</h3>
		                    		<div class="text-center">
		                    			<a href="{{ route('faqs.create') }}" class="btn btn-lg btn-primary btn-badge">Add a FAQ</a>
		                    		</div>
		                    	</div>
		                    @endif

                    	</div>
                    </div>
                </div>
            </section>

        </div>
    </div>

</div>
@endsection
