<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\Complaint;
use App\Models\ContactUs;
use App\Models\Department;
use App\Models\PageBanner;
use Carbon\Carbon;
use App\Models\Suggestion;
use App\Models\CheckStatus;
use App\Models\Page;
use App\Models\Appreciation;
use App\Models\Inquiry;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\NewsandUpdate;
use App\Models\HelplineNumber;
use App\Models\VideoPresentation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\NewSchemeintegration;
use App\Models\Faq;
use App\Models\CaseStudy;
use App\Models\OurTeam;
use App\Models\Testimonial;
use App\Models\Newsletter;
use App\Models\ServiceContact;
use App\Models\MetaTag;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    
    public function submit(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'mobile'  => 'required|string|max:20',
        'message' => 'required|string',
        'service_name' => 'required'
    ]);

    try {
        \App\Models\ServiceContact::create($validated);
        return back()->with('success', 'Thank you for contacting us! We’ll get back to you shortly.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong. Please try again.');
    }
}


    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }

    public function homePage()
    {

        $teamContent = PageContent::where('module','our-team')->first();
        $faqContent = PageContent::where('module','faq')->first();
        $CaseStudyContent = PageContent::where('module','case-study')->first();
        $serviceContent = PageContent::where('module','service')->first();
        $newsletterContent = PageContent::where('module','newsletter')->first();
        $testimonialsContent = PageContent::where('module','testimonials')->first();
        $sliders = Slider::all();

        $banner = Page::where('title', 'banner')->first();

        $why = Page::where('title','why-choose-us')->first();
        
        $about = Page::where('title', 'about-us')
            ->first();
            
        $aboutContent = PageContent::where('module', 'about-us')->first();

        $faq = Faq::where('status','1')->orderBy('id','desc')->get();

        $caseStudy = CaseStudy::where('status','1')->orderBy('id','desc')->get();

        $ourTeam = OurTeam::where('status','1')->orderBy('id','desc')->get();

        $testimonials = Testimonial::where('status','1')->orderBy('id','desc')->get();

        $services = Service::where('is_home', 1)->orderBy('id', 'desc')
    ->get()
    ->take(3)
    ->values();
    
    // dd($services);

        // Return the view with sliders and page content data
        return view('front-end.home', compact('sliders','banner','about','faq','caseStudy','ourTeam','testimonials','services','why','teamContent','faqContent','CaseStudyContent','serviceContent','newsletterContent','testimonialsContent','aboutContent'));
    }
    public function services()
    {
        $banner = \App\Models\PageBanner::where('page_name','service')->first();
        $services = Service::orderBy('id','desc')->get();
         $serviceContent = PageContent::where('module','service')->first();
        $testimonials = Testimonial::where('status','1')->orderBy('id','desc')->get();

        return view('front-end.services',compact('services','testimonials','banner','serviceContent'));
    }

    public function projects()
    {
        $banner = \App\Models\PageBanner::where('page_name','projects')->first();
        $caseStudy = CaseStudy::where('status','1')->orderBy('id','desc')->get();
        $faq = Faq::where('status','1')->orderBy('id','desc')->get();
        $about = Page::where('title', 'about-us')
            ->first();
         return view('front-end.projects',compact('caseStudy','faq','about','banner'));
    }

    public function aboutUs()
    {
        $banner = \App\Models\PageBanner::where('page_name','about-us')->first();
        $about = Page::where('title', 'about-us')
            ->first();
        $ourTeam = OurTeam::where('status','1')->orderBy('id','desc')->get();
        $why = Page::where('title','why-choose-us')->first();
        return view('front-end.about',compact('ourTeam','why','about','banner'));
    }

    public function checkStatus()
    {
        return view('front-end.check-status');
    }

    public function singleService($title)
    {
        $title = str_replace('-', ' ', $title);
        
        $service = Service::where('slug',$title)->first();
        
        return view('front-end.single',compact('service'));
    }
    
    public function singleAboutUs($title)
    {
        $title = str_replace('-', ' ', $title);
        
        $service = Page::where('title',$title)->first();
        
        
        return view('front-end.single_about',compact('service'));
    }
    
    
    
    public function singleProject($title)
    {
        $title = str_replace('-', ' ', $title);
        $normalizedTitle = strtolower($title);

    // Build the query: lowercase both type and input title, and use LIKE
    $service = CaseStudy::whereRaw('LOWER(REPLACE(type, "-", " ")) LIKE ?', ['%' . $normalizedTitle . '%'])->first();
        return view('front-end.single_project',compact('service'));
    }
    
    

    public function categoryWiseService($title)
    {
        $title = str_replace('-', ' ', $title);
        
        $categories = \App\Models\Category::where('name',$title)->first();

        $services = Service::where('category_id',$categories->id)->orderBy('id','desc')->get();

         $testimonials = Testimonial::where('status','1')->orderBy('id','desc')->get();
        
        return view('front-end.category_service',compact('categories','services','testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            // 'mobile' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
            // 'mobile' => 'required|regex:/^\+1\s?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/',
           'mobile' => [
                'required',
                'digits_between:10,12',
                'regex:/^\d+$/', // only digits allowed
            ],
            'g-recaptcha-response' => 'required',
        ], [
            'mobile.digits_between' => 'Mobile number must be between 10 and 12 digits.',
            'mobile.regex' => 'Mobile number must contain only digits.',
        ]);
        
        // reCAPTCHA validate karo
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);
    
        if (!$response->json('success')) {
            return back()->withErrors(['g-recaptcha-response' => 'Captcha verification failed.'])->withInput();
        }

        Inquiry::create($request->only(['name', 'email', 'subject', 'message','mobile']));
        
        // ✅ Mail Data (avoid $message conflict)
        $data = [
            'name'        => $request->name,
            'email'       => $request->email,
            'mobile'      => $request->mobile,
            'subject'     => $request->subject,
            'userMessage' => $request->message, // ✅ renamed to avoid conflict
        ];
    
        //✅ Send Email
        Mail::send('emails.contact_us_mail', $data, function ($mail) use ($data) {
            $mail->from('no-reply@siyaracloud.com', 'Siyara Cloud AI'); // fixed from
            $mail->replyTo($data['email'], $data['name']);       // user as reply-to
            $mail->to('info@siyaracloud.com');                   // admin/receiver
            $mail->subject($data['subject']);
        });


        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    

    public function contactUs()
    {
        $contact = ContactUs::first();

        $pageBanner = PageBanner::where('page_name', 'contact')->first();

        return view('front-end.contact', compact('contact', 'pageBanner'));
    }
    
    public function aiBusinessSolutions()
    {
                    
        return view('front-end.ai_powered_business_solutions');
    }
    
    public function dataAnalytics()
    {
        return view('front-end.data_analytics_and_predictive_intelligence');
    }
    
    public function sustainableSolutions()
    {
        return view('front-end.sustainable_digital_solutions');
    }
    
    public function creativeAI()
    {
        return view('front-end.creative_ai_and_generative_design');
    }
    
    public function itSolutions()
    {
        return view('front-end.it_and_digital_transformation_solutions');
    }
    
}
