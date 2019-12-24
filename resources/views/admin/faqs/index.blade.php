@extends('layouts.app')

@section('content')
	<h1>Frequently Asked Questions</h1>

	<ul>
		@foreach($faqs as $faq)
			<li>
				<div class="d-block">
					<h4>{{ $faq->question }}</h4>
					<p>{{ $faq->answer }}</p>
				</div>
			</li>
		@endforeach
	</ul>
		
@endsection