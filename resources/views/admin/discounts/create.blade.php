@extends('layouts.app')

@section('content')
<div class="container">
            
    <form action="{{ route('discounts.store') }}" class="needs-validation" novalidate="" method="POST">                        
        @csrf

        <div class="row">
            <div class="col-12">

                <section class="sub-header">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="pt-1">
                                    <span class="d-inline-block align-text-bottom mt-n2">
                                    	@if( !empty($business) )
	                                        <a href="{{ route('view.business', [ 'business' => $business->id ]) }}" class="text-decoration-none">
	                                            <!-- <i class="fas fa-home"></i> -->
	                                            {{ $business->name }}
	                                        </a>
	                                    @elseif( !empty($city) )
	                                        <a href="{{ route('view.city', [ 'city' => $city->id ]) }}" class="text-decoration-none">
	                                            <!-- <i class="fas fa-home"></i> -->
	                                            {{ $city->name }}
	                                        </a>
	                                    @else
	                                        <a href="{{ route('home') }}" class="text-decoration-none">
	                                            <i class="fas fa-home"></i>
	                                        </a>
	                                    @endif
                                        &nbsp; &raquo; &nbsp;
                                    </span>
                                    <h5 class="d-inline-block">Add Discount</h5>               
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
                                            Save Discount
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
               <!--  <h5 class="pb-2">Adding a New Discount</h5>
                <h6 class="">Code</h6>
                <p><small>The code is a random 6-12 character string that can be used to id the discount. A code is required. If you don't have a specific string, you can use the generator to create a random code.</small></p>
                <h6 class="">Title</h6>
                <p><small>The title is your discount headline. Be short and simple. Visible to public.</small></p>
                <p><small>Don't worry about whether this will negatively affect your users. You can add a state and nothing will show until you add cities. <em>Go get 'em, tiger!</em></small></p> -->

                <div class="discount-preview-wrapper sticky-top" style="top: 85px">
                	<div class="discount-preview-window">
                		<div class="begins_at">
                			Available beginning:
                			<div class="discount-begins_at-preview">10/15/2019</div>
                		</div>
                		<div class="business-logo-wrapper">
                			<div class="business-logo">
                				<img class="" src="{{ !empty($business) && $business->logo ? $business->logo : '' }}">
                			</div>
                		</div>
                		<div class="discount-title-preview">Get 50% Off Online On Cyber Monday</div>
            			<div class="discount-description-preview">During Cyber Monday, get 50% off any item purchased online through our website.</div>
            			<div class="call_to_action">
            				<a href="#" class="btn btn-lg btn-block btn-primary btn-badge cta-link">
            					<span class="discount-call_to_action-preview">Order Online Now</span>
            				</a>
            			</div>
            			<div class="discount-code">
            				<span>Discount code: </span>
            				<div class="discount-code-preview">19CYBER50</div>
            			</div>
                		
            			<div class="discount-terms-preview">Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit. Lorem ipsum gel ti desitrea foritit.</div>

            			<div class="expires_at">
            				<span>Expires: </span>
	            			<div class="discount-expires_at-preview">12/31/2019</div>
            			</div>

                	</div>
                </div>

            </div>

            <div class="col-md-6 col-sm-12 mr-3">

                <section class="card shadow-5 sticky-top" style="top:2rem;">

                    <div class="card-body row">
                    	<!-- begin: Business Select -->
                        <div class="col-md-12 mb-3">
                            <label for="business_id">Business</label>
                            <select class="custom-select" id="business_id" name="business_id">
                            	@if( !empty($business) )
                            		<option value="{{ $business->id }}" selected>{{ $business->name }}</option>
                            	@else
									<option selected>Choose...</option>
									@foreach($businesses as $business)
										<option value="{{ $business->id }}">{{ $business->name }}</option>
									@endforeach
								@endif
							</select>
                            <div class="invalid-feedback" style="{{ $errors->has('business_id') ? 'display:block;' : '' }}">
                                {{ $errors->first('business_id') }}
                            </div>
                        </div>
                        <!-- end: business select -->

                    	<!-- begin: Discount Title -->
                        <div class="col-md-12 mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title  (max:35 characters)" value="{{ old('title') }}" required="" name="title">
                            <div class="invalid-feedback" style="{{ $errors->has('title') ? 'display:block;' : '' }}">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                        <!-- end: discount title -->

                        <!-- begin: Discount Description -->
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Discount description" value="{{ old('description') }}" required="" name="description" rows="3"></textarea>
                            <div class="invalid-feedback" style="{{ $errors->has('description') ? 'display:block;' : '' }}">
                                {{ $errors->first('description') }}
                            </div>
                        </div>
                        <!-- end: discount description -->

                    	<!-- begin: Discount Call to Action -->
                        <div class="col-md-12 mb-3">
                            <label for="call_to_action">Call to Action</label>
                            <input type="text" class="form-control" id="call_to_action" placeholder="Call to Action  (max:25 characters)" value="{{ old('call_to_action') }}" required="" name="call_to_action">
                            <div class="invalid-feedback" style="{{ $errors->has('call_to_action') ? 'display:block;' : '' }}">
                                {{ $errors->first('call_to_action') }}
                            </div>
                        </div>
                        <!-- end: discount title -->

                    	<!-- begin: Discount Call to Action Link -->
                        <div class="col-md-12 mb-3">
                            <label for="cta_link">Call to Action Link</label>
                            <input type="text" class="form-control" id="cta_link" placeholder="https://" value="{{ old('cta_link') }}" required="" name="cta_link">
                            <div class="invalid-feedback" style="{{ $errors->has('cta_link') ? 'display:block;' : '' }}">
                                {{ $errors->first('cta_link') }}
                            </div>
                        </div>
                        <!-- end: discount title -->

                        <!-- begin: Discount Code -->
                        <div class="col-md-12 mb-3">
                    		<label for="code">Code</label>
                        	<div class="input-group">
								<input type="text" class="form-control" id="code" placeholder="Discount Code (6-12 characters)" value="{{ old('code') }}" required="" name="code" aria-described-by="codeGenerator">
								<div class="input-group-append">
									<button class="btn btn-primary btn-badge" type="button" id="codeGenerator">Generate Code</button>
								</div>
							</div>
                            <div class="invalid-feedback" style="{{ $errors->has('code') ? 'display:block;' : '' }}">
                                {{ $errors->first('code') }}
                            </div>
                        </div>
                        <!-- end: discount code -->

                        <!-- begin: Discount Terms  -->
                        <div class="col-md-12 mb-3">
                            <label for="terms">Terms</label>
                            <textarea type="text" class="form-control" id="terms" placeholder="Discount terms, i.e. 'Not valid on sale items'" value="{{ old('terms') }}" required="" name="terms" rows="3"></textarea>
                            <div class="invalid-feedback" style="{{ $errors->has('terms') ? 'display:block;' : '' }}">
                                {{ $errors->first('terms') }}
                            </div>
                        </div>
                        <!-- end: discount terms -->

                        <!-- begin: Discount Start Date -->
                        <div class="col-md-6 mb-3">
                            <label for="begins_at">Start Date</label>
                            <input type="text" class="form-control" id="begins_at" placeholder="Start date" value="{{ old('begins_at') }}" required="" name="begins_at">
                            <div class="invalid-feedback" style="{{ $errors->has('begins_at') ? 'display:block;' : '' }}">
                                {{ $errors->first('begins_at') }}
                            </div>
                        </div>
                        <!-- end: discount start date -->

                        <!-- begin: Discount Expiration Date -->
                        <div class="col-md-6 mb-3">
                            <label for="expires_at">Expiration Date</label>
                            <input type="text" class="form-control" id="expires_at" placeholder="Expiration date" value="{{ old('expires_at') }}" required="" name="expires_at">
                            <div class="invalid-feedback" style="{{ $errors->has('expires_at') ? 'display:block;' : '' }}">
                                {{ $errors->first('expires_at') }}
                            </div>
                        </div>
                        <!-- end: discount expiration date -->
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
	<script>
		$('input').change( function() {
			var text = $(this).val();
			var name = $(this).attr("name");
			var target = '.discount-' + name + '-preview';
			$(target).text(text);
		});

		$('textarea').change( function() {
			var text = $(this).val();
			var name = $(this).attr("name");
			var target = '.discount-' + name + '-preview';
			$(target).text(text);
		});
	</script>
@endsection