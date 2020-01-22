@extends('layouts.public')

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
                                <h5 class="d-inline-block">Users</h5>
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <span>{{ $user->name }}</span>
                            </div>
                            <a href="{{ route('view.profile', ['user' => '1']) }}" class="btn btn-sm btn-primary btn-badge mr-1">Admin user</a>
                            <a href="{{ route('view.profile', ['user' => Auth::id()]) }}" class="btn btn-sm btn-primary btn-badge mr-1">Current User</a>
                            <a href="{{ route('view.profile', ['user' => '4']) }}" class="btn btn-sm btn-primary btn-badge">Business user</a>
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
                        	<h3>Individual User Here</h3>
                    	</div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
@endsection