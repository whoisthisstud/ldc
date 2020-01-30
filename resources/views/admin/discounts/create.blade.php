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

                <div class="discount-preview-wrapper sticky-top" style="top: 85px">
                	<div class="discount-preview-window shadow-5">
                		<div class="club-info">
                			Local Discount Club - 
                			<div class="discount-city-preview">Somewhereville, ST</div>
                		</div>
                		<div class="business-logo-wrapper">
                			<div class="business-logo">
                                @if( !empty($business) && $business->logo )
                				    <img class="business-logo-img" src="{{ $business->logo }}">
                                @else
                                    @if( !empty($business) )
                                        <span class="business-logo-name">{{ $business->name }}</span>
                                    @endif
                                @endif
                			</div>
                		</div>
                		<div class="discount-title-preview">Get 50% Off Online On Cyber Monday</div>
            			<div class="discount-description-preview">During Cyber Monday, get 50% off any item purchased online through our website.</div>

                        <div class="cta-wrapper">
                            <div class="call_to_action">
                                <a href="#" target="_blank" class="btn btn-lg btn-block btn-primary btn-badge cta-link">
                                    <span class="discount-call_to_action-preview">Order Online Now</span>
                                </a>
                            </div>
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

                        @if( !empty($business) )
                            <input hidden="" name="business_id" value="{{ $business->id }}">
                        @else
                            <!-- begin: Business Select -->
                            <div class="col-md-12 mb-3">
                                <label for="business_id">Business</label>
                                <select class="custom-select" id="business_id" name="business_id">
									<option selected>Choose...</option>
									@foreach($businesses as $business)
										<option value="{{ $business->id }}">{{ $business->name }}</option>
									@endforeach
    							</select>
                                <div class="invalid-feedback" style="{{ $errors->has('business_id') ? 'display:block;' : '' }}">
                                    {{ $errors->first('business_id') }}
                                </div>
                            </div>
                            <!-- end: business select -->
                        @endif

                        @if( !empty($city) )
                            <input hidden="" name="city_id" value="{{ $city->id }}">
                        @else
                            <!-- begin: Business Select -->
                            <div class="col-md-12 mb-3">
                                <label for="city_id">City</label>
                                <select class="custom-select" id="city_id" name="city_id">
                                    <option selected>Choose...</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}, {{ $city->state->abbreviation }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" style="{{ $errors->has('city_id') ? 'display:block;' : '' }}">
                                    {{ $errors->first('city_id') }}
                                </div>
                            </div>
                            <!-- end: business select -->
                        @endif

                    	<!-- begin: Discount Title -->
                        <div class="col-md-12 mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control update" id="title" placeholder="Title  (max:35 characters)" value="{{ old('title') }}" required="" name="title" maxlength="35">
                            <div class="invalid-feedback" style="{{ $errors->has('title') ? 'display:block;' : '' }}">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                        <!-- end: discount title -->

                        <!-- begin: Discount Description -->
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control update" id="description" placeholder="Discount description" value="{{ old('description') }}" required="" name="description" rows="3"></textarea>
                            <div class="invalid-feedback" style="{{ $errors->has('description') ? 'display:block;' : '' }}">
                                {{ $errors->first('description') }}
                            </div>
                        </div>
                        <!-- end: discount description -->

                        <!-- begin: CTA selection -->
                        <div class="col-md-12 mt-4 mb-3">
                            <div class="radio-block">
                                <label>
                                    <input type="radio" name="cta-options" id="linked" value="true" checked class="cta-options"/>
                                    <div class="link radio-block-box">
                                        <span>Link to Advertiser</span>
                                    </div>
                                </label>

                                <label>
                                    <input type="radio" name="cta-options" id="unlinked" value="false" class="cta-options"/>
                                    <div class="remove radio-block-box">
                                        <span>Remove Call to Action</span>
                                    </div>
                                </label>
                            </div>
                            <!-- <div class="btn-group btn-group-toggle btn-block radio-block" data-toggle="buttons">
                                <label class="btn btn-primary btn-badge active">
                                    <input type="radio" name="cta-options" id="linked" value="true" checked class="cta-options">
                                    <span class="radio-block-icon mr-2">
                                        <i class="fas fa-paperclip"></i>
                                    </span>
                                    Link to Advertiser
                                </label>
                                <label class="btn btn-danger btn-badge">
                                    <input type="radio" name="cta-options" id="unlinked" value="false" class="cta-options">
                                    <span class="radio-block-icon mr-2">
                                        <i class="fas fa-unlink"></i>
                                    </span>
                                    Remove Call to Action
                                </label>
                            </div> -->
                        </div>
                        <!-- end: CTA selection -->

                    	<!-- begin: Discount Call to Action -->
                        <div id="disc_cta" class="w-100 mb-3 mx-3">
                            <!-- begin: Discount Call to Action Text -->
                            <div  class="col-md-12 mb-3">
                                <label for="call_to_action">Call to Action</label>
                                <input type="text" class="form-control update" id="call_to_action" placeholder="Call to Action  (max:25 characters)" value="{{ old('call_to_action') }}" required="" name="call_to_action">
                                <div class="invalid-feedback" style="{{ $errors->has('call_to_action') ? 'display:block;' : '' }}">
                                    {{ $errors->first('call_to_action') }}
                                </div>
                            </div>
                            <!-- end: discount cta text -->

                            <!-- begin: Discount Call to Action Link -->
                            <div class="col-md-12 mb-3">
                                <label for="cta_link">Call to Action Link</label>
                                <input type="text" class="form-control update-link" id="cta_link" placeholder="https://" value="{{ old('cta_link') }}" required="" name="cta_link">
                                <div class="invalid-feedback" style="{{ $errors->has('cta_link') ? 'display:block;' : '' }}">
                                    {{ $errors->first('cta_link') }}
                                </div>
                            </div>
                            <!-- end: discount cta link -->
                        </div>

                        <!-- begin: Date Type selection -->
                        <div id="date_type" class="col-md-12 mt-4 mb-3">
                            <div class="btn-group btn-group-toggle btn-block radio-block" data-toggle="buttons">
                                <label class="btn btn-primary btn-badge active">
                                    <input type="radio" name="date-options" id="seasons" value="true" checked class="date-options">
                                    <span class="radio-block-icon mr-2">
                                        <i class="fas fa-paperclip"></i>
                                    </span>
                                    Use Seasons
                                </label>
                                <label class="btn btn-primary btn-badge">
                                    <input type="radio" name="date-options" id="customDate" value="false" class="date-options">
                                    <span class="radio-block-icon mr-2">
                                        <i class="fas fa-unlink"></i>
                                    </span>
                                    Use Custom Date
                                </label>
                            </div>
                        </div>
                        <!-- end: Date Type selection -->

                        @if( $city->seasons->count() > 0 )
                            <!-- begin: Season Select -->
                            <div class="col-md-12 mb-3">
                                <label for="season">Season</label>
                                <select class="custom-select" id="season" name="season">
                                    <option selected>Choose...</option>

                                    @foreach($city->seasons as $season)
                                        <option value="{{ $season->id }}"
                                            {{ $season->pivot->filled == true ? 'disabled' : '' }} data-begin-date="{{ date('m/d/y', strtotime($season->pivot->begins_on)) }}"
                                            data-end-date="{{ date('m/d/y', strtotime($season->pivot->ends_on)) }}"> {{ date('M jS, Y', strtotime($season->pivot->begins_on)) }} to {{ date('M jS, Y', strtotime($season->pivot->ends_on)) }}&nbsp; (Season {{ $season->id }} {{ $season->pivot->filled == true ? '- Filled' : '' }})</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" style="{{ $errors->has('city_id') ? 'display:block;' : '' }}">
                                    {{ $errors->first('city_id') }}
                                </div>
                            </div>
                            <!-- end: Season select -->
                        @endif

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
                            <textarea type="text" class="form-control update" id="terms" placeholder="Discount terms, i.e. 'Not valid on sale items'" value="{{ old('terms') }}" required="" name="terms" rows="3"></textarea>
                            <div class="invalid-feedback" style="{{ $errors->has('terms') ? 'display:block;' : '' }}">
                                {{ $errors->first('terms') }}
                            </div>
                        </div>
                        <!-- end: discount terms -->

                        <!-- begin: Discount Start Date --
                        <div class="col-md-6 mb-3">
                            <label for="begins_at">Start Date</label>
                            <input type="text" class="form-control" id="begins_at" placeholder="Start date" value="{{ old('begins_at') }}" required="" name="begins_at">
                            <div class="invalid-feedback" style="{{ $errors->has('begins_at') ? 'display:block;' : '' }}">
                                {{ $errors->first('begins_at') }}
                            </div>
                        </div>
                        <!-- end: discount start date -->

                        <!-- begin: Discount Expiration Date --
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
        // When a discount field is updated, update the preview
		$('.update').change( function() {
			var text = $(this).val();
			var name = $(this).attr("name");
			var target = '.discount-' + name + '-preview';
			$(target).text(text);
		});

        // Update the preview link
		$('.update-link').change( function() {
			var text = $(this).val();
			// var name = $(this).attr("name");
			// var target = '.discount-' + name + '-preview';
			// $(target).text(text);
            $('.cta-link').attr("href", text);
		});

        // Toggle the Call to Action fields
        $('#linked').click( function() {
            var btn = '<div class="call_to_action"><a href="#" target="_blank" class="btn btn-lg btn-block btn-primary btn-badge cta-link"><span class="discount-call_to_action-preview">Order Online Now</span></a></div>'
            $('#disc_cta').removeClass('d-none');
            $('.cta-wrapper').html(btn);
        });

        $('#unlinked').click( function() {
            // $('#disc_cta').removeClass('d-block');
            $('#disc_cta').addClass('d-none');
            $('.call_to_action').remove();
        });

        $('#business_id').change( function(e) {
            e.preventDefault();
            var url = '/admin/businesses/' + this.value + '/get-logo';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: '/admin/businesses/' + this.value + '/get-logo',
                method: 'get',
                success: function(data){
                    if( data['logo'] != null ) {
                        var img = '<img class="business-logo-img" src="' + data['logo'] + '">';
                        $('.business-logo').html(img);
                    } else {
                        var name = '<span class="business-logo-name">' + data['name'] + '</span>';
                        $('.business-logo').html(name);
                    }

                }
            });
        });

        $('#season').change( function() {
            var begin = $(this).find(':selected').data('begin-date');
            var end = $(this).find(':selected').data('end-date');

            $('.discount-begins_at-preview').text(begin);
            $('.discount-expires_at-preview').text(end);
        })

	</script>
@endsection
