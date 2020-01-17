@extends('layouts.public')

@section('page-title', 'About Us')

@section('content')
<div id="faqHeader" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="faq-header-bkgd"></div>
            <h3 class="pt-5 text-primary">How may we help you?</h3>
            <div id="faqSearch" class="text-center">
                <form id="faqSearchForm">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input id="quickSearch" type="text" class="form-control form-control-lg" placeholder="Type any keyword to find answers">
                        <span class="fa fa-close form-control-clear"></span>
                    </div>
                </form>
            </div>
            <p class="search-subtext text-primary">You can also browse the topics below to find what you are looking for.</p>
        </div>
    </div>
</div>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <h4 class="text-center pb-4">Frequently Asked Questions</h4>
            <div class="faqs-row-wrapper">
                @foreach( $categories as $category )
                    <h5 class="faq-category-title text-primary {{ $category->type }}">{{ ucwords($category->type) }}</h5>
                    <div class="grid">
                        <div class="faq-gutter"></div>
                        <div class="none-available">NONE AVAILABLE</div>
                        @foreach( $faqs as $faq )
                            @if( $faq->type === $category->type )
                                <div class="faq-wrapper mb-3" data-category="{{ $faq->type }}">
                                    <h5 class="faq-question">
                                        {{ $faq->question }} {{ substr($faq->question,-1) !== '?' ? '?' : '' }}
                                    </h5>
                                    <div class="faq-answer pb-3" id="q{{ $faq->id }}">
                                            {!! $faq->answer !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script>

$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

$('.form-control-clear').on('click', function () {
    $('#faqSearchForm').trigger("reset");
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $grid.isotope();
    $('.form-control-clear').hide();
});

// quick search regex
var qsRegex;

// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.faq-wrapper',
  stamp: '.stamp',
  layoutMode: 'fitRows',
  stagger: 30,
  fitRows: {
    gutter: '.faq-gutter'
  },
  filter: function() {
    return qsRegex ? $(this).text().match( qsRegex ) : true;
  }
});

// use value of search field to filter
var $quicksearch = $('#quickSearch').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    if( !$quicksearch.val() ) {
        $('.form-control-clear').hide();
    } else {
        $('.form-control-clear').show();
    }

    $grid.isotope();
}, 200 ) );

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  threshold = threshold || 100;
  return function debounced() {
    clearTimeout( timeout );
    var args = arguments;
    var _this = this;
    function delayed() {
      fn.apply( _this, args );
    }
    timeout = setTimeout( delayed, threshold );
  };
}

</script>
@endsection
