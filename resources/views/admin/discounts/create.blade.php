@extends('layouts.app')

@section('styles')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

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

        <div class="row justify-content-center mt-5 mb-4">
            <div class="col-12 col-md-4">

                <!-- start: Discount Preview Window -->
                <div class="discount-preview-wrapper sticky-top" style="top: 85px">
                	<div class="discount-preview-window shadow-5">
                		<div class="club-info">
                            <div class="club-logo">
                                @include('_partials.icons.ldc_card_front_color')
                            </div>
                			<span style="display:inline-block;vertical-align: middle;">
                                Local Discount Club
                                <div class="discount-city_id-preview">{{ isset($city) ? ' - ' . $city->name . ', ' . $city->state->abbreviation : '' }}</div>
                            </span>
                		</div>
                		<div class="business-logo-wrapper">
                			<div class="business-logo-block">
                                @if( !empty($business) && $business->logo )
                				    <img class="business-logo-img" src="{{ $business->logo }}">
                                @else
                                    @if( !empty($business) )
                                        <span class="business-logo-name">{{ $business->name }}</span>
                                    @endif
                                @endif
                			</div>
                		</div>
                		<div class="discount-title-preview">Your Title Text Goes Here!</div>
            			<div class="discount-description-preview" style="{{ old('description') ? '' : 'display:none;' }}">{{ old('description') ?? '' }}</div>

                        <div class="cta-wrapper">
                            <div class="call_to_action">
                                <a href="#" target="_blank" class="btn btn-lg btn-block btn-primary btn-badge cta-link">
                                    <span class="discount-call_to_action-preview">{{ old('call_to_action') ?? 'Call to Action' }}</span>
                                </a>
                            </div>
                        </div>

            			<div class="discount-code">
            				<span>Discount code: </span>
            				<div class="discount-code-preview">{{ old('code') ?? 'XXXXXXXX' }}</div>
            			</div>

            			<div class="discount-terms-preview" style="{{ old('terms') ? '' : 'display:none;' }}">{{ old('terms') }}</div>

            			<div class="expires_at">
            				<span>ends: </span>
	            			<div class="discount-expires_at-preview">{{ old('expires_at') ?? '{Season Start Date}' }}</div>
            			</div>

                	</div>
                </div>
                <!-- end: Discount Preview Window -->
            </div>

            <!-- start: Discount Form -->
            <div id="discountForm" class="col-12 col-md-6 offset-md-1">
                <section class="card px-2" style="">
                    <div class="card-body row">

                        <!-- if: we already know the business -->
                        @if( !empty($business) )
                            <input hidden="" name="business_id" value="{{ $business->id }}">
                        @else
                            <!-- begin: Business Select -->
                            <div class="col-md-12 mb-3">
                                <label for="business_id">Business <span class="text-danger">*</span></label>
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

                        <!-- if: we already know the city -->
                        @if( !empty($city) )
                            <input hidden="" name="city_id" value="{{ $city->id }}">
                        @else
                            <!-- begin: Business Select -->
                            <div class="col-md-12 mb-3">
                                <label for="city_id">City <span class="text-danger">*</span></label>
                                <select class="custom-select form-control update" id="city_id" name="city_id">
                                    <option>Choose...</option>
                                    <optgroup label="Available Cities">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == old('city_id') ? 'selected' : '' }}>{{ $city->name }}, {{ $city->state->abbreviation }}</option>
                                        @endforeach
                                    </optgroup>
                                    @can('access-testing')
                                        <optgroup label="Testing">
                                            <option value="">Somewhereville, ST</option>
                                        </optgroup>
                                    @endcan
                                    
                                </select>
                                <div class="invalid-feedback" style="{{ $errors->has('city_id') ? 'display:block;' : '' }}">
                                    {{ $errors->first('city_id') }}
                                </div>
                            </div>
                            <!-- end: business select -->
                        @endif

                    	<!-- begin: Discount Title -->
                        <div class="col-md-12 mb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control update" id="title" placeholder="Title  (max:35 characters)" value="{{ old('title') }}" required="" name="title" maxlength="35">
                            <div class="invalid-feedback" style="{{ $errors->has('title') ? 'display:block;' : '' }}">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                        <!-- end: discount title -->

                        <!-- begin: Discount Description -->
                        <div class="col-md-12 mb-3">
                            <label for="description">Description <small><em>&nbsp;(optional)</em></small></label>
                            <textarea type="text" class="form-control update" id="description" placeholder="Discount description" value="{{ old('description') }}" required="" name="description" rows="3"></textarea>
                            <div class="invalid-feedback" style="{{ $errors->has('description') ? 'display:block;' : '' }}">
                                {{ $errors->first('description') }}
                            </div>
                        </div>
                        <!-- end: discount description -->

                        <!-- begin: CTA selection -->
                        <div class="col-md-12 mt-2 mb-3">
                            <div class="cta-block">
                                <!-- begin: Discount CTA Radio -->
                                <div class="radio-block" data-toggle="buttons"> <!-- btn-group-toggle -->
                                    <label class="btn border active">
                                        <input type="radio" name="cta-options" id="linked" value="true" checked class="cta-options">
                                        <span class="radio-block-text">Link to Advertiser</span>
                                    </label>                                      
                                    <label class="btn border">
                                        <input type="radio" name="cta-options" id="unlinked" value="false" class="cta-options">
                                        <span class="radio-block-text">
                                            Remove Call to Action
                                        </span>                                       
                                    </label>
                                </div>
                                <!-- end: Discount CTA Radio -->

                                <!-- begin: Discount Call to Action -->
                                <div id="disc_cta" class="">
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
                            </div>
                                
                        </div>
                        <!-- end: CTA selection -->

                        <!-- begin: Date Type selection -->
                        <div id="date_type" class="col-md-12 mt-2 mb-3 {{ ($city->seasons->count() > 0 || old('expires_at') !== null) ? '' : 'd-none' }}">
                            <div class="season-block">
                                <div class="radio-block" data-toggle="buttons"> <!-- btn-group-toggle -->
                                    <label class="btn border active">
                                        <input type="radio" name="date-options" id="seasons" value="true" checked class="cta-options">
                                        <span class="radio-block-text">Use Seasons</span>
                                    </label>                                      
                                    <label class="btn border">
                                        <input type="radio" name="date-options" id="customDate" value="false" class="cta-options">
                                        <span class="radio-block-text">Use Custom Dates</span>
                                    </label>
                                </div>
                                <div id="citySeason" class="col-md-12" style="">
                                    @if( $city->seasons->count() > 0 || old('season') )
                                        <!-- begin: Season Select -->
                                        <div class="mb-3">
                                            <label for="seasonSelect">Season</label>
                                            <select class="custom-select" id="seasonSelect" name="season">
                                                <option {{ old('season') ? '' : 'selected' }}selected>Choose Season...</option>

                                                @foreach($city->seasons as $season)
                                                    <option value="{{ $season->id }}"
                                                        {{ old('season') == $season->id ? 'selected' : '' }}
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
                                </div>
                                
                                <div id="cityDates" class="col-12" style="margin-bottom:-1px; display:none;">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <label for="beginsAt">Period</label>
                                        </div>
                                        <div class="col-md-5 mb-3">                                           
                                            <input id="beginsAt" class="form-control" name="begins_at" placeholder="From" value="{{ $city->seasons->count() > 0 ? date('m/d/yy', strtotime($city->seasons->where('filled','!=',1)->first()->pivot->begins_on) ) : old('begins_at') }}">
                                            <div class="invalid-feedback" style="{{ $errors->has('begins_at') ? 'display:block;' : '' }}">
                                                {{ $errors->first('begins_at') }}
                                            </div>
                                        </div>
                                        <div class="col-2 mb-3">
                                            <span>to</span>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <input id="expiresAt" class="form-control" name="expires_at" placeholder="To" value="{{ $city->seasons->count() > 0 ? date('m/d/yy', strtotime($city->seasons->where('filled','!=',1)->first()->pivot->ends_on) ) : old('expires_at') }}">
                                            <div class="invalid-feedback" style="{{ $errors->has('expires_at') ? 'display:block;' : '' }}">
                                                {{ $errors->first('expires_at') }}
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                        <!-- end: Date Type selection -->

                        <!-- begin: Discount Code -->
                        <div class="col-md-12 mt-2 mb-3">
                            <div class="code-block">
                                <div class="radio-block" data-toggle="buttons"> <!-- btn-group-toggle -->
                                    <label class="btn border active">
                                        <input type="radio" name="code-options" id="useCode" value="true" checked class="cta-options">
                                        <span class="radio-block-text">Use Discount Code</span>
                                    </label>                                      
                                    <label class="btn border">
                                        <input type="radio" name="code-options" id="noCode" value="false" class="cta-options">
                                        <span class="radio-block-text">Remove Code</span>
                                    </label>
                                </div>

                                <div id="codeEntry" class="col-12 mt-2 mb-3">
                                    <label for="code">Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control update" id="code" placeholder="Discount Code (6-12 characters)" value="{{ old('code') }}" required="" name="code" aria-described-by="codeGenerator">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-badge px-4" type="button" id="codeGenerator" onclick="generateCode();">Generate Code</button>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback" style="{{ $errors->has('code') ? 'display:block;' : '' }}">
                                        {{ $errors->first('code') }}
                                    </div>
                                </div>
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
    <script src="{{ asset('/js/moment.js') }}"></script>
	<script>
        moment().locale('en').format('l');
        var code = '';

        // When a discount field is updated, update the preview
		$('.update').change( function() {
            var name = $(this).attr("name");

            if( $(this).is('select') ) {
                var text = ' - ' + $(':selected', this).text();
                if( name == "city_id" ) {
                    var id = $(':selected', this).val();
                    getSeasons(id);
                }
            } else {
                if( $(this).val() ) {
                    var text = $(this).val();
                } else {
                    var text = '';
                }  
            }

            var target = '.discount-' + name + '-preview';

            if( name == "description" && $(this).val() ) {
                $(target).css('padding-top','1rem');
                $(target).slideDown(200);
            } else if ( name == "description" && ! $(this).val() ) {
                $(target).slideUp(300);
            }
            if( name == "terms" && $(this).val() ) {
                $(target).slideDown(200);
            } else if ( name == "terms" && ! $(this).val() ) {
                $(target).slideUp(300);
            }

			$(target).text(text);
		});

        // Update the preview link
		$('.update-link').change( function() {
			var text = $(this).val();
            $('.cta-link').attr("href", text);
		});

        // Toggle the Call to Action fields
        $('#linked').click( function() {
            var btn = '<div class="call_to_action"><a href="#" target="_blank" class="btn btn-lg btn-block btn-primary btn-badge cta-link"><span class="discount-call_to_action-preview">Call to Action</span></a></div>'
            $('#disc_cta').slideDown(500);
            $('.cta-wrapper').slideDown(500).html(btn);
        });

        $('#unlinked').click( function() {
            $('#disc_cta').slideUp(500);
            $('.cta-wrapper').slideUp(300);
        });

        $('#seasonSelect').change( function() {
            var begins = $(':selected', this).data('begin-date');
            var ends = $(':selected', this).data('end-date');
            $('#beginsAt').val(begins);
            $('#expiresAt').val(ends);
            $('.discount-expires_at-preview').text(ends);
            $('')
        });

        $('#seasons').click( function() {
            $('#cityDates').slideUp(500);
            $('#citySeason').slideDown(300);
        });

        $('#customDate').click( function() {
            $('#citySeason').slideUp(500);
            $('#cityDates').slideDown(300);
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
                        $('.business-logo-block').html(img);
                    } else {
                        var name = '<span class="business-logo-name">' + data['name'] + '</span>';
                        $('.business-logo-block').html(name);
                    }

                }
            });
        });

        $('#noCode').change( function() {
            $('#codeEntry').slideUp(400);
            code = $('#code').val();
            $('#code').val('');
            $('.discount-code').slideUp(500);
        });

        $('#useCode').change( function() {
            $('#code').val(code);
            $('#codeEntry').slideDown(400);
            $('.discount-code').slideDown(300);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function getSeasons(city) {       
            $.ajax({
               type:'GET',
               url:'/admin/ajax/get-seasons/'+city,
               success:function(data){
                    if( data.error ) {
                        $('#citySeason').empty();
                        $('#date_type').addClass('d-none');
                    }
                    if( data.seasons ) {
                        var select = '<div class="mb-3"><label for="season">Season</label><select class="custom-select form-control" id="seasonSelect" name="season">';
                        
                        $i = 0;
                        // foreach season returned
                        $.each( JSON.parse(data.seasons), function(key,value) {
                            var disabled = value['pivot']['filled'] === 1 ? 'disabled' : '';
                            console.log(value['pivot']);
                            var beginsAt = moment(value['pivot']['begins_on']).format('MM/D/YYYY');
                            var expiresAt = moment(value['pivot']['ends_on']).format('MM/D/YYYY');

                            while( $i === 0 && value['pivot']['filled'] === 0 ) {
                                // alert('here');
                                $('#beginsAt').val(beginsAt);
                                $('#expiresAt').val(expiresAt);
                                $('.discount-expires_at-preview').text(expiresAt);
                                $i++;
                            }
                            // Create the options
                            select = select + '<option value="' + value['pivot']['city_id'] + '" ' + disabled + ' data-begin-date="' + beginsAt + '" data-end-date="' + expiresAt + '">' + beginsAt + ' - ' + expiresAt + '&nbsp; (Season ' + value['pivot']['season_id'] + (value['pivot']['filled'] === 1 ? ' - Filled' : '') + ')</option>';
                        });
                        var select = select + '</select></div>';

                        $('#date_type').removeClass('d-none');
                        $('#citySeason').html(select);

                        $('#seasonSelect').change( function() {
                            var begins = $(':selected', this).data('begin-date');
                            var ends = $(':selected', this).data('end-date');
                            $('#beginsAt').val(begins);
                            $('#expiresAt').val(ends);
                            $('.discount-expires_at-preview').text(ends);
                        });
                    }
                  
               }
            });
        }

        function randomLength(min, max) {  
            return Math.random() * (max - min) + min; 
        }

        function randomStr(len, arr) { 
            var ans = ''; 
            for (var i = len; i > 0; i--) { 
                ans +=  
                  arr[Math.floor(Math.random() * arr.length)]; 
            } 
            return ans; 
        } 
  
        function generateCode() { 
            var code = randomStr(randomLength(6,12), '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'); 
            $('#code').val(code);
            $('.discount-code-preview').html(code);
        }
	</script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#beginsAt').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#expiresAt').datepicker({
            uiLibrary: 'bootstrap4',
            change: function (e) {
                var ends = $('#expiresAt').val();
                $('.discount-expires_at-preview').text(ends);
            }
        });
    </script>
@endsection
