<div id="cityRequestFormModal" class="modal cityRequestFormModal fade" tabindex="-1" role="dialog" aria-labelledby="cityRequestFormModal" aria-hidden="true">
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
                            <h3 class="city-request-title text-white">Help us bring the your favorite city to your Local Discount Club.</h3>
                            <span class="svg-icon business-svg-icon">
                                @include('_partials.icons.skyline_buildings_duotone')
                            </span>
                        </div>
                    </div>

                </div>

                <div class="row bottom-row">
                    <div class="col-12">
                        <div class="form-wrapper">

                            <form id="cityRequestForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select class="custom-select mr-sm-2" id="state_id" name="state_id">
                                        <option value="" selected>State</option>

                                        @foreach( $select_states as $state )
                                            @if( $state->cities->count() > 0 )
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <small id="state_idError" class="form-text text-danger error-text"></small>
                                </div>
                                <div class="form-group">
                                    <label for="city_name">City Name</label>
                                    <input type="text" class="form-control" id="city_name" name="city_name" aria-describedby="city" placeholder="Your city here">
                                    <small id="city_nameError" class="form-text text-danger error-text"></small>
                                </div>

                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Submit City Request
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
