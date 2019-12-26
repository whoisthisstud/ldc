<div class="col-12 text-center">
    <div class="d-block mb-5">
        <a href="{{ route('public.signup', [ 'state' => $city->state->name, 'city' => $city->name ]) }}" class="btn btn-lg btn-primary">Register for the Local Discount Club in {{ $city->name }}</a>
    </div>
</div>
