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
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <ul class="submenu ml-auto mb-0 text-right">

                                @can('manage-cities')
                                <li class="nav-item d-inline-block">
                                    <form id="deleteCityForm" method="POST"
                                        action="{{ route('delete.city',[$city]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-badge">
                                            <i class="fas fa-trash mr-1"></i>
                                            Delete City
                                        </button>
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
            <!-- <hr class="h-separator"> -->
        </div>
    </div>

    <div class="row mt-5 mb-4">

        <div class="col-12 col-md-3">
            <div class="nav flex-column nav-pills" id="tablist" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="city-discounts-tab" data-toggle="pill" href="#city-discounts" role="tab" aria-controls="city-discounts" aria-selected="true">Discounts</a>
                <a class="nav-link" id="city-businesses-tab" data-toggle="pill" href="#city-businesses" role="tab" aria-controls="city-businesses" aria-selected="false">Businesses</a>
                <a class="nav-link" id="city-signups-tab" data-toggle="pill" href="#city-signups" role="tab" aria-controls="city-signups" aria-selected="false">Registered Users</a>
                <a class="nav-link" id="city-surrounding-tab" data-toggle="pill" href="#city-surrounding" role="tab" aria-controls="city-surrounding" aria-selected="false">Surrounding Cities</a>
                <a class="nav-link" id="city-requested-tab" data-toggle="pill" href="#city-requested" role="tab" aria-controls="city-requested" aria-selected="false">Requested Businesses</a>
                <a class="nav-link" id="city-notify-tab" data-toggle="pill" href="#city-notify" role="tab" aria-controls="city-notify" aria-selected="false">Requested Notifications</a>
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
                    Businesses - Pending
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
                    <h4 class="text-muted mb-4">Requested Businesses - Pending</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Column</th>
                                <th scope="col">Column</th>
                                <th scope="col">Column</th>
                                <th scope="col">Column</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>@Data</td>
                            </tr>
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
                                <th scope="col">Requested On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $news['members'] as $key => $member )
                            <tr>
                                <td>{{ $member['merge_fields']['FNAME'] }}</td>
                                <td>{{ $member['merge_fields']['LNAME'] }}</td>
                                <td>{{ $member['email_address'] }}</td>
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

        <div class="col-12">



        </div>
    </div>

<!--     <div class="row mt-3">
        <div class="container">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item page-nav disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item break"><span class="page-link">...</span></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                        <li class="page-item page-nav"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> -->

</div>
@endsection
