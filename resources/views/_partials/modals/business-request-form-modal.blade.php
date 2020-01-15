<div id="businessRequestFormModal" class="modal businessRequestFormModal fade" tabindex="-1" role="dialog" aria-labelledby="businessRequestFormModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <div class="row top-row">
                    <div class="city-request-bg-img"></div>

                    <div class="col-12">
                        <div class="close-button p-2 px-3">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-wrapper p-4 text-center">
                            <h3 class="city-request-title text-white">Help us bring your favorite establishments to your Local Discount Club.</h3>
                            <span class="svg-icon business-svg-icon">
                                @include('_partials.icons.storefront_multi')
                            </span>
                        </div>
                    </div>

                </div>

                <div class="row bottom-row">
                    <div class="col-12">
                        <div class="form-wrapper">
                            <div class="error-display"></div>

                            <form id="businessRequestForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select class="custom-select mr-sm-2" id="city_id" name="city_id">
                                        <option selected value="">Choose City...</option>

                                        @foreach( $select_states as $state )
                                            @if( $state->cities->count() > 0 )
                                                <optgroup label="{{ $state->name }}">
                                                    @foreach( $select_cities as $city )
                                                        @if( $city->state_id === $state->id )
                                                            <option value="{{ $city->id }}">{{ $city->name }}, {{ $state->abbreviation }}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endforeach

                                    </select>
                                    <small id="city_idError" class="form-text text-danger error-text"></small>
                                </div>
                                <div class="form-group">
                                    <label for="business">Business Name</label>
                                    <input type="text" class="form-control" id="business" name="business" aria-describedby="business">
                                    <small id="businessError" class="form-text text-danger error-text"></small>
                                </div>

                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Submit Business Request
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
