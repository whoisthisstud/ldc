<?php

namespace App\Http\Controllers;

use DB;
use Url;
use View;
use Auth;
use App\Faq;
use App\City;
use App\State;
use App\Discount;
use App\DiscountView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\TwitterCard;

class PagesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $select_cities = City::all();
        $select_states = State::with('cities')->get();

        View::share('select_cities', $select_cities);
        View::share('select_states', $select_states);
    }

    public function index(Request $request)
    {
        $cities = City::with('state')
            // ->where('is_active', true)
            ->orderBy('views', 'desc')
            ->take(9)
            ->get();

        $all_cities = City::with('state')->get();

        $keywords = array();
        $keywords = [
            'save money',
            'local discounts',
            'discount club',
            'restaurant discounts',
            'restaurant coupons',
            'business discounts',
            'business coupons'
        ];

        if ($all_cities->count() > 0) {
            foreach ($all_cities as $city) {
                array_push($keywords, $city->name . ' ' . $city->state->abbreviation);
                array_push($keywords, $city->zip_code);
            }
        }

        SEOTools::setTitle('Home');
        SEOTools::setDescription('Get exclusive discounts and savings for establishments in your city with a free membership in your Local Discount Club.');
        SEOMeta::setKeywords($keywords);
        SEOTools::opengraph()->setUrl(route('public.index'));
        SEOTools::setCanonical(route('public.index'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@yourldc');
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOMeta::setRobots('index,follow');

        return view('public', compact('cities'));
    }

    public function allCities()
    {
        $states = State::with('cities')->get();
        $faqs = Faq::where('is_active',true)->get()->random(3);

        $keywords = [
            'discounts',
            'save money',
            'local discounts',
            'discount club',
            'restaurant discounts',
            'restaurant coupons',
            'business discounts',
            'business coupons',
        ];

        foreach ($states as $state) {
            array_push($keywords, $state->name . ', ' . $state->abbreviation);
            foreach ($state->cities as $city) {
                array_push($keywords, $city->name);
                if ($city->surrounding_cities !== null) {
                    $surrounding = json_decode($city->surrounding_cities);
                    foreach ($surrounding->zip_codes as $key => $value) {
                        if ($value->city != $city->name) {
                            array_push($keywords, $value->city);
                        }
                        if ($value->zip_code != $city->zip_code) {
                            array_push($keywords, $value->zip_code);
                        }
                    }
                }
            }
        }

        // Set SEO Info
        SEOTools::setTitle('All Cities');
        SEOMeta::setKeywords($keywords);
        SEOTools::setDescription('Find a Local Discount Club near you and signup to start saving at establishments in your local area!');
        SEOTools::opengraph()->setUrl(route('public.cities.list'));
        SEOTools::setCanonical(route('public.cities.list'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@yourldc');
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOMeta::setRobots('index,follow');

        return view('public.all-cities', compact('states','faqs'));
    }

    public function city($state, $city)
    {
        $state = State::where('name', $state)->first();

        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $city->increment('views');

        $discounts = Discount::inSeason($city);

        $faqs = Faq::inRandomOrder()
            ->where('is_active', true)
            ->where('type', 'city')
            ->orderBy('id', 'DESC')
            ->limit(9)
            ->get();

        $keywords = [
            $city->name . ' ' . $state->abbreviation . ' discounts',
            'save money',
            'local discounts',
            'discount club',
            'restaurant discounts',
            'restaurant coupons',
            'business discounts',
            'business coupons',
            $city->zip_code,
            $state->name
        ];

        if ($city->surrounding_cities !== null) {
            $surrounding = json_decode($city->surrounding_cities);

            foreach ($surrounding->zip_codes as $key => $value) {
                if ($value->city != $city->name) {
                    array_push($keywords, $value->city . ' ' . $value->state);
                }
                if ($value->zip_code != $city->zip_code) {
                    array_push($keywords, $value->zip_code);
                }
            }
        }

        if ($city->is_active === true && $discounts->count() > 0) {
            foreach ($discounts as $discount) {
                array_push($keywords, $discount->business->name);
            }
        }

        // SEO Details
        SEOTools::setTitle($city->name . ', ' . $state->name . ' Local Discount Club');
        SEOMeta::setKeywords($keywords);
        SEOTools::setDescription('Request your Local Discount Club card now for ' . $city->name . ', ' . $city->state->name . ' and start saving tonight at local establishments!');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@yourldc');
        SEOTools::opengraph()->setUrl(route('public.city', ['state'=>$state->name,'city'=>$city->name]));
        SEOTools::setCanonical(route('public.city', ['state'=>$state->name,'city'=>$city->name]));
        SEOTools::jsonLd()->addImage(url($city->getFirstMediaUrl('city-images', 'thumb')));
        SEOMeta::setRobots('index,follow');

        return view('public.city', compact('city', 'discounts', 'faqs'));
    }

    public function state(State $state)
    {
        return view('public.state');
    }

    public function discount($state, $city, $business, $discount)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $discount = Discount::where('business_id', $business)->where('city_id', $city->id)->where('code', $discount)->first();

        DiscountView::create([
            'discount_id' => $discount->id,
            'user_id' => Auth::id(),
            'business_id' => $discount->business_id,
            'city_id' => $discount->city_id
        ]);

        return view('public.discount', compact('state', 'city', 'discount'));
    }

    public function signup($state, $city)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $faqs = Faq::where('is_active',true)->get()->random(3);

        // SEO Details
        SEOTools::setTitle($city->name . ', ' . $state->abbreviation . ' club card request form');
        SEOMeta::setKeywords(['local discounts', 'discounts near me', $city->name, $city->zip_code, $city->state->name]);
        SEOTools::setDescription('Request your Local Discount Club card now, for ' . $city->name . ', ' . $city->state->name . ', and start saving tonight at local establishments!');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@yourldc');
        SEOTools::jsonLd()->addImage($city->getMedia('city-images')->first());
        SEOTools::opengraph()->setUrl(route('public.signup', ['state' => $state->name, 'city' => $city->name]));
        SEOTools::setCanonical(route('public.signup', ['state' => $state->name, 'city' => $city->name]));
        SEOMeta::setRobots('index,nofollow');

        return view('public.signup', compact('city', 'faqs'));
    }

    public function privacy()
    {
        SEOTools::setTitle('Our Privacy Policy');
        SEOTools::setDescription('Privacy Policy for Local Discount Club');
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOTools::opengraph()->setUrl(route('public.privacy'));
        SEOTools::setCanonical(route('public.privacy'));
        SEOMeta::setRobots('index,nofollow');

        return view('public.privacy');
    }

    public function terms()
    {
        SEOTools::setTitle('Our Terms of Use');
        SEOTools::setDescription('Local Discount Club Terms of Use.');
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOTools::opengraph()->setUrl(route('public.terms'));
        SEOTools::setCanonical(route('public.terms'));
        SEOMeta::setRobots('index,nofollow');

        return view('public.terms');
    }

    public function about()
    {
        SEOTools::setTitle('About Us');
        SEOTools::setDescription('Learn more about your Local Discount Club and our mission.');
        SEOMeta::setKeywords(['Local Discount Club', 'discounts', 'discounts near me', 'About us']);
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOTools::opengraph()->setUrl(route('public.about'));
        SEOTools::setCanonical(route('public.about'));
        SEOMeta::setRobots('index,follow');

        return view('public.about');
    }

    public function contact()
    {
        SEOTools::setTitle('Contact Us');
        SEOTools::setDescription('Contact your Local Discount Club.');
        SEOMeta::setKeywords(['Local Discount Club', 'discounts', 'discounts near me', 'Contact us']);
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOTools::opengraph()->setUrl(route('public.contact'));
        SEOTools::setCanonical(route('public.contact'));
        SEOMeta::setRobots('index,nofollow');

        return view('public.contact');
    }

    public function faqs()
    {
        $faqs = Faq::where('is_active', true)
            ->where('type','!=','business')
            ->get();
        $categories = DB::table('faqs')
            ->select('type', 'is_general')
            ->where('is_active', true)
            ->where('type','!=','business')
            ->orderBy('is_general', 'DESC')
            ->groupBy('type', 'is_general')
            ->get();

        SEOTools::setTitle('Frequently Asked Questions');
        SEOTools::setDescription('Find answers to commonly-asked questions concerning your Local Discount Club');
        SEOMeta::setKeywords(['Local Discount Club', 'discounts', 'discounts near me', 'frequently asked questions']);
        SEOTools::jsonLd()->addImage(asset('/i/local-discount-club.png'));
        SEOTools::opengraph()->setUrl(route('public.faqs'));
        SEOTools::setCanonical(route('public.faqs'));
        SEOMeta::setRobots('index,nofollow');

        return view('public.faqs', compact('faqs', 'categories'));
    }
}
