@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">

            <section class="sub-header">
                <div class="container">

                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="pt-1">
                                <span class="d-inline-block">
                                    <a href="{{ route('view.state', [ 'state' => $city->state->id ]) }}" class="text-decoration-none">
                                        <h5 class="d-inline-block">{{ $city->state->abbreviation }}</h5>
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">{{ $city->name }}</h5>
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('city.discount', [ 'city' => $city->id ]) }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add Discount
                                </a>
                                <a href="{{ route('public.city', [ 'city' => $city->name, 'state' => $city->state->name ]) }}" class="btn btn-sm btn-secondary btn-badge ml-2" target="_blank">
                                    <i class="fas fa-globe-americas"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <ul class="submenu ml-auto mb-0 text-right">

                                @can('manage-cities')
                                <li class="nav-item d-inline-block">
                                    <button class="btn btn-sm btn-danger btn-badge" data-toggle="modal" data-target="#areYouSure" data-form-id="deleteCityForm" data-object="{{ $city->name }}, {{ $city->state->abbreviation }}">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete City
                                    </button>
                                    <form id="deleteCityForm" method="POST"
                                        action="{{ route('delete.city',[$city]) }}">
                                        @csrf
                                    </form>
                                </li>
                                @endcan

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
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary btn-badge dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="action-menu">
                                            <a class="dropdown-item disabled" href="#">
                                                <i class="fas fa-theater-masks mr-1"></i>
                                                Feature City
                                            </a>
                                            <a class="dropdown-item" href="{{ route('cities.edit', [ 'city' => $city->id ]) }}">
                                                <i class="fas fa-edit mr-1"></i>
                                                Edit City
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            @if($city->is_active)
                                                <a class="dropdown-item text-danger" href="{{ route('deactivate.city', [ 'city' => $city->id ]) }}">
                                                    <i class="fas fa-toggle-off mr-1"></i>
                                                    Deactivate City
                                                </a>
                                            @else
                                                <a class="dropdown-item text-primary" href="{{ route('activate.city', [ 'city' => $city->id ]) }}">
                                                    <i class="fas fa-toggle-on mr-1"></i>
                                                    Activate City
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-3 mb-4">
            <div class="nav flex-column nav-pills mb-4" id="tablist" role="tablist" aria-orientation="vertical" style="">
                <div id="stickyNav" class="">
                    <h5 class="pb-3 mb-2 text-uppercase city-menu-header">City Menu</h5>
                    <a class="nav-link active" id="city-discounts-tab" data-toggle="pill" href="#city-discounts" role="tab" aria-controls="city-discounts" aria-selected="true">
                        <i class="fas fa-tags mr-2"></i>
                        Discounts
                    </a>
                    <a class="nav-link" id="city-businesses-tab" data-toggle="pill" href="#city-businesses" role="tab" aria-controls="city-businesses" aria-selected="false">
                        <i class="fas fa-building mr-2"></i>
                        Businesses
                    </a>
                    <a class="nav-link" id="city-signups-tab" data-toggle="pill" href="#city-signups" role="tab" aria-controls="city-signups" aria-selected="false">
                        <i class="fas fa-users mr-2"></i>
                        Registered Users
                    </a>
                    <a class="nav-link" id="city-surrounding-tab" data-toggle="pill" href="#city-surrounding" role="tab" aria-controls="city-surrounding" aria-selected="false">
                        <i class="fas fa-city mr-2"></i>
                        Surrounding Cities
                    </a>
                    <a class="nav-link" id="city-requested-tab" data-toggle="pill" href="#city-requested" role="tab" aria-controls="city-requested" aria-selected="false">
                        <i class="fas fa-bullhorn mr-2"></i>
                        Requested Businesses
                    </a>
                    <a class="nav-link" id="city-notify-tab" data-toggle="pill" href="#city-notify" role="tab" aria-controls="city-notify" aria-selected="false">
                        <i class="fas fa-envelope-open-text mr-2"></i>
                        Requested Notifications
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="tab-content" id="tablistContent">
                <div class="tab-pane fade show active" id="city-discounts" role="tabpanel" aria-labelledby="city-discounts-tab">
                    <section class="">
                        <div class="container">
                            <div class="row">

                                @if( $city->seasons->count() > 0 )
                                <div class="col-12 mb-4">
                                    <div class="row justify-content-end">
                                        <div class="col-6 text-right">
                                            <label class="mr-sm-2 d-inline-block" for="seasonSelector" data-toggle="tooltip" data-placement="top" title="Temporarily disabled, but eventually sortable by Season">
                                                Select Season:
                                            </label>

                                            <select class="custom-select mr-sm-2" id="seasonSelector" style="width: 75%;" disabled="">

                                                @foreach( $city->seasons as $season )
                                                    <option value="{{ $season->id }}"
                                                        {{-- $season->pivot->filled == true ? 'disabled' : '' --}} data-begin-date="{{ date('m/d/y', strtotime($season->pivot->begins_on)) }}"
                                                        data-end-date="{{ date('m/d/y', strtotime($season->pivot->ends_on)) }}"> {{ date('M jS, Y', strtotime($season->pivot->begins_on)) }} to {{ date('M jS, Y', strtotime($season->pivot->ends_on)) }}&nbsp; (Season {{ $season->id }} {{ $season->pivot->filled == true ? '- Filled' : '' }})</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @foreach($city->discounts as $discount)
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <div class="city-card-tile">
                                            <div class="city-card-wrapper">

                                                <a href="#" class="text-decoration-none">
                                                    <div class="city-card-header">
                                                        <div class="text-center">
                                                            <h4 class="mt-2 mb-0">{{ $discount->code }}</h4>
                                                        </div>
                                                    </div>
                                                </a>

                                                <div class="city-card-stats">
                                                    <div>
                                                        <strong><small>Subscribers</small></strong>
                                                        1,802
                                                    </div>
                                                    <div>
                                                        <strong><small>Opens</small></strong>
                                                        10,386
                                                    </div>
                                                    <div>
                                                        <strong><small>Open %</small></strong>
                                                        576%
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="city-businesses" role="tabpanel" aria-labelledby="city-businesses-tab">
                    <section class="">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-muted pb-2 mb-3 border-bottom">City Businesses</h4>
                            </div>
                            @foreach( $city->discounts as $discount )
                                <div class="col-md-4 col-sm-12 mb-3 card-hover"><!-- col-lg-3  -->
                                    <div class="business-card hover-card">
                                        <div class="card-top">
                                            <div class="city-card-tile">
                                                <div class="city-card-wrapper">

                                                    <a href="{{ route('view.business', [ 'business' => $discount->business->id ]) }}" class="text-decoration-none">
                                                        @if( $discount->business->logo != null )
                                                            <div class="py-2 px-4">
                                                                <div class="business-logo" style="background-image: url({{ asset( $discount->business->logo ) }});"></div>
                                                            </div>
                                                        @else
                                                            <div class="city-card-header">
                                                                <div class="text-center">
                                                                    <h4 class="mt-2 mb-0">{{ $discount->business->name }}</h4>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="city-signups" role="tabpanel" aria-labelledby="city-signups-tab">
                    @forelse($city->users as $user)
                        {{ $user->name }} <br>
                    @empty
                        None
                    @endforelse
                </div>
                <div class="tab-pane fade" id="city-surrounding" role="tabpanel" aria-labelledby="city-surrounding-tab">
                    <h4 class="text-muted pb-2 mb-3 border-bottom">Surrounding Cities</h4>
                    <ul>
                        @if( $surrounding !== null )
                            @foreach($surrounding->zip_codes as $location)
                                @if( $location->zip_code != $city->zip_code )
                                    <li>
                                        <i class="fas fa-angle-double-right mr-2"></i>
                                        <a href="{{ route('view.zip-code', [$location->zip_code]) }}">
                                            {{ $location->city }}, {{ $location->state }} {{ $location->zip_code }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <p>no surrounding locations collected</p>
                        @endif
                    </ul>

                </div>
                <div class="tab-pane fade" id="city-requested" role="tabpanel" aria-labelledby="city-requested-tab">
                    <h4 class="text-muted mb-4">Requested Businesses</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Business Requested</th>
                                <th scope="col">IP Address</th>
                                <th scope="col" class="text-right">Requested On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( $city->requestedBusinesses->count() > 0 )
                                @foreach( $city->requestedBusinesses as $business )
                                    <tr>
                                        <th scope="row">{{ $business->business_name }}</th>
                                        <td>{{ $business->ip_address }}</td>
                                        <td class="text-right">{{ $business->created_at->format('m/d/y \@ h:i A') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="city-notify" role="tabpanel" aria-labelledby="city-notify-tab">
                    Notification Signups - Pending

                    @if( $news['members'] )

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Requested On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $news['members'] as $key => $member )
                                <tr>
                                    <td>{{ $member['merge_fields']['FNAME'] }}</td>
                                    <td>{{ $member['merge_fields']['LNAME'] }}</td>
                                    <td>{{ $member['email_address'] }}</td>
                                    <td>
                                        @foreach( $member['tags'] as $tag)
                                            {{ $tag['name'] }}{{ ! $loop->last ? ', ' : '' }}
                                        @endforeach
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($member['timestamp_opt'])->format('m-d-Y \@ h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @else
                        <p>No users signed up for notifications, yet.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    window.onscroll = function() {makeSticky()};
    var sidebar = document.getElementById("stickyNav");
    // Get the offset position of the navbar
    var sticky = sidebar.offsetTop + 5;
    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function makeSticky() {
      if (window.pageYOffset >= sticky) {
        sidebar.classList.add("sticky")
      } else {
        sidebar.classList.remove("sticky");
      }
    }
</script>
@endsection