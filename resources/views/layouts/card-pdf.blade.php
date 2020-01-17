<html>
    <head>
        <meta charset="UTF-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- <style type="text/css" media="all">
            {{-- @include('_partials.inline.cardpdf-inline-styles') --}}
        </style> -->
    </head>
    <body>

        <div id="discountCard" class="card discount-card">
            <div class="card-header bg-primary text-light">
                <div class="row">
                    <div class="col-7">
                        <div class="ldc-card-logo">
                            @include('_partials.icons.ldc_card_logo')
                        </div>
                        <span class="ldc-title">Local Discount Club</span>
                    </div>
                    <div class="col-5 text-right">
                        <span class="city-name">
                            {{ $city->name }}, {{ $city->state->abbreviation }}
                        </span>
                    </div>
                </div>

            </div>
            <div class="card-body p-1">
                <div class="row px-3 justify-content-center">

                    <!--
                        * Production code should include checking
                        * if 15 discounts exists or not
                        ---- to fix pdf error ----
                        I got my code to work by replacing line 4860 in Cpdf.php with:
                        $imagickClonable = (new ReflectionClass(Imagick::class))->isCloneable();
                    -->
                    @foreach( $city->discounts as $discount )
                        <div class="discount-block">
                            <div class="discount-logo">
                                @if( !empty($discount->business->logo) )
                                    @php
                                        $path   = public_path($discount->business->logo);
                                        $type   = pathinfo($path, PATHINFO_EXTENSION);
                                        $data   = file_get_contents($path);
                                        $base64 = 'data:application/' . $type . ';base64,' . base64_encode($data);
                                    @endphp
                                    <!-- <img class="" src="{{ $discount->business->logo }}"> -->
                                    <img class="" src="{{-- $base64 --}}">

                                @else
                                    <span class="business-name">
                                        {{ $discount->business->name }}
                                    </span>
                                @endif
                            </div>
                            <div class="discount-title">
                                <span>{{ $discount->title }}</span>
                            </div>
                        </div>
                    @endforeach

                    <!-- This is for testing purposes -->
                    {{-- @foreach( $city->discounts as $discount )
                        @if( ! $loop->last )
                            <div class="discount-block">
                                <div class="discount-logo">
                                    @if( !empty($discount->business->logo) )
                                    @dd($discount->business->logo)
                                        @php
                                            $path   = $discount->business->logo;
                                            $type   = pathinfo($path, PATHINFO_EXTENSION);
                                            $data   = file_get_contents($path);
                                            $base64 = 'data:application/' . $type . ';base64,' . base64_encode($data);
                                        @endphp
                                        <!-- <img class="" src="{{ Storage::url($discount->business->logo) }}"> -->
                                        <img class="" src="{{ $base64 }}">
                                    @else
                                        <span class="business-name">
                                            {{ $discount->business->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="discount-title">
                                    <span>{{ $discount->title }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach --}}

                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <p class="site-domain text-center">WWW.YOURLDC.COM</p>
                    </div>
                    <div class="col-8">
                        <p class="p-0 m-0 pt-2"><small>
                            These are the terms that this card is required to be held to and define all of the stuff that is required to be put on the card, from a legal standpoint. These are the terms that this card is required to be held to and defin - maximum 250 characters.
                        </small></p>
                    </div>
                    <div class="col-4">
                        <span class="expiration-block">
                            EXPIRES: <strong>12/31/2020</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
