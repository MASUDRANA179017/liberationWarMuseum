<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Career;
use App\Models\Estimation;
use App\Models\JobApplication;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\About;
use App\Models\Album;
use App\Models\Client;
use App\Models\Member;
use App\Models\Policy;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\FaqMain;
use App\Models\Product;
use App\Models\Exhibition;
use App\Models\Film;
use App\Models\WhyNeed;
use App\Models\WhyWork;
use App\Models\Keypoint;
use App\Models\Application;
use App\Models\MainCounter;
use App\Models\Testimonial;
use App\Models\BlogCategory;
use App\Models\CallToAction;
use App\Models\WhyWorkImage;
use Illuminate\Http\Request;
use App\Models\ServiceClient;
use App\Models\SliderCounter;
use App\Models\ContactMessage;
use App\Models\AlbumImageVideo;
use App\Models\NewsBlogComment;
use App\Models\ExhibitionCategory;
use App\Models\Testimonialmain;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\LinesOfCode\Counter;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Schema;

class FrontendController extends Controller
{

    public function getEstimatePrice($film_id, $product_id)
    {
        $estimation = Estimation::where('film_id', $film_id)
            ->where('product_id', $product_id)
            ->first();

        if ($estimation) {
            return response()->json([
                'success' => true,
                'price_per_sft' => $estimation->price_per_sft,
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }




    private function handleFileUpload($file, $path)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }

    private function handleFileDelete($filePath)
    {
        if ($filePath && Storage::exists('public/' . $filePath)) {
            Storage::delete('public/' . $filePath);
        }
    }


    public function index()
    {
        $sliders = Slider::where('status', true)->get();
        $keypoints = Keypoint::where('status', true)->take(3)->get();
        $about = About::where('status', true)->first();
        $action = CallToAction::where('status', true)->first();

        $exhibitions = Exhibition::where('status', true)->latest()->get();
        $exhibitionCategories = ExhibitionCategory::where('status', true)->get();
        $counters = MainCounter::where('status', true)->get();

        $questions = Faq::where('status', true)->get();
        $faqmain = FaqMain::where('status', true)->first();
        $newses = Blog::where('status', true)->take(3)->get();
        $news_categories = BlogCategory::where('status', true)->get();
        $testimonials = Testimonial::where('status', true)->get();
        $maintestimonial = Testimonialmain::where('status', true)->first();
        $clients = Client::where('status', true)->get();

        $managements = Member::where('status', true)->where('department', 'Management')->orderBy('serial', 'asc')->take(4)->get();
        $siteEngineers = Member::where('status', true)->where('department', 'Site Engineer Team')->orderBy('serial', 'asc')->take(4)->get();
        $marketingEngineers = Member::where('status', true)->where('department', 'Marketing Engineer Team')->orderBy('serial', 'asc')->take(4)->get();

        $films = Film::where('status', true)->get();

        $careers = Career::where('status', true)->where('deadline', '>=', Carbon::today())->get();
        $products = Product::where('status', true)->get();

        return view('frontend.index', [
            'sliders' => $sliders,
            'keypoints' => $keypoints,
            'about' => $about,
            'action' => $action,
            'exhibitions' => $exhibitions,
            'exhibitionCategories' => $exhibitionCategories,
            'counters' => $counters,
            'questions' => $questions,
            'faqmain' => $faqmain,
            'newses' => $newses,
            'news_categories' => $news_categories,
            'testimonials' => $testimonials,
            'maintestimonial' => $maintestimonial,
            'clients' => $clients,
            'managements' => $managements,
            'siteEngineers' => $siteEngineers,
            'marketingEngineers' => $marketingEngineers,
            'films' => $films,
            'products' => $products,
            'careers' => $careers,
        ]);
    }


    public function exhibition()
    {
        $exhibitions = Exhibition::where('status', true)->latest()->get();
        $exhibitionCategories = ExhibitionCategory::where('status', true)->get();

        return view('frontend.exhibition', [
            'exhibitions' => $exhibitions,
            'exhibitionCategories' => $exhibitionCategories,
        ]);
    }

    public function exhibitionDetails($exhibitionId)
    {
        $exhibition = Exhibition::where('id', $exhibitionId)->where('status', true)->first();
        return view('frontend.exhibition-details', compact('exhibition'));
    }

    public function exhibitionEstimator()
    {
        $exhibitions = Exhibition::where('status', true)->get();
        $films = Film::where('status', true)->get();
        return view('frontend.exhibition_estimator', compact('exhibitions', 'films'));
    }


    public function gallery()
    {
        $albums = Album::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.gallery', compact('albums'));
    }

    public function images($number)
    {
        $media = AlbumImageVideo::query(); // start query builder without status

        if ($number) {
            $media->where('album_id', $number);
        } else {
            abort(404); // invalid type
        }

        $album = Album::where('id', $number)->first();

        $mediaItems = $media->orderBy('id', 'desc')->get();

        return view('frontend.gallery-all', compact('mediaItems', 'album'));
    }

    public function news()
    {
        $newses = Blog::where('status', true)->get();
        return view('frontend.news', compact('newses'));
    }

    public function newsDetails($slug)
    {
        $newsdetails = Blog::where('slug', $slug)->first();
        $newses = Blog::where('status', true)->where('id', '!=', $newsdetails->id)->take(4)->get();
        $news_categories = BlogCategory::where('status', true)->get();
        return view('frontend.news-details', [
            'newsdetails' => $newsdetails,
            'newses' => $newses,
            'news_categories' => $news_categories,
        ]);
    }
    public function managingTeam()
    {
        $managements = Member::where('status', true)->where('department', 'Management')->orderBy('serial', 'asc')->get();
        $siteEngineers = Member::where('status', true)->where('department', 'Site Engineer Team')->orderBy('serial', 'asc')->get();
        $marketingEngineers = Member::where('status', true)->where('department', 'Marketing Engineer Team')->orderBy('serial', 'asc')->get();
        return view('frontend.managing-team', [
            'managements' => $managements,
            'siteEngineers' => $siteEngineers,
            'marketingEngineers' => $marketingEngineers,
        ]);
    }


    public function newsCommentStore(Request $request, Blog $newsBlog)
    {
        // dd($newsBlog);
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // 2. Create the comment and associate it with the blog post
        try {
            $newsBlog->comments()->create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'message' => $validatedData['message'],
            ]);
        } catch (\Exception $e) {
            // Handle potential database errors
            return back()->with('error', 'Failed to post your comment. Please try again.');
        }

        // 3. Redirect back to the previous page (the blog post) with a success message
        return back()->with('success', 'Your comment has been posted successfully!');
    }

    public function toggleLike(Request $request, NewsBlogComment $comment)
    {
        $likedComments = $request->session()->get('liked_comments', []);

        $liked = false; // Assume the user is unliking by default

        if (in_array($comment->id, $likedComments)) {
            $comment->decrement('comment_like');

            $index = array_search($comment->id, $likedComments);
            unset($likedComments[$index]);
        } else {
            $comment->increment('comment_like');

            $likedComments[] = $comment->id;
            $liked = true; // The user has now liked the comment
        }

        // Save the updated array of liked comments back to the session
        $request->session()->put('liked_comments', $likedComments);

        // Return a JSON response with the new like count and the current liked status
        return response()->json([
            'success' => true,
            'like_count' => $comment->comment_like,
            'liked' => $liked
        ]);
    }

    public function siteEngineerTeam()
    {
        $siteEngineers = Member::where('status', true)->where('department', 'Site Engineer Team')->orderBy('serial', 'asc')->get();
        return view('frontend.site-engineer-team', [
            'siteEngineers' => $siteEngineers,
        ]);
    }

    public function marketingTeam()
    {
        $marketingEngineers = Member::where('status', true)->where('department', 'Marketing Engineer Team')->orderBy('serial', 'asc')->get();
        return view('frontend.marketing-team', [
            'marketingEngineers' => $marketingEngineers,
        ]);
    }

    public function memberDetails($memberId)
    {
        $member = Member::where('id', $memberId)->where('status', true)->first();
        return view('frontend.team-member-details', compact('member'));
    }

    public function career()
    {
        $careers = Career::where('status', true)->where('deadline', '>=', Carbon::today())->get();
        return view('frontend.career', compact('careers'));
    }


    public function aboutUs()
    {
        $about = About::where('status', true)->first();
        $clients = Client::where('status', true)->get();
        $managements = Member::where('status', true)
            ->where('department', 'Management')
            ->when(Schema::hasColumn('members', 'serial'), fn($q) => $q->orderBy('serial', 'asc'), fn($q) => $q->orderBy('designation', 'asc'))
            ->get();

        return view('frontend.about-us', [
            'managements' => $managements,
            'about' => $about,
            'clients' => $clients,
        ]);
    }


    public function whyChoose()
    {
        $whychooses = WhyWork::where('status', true)->get();

        return view('frontend.why-choose', compact('whychooses'));
    }

    public function film()
    {
        $films = Film::where('status', true)->get();

        $products = Product::where('status', true)->get();
        return view('frontend.films', [
            'products' => $products,
            'films' => $films,
        ]);
    }


    public function filmDetails($slug)
    {

        $film = Film::where('slug', $slug)->where('status', true)->firstOrFail();
        $products = Product::where('status', true)->get();
        return view('frontend.film-details', [
            'film' => $film,
            'products' => $products,
        ]);
    }


    public function products()
    {
        // $products = Product::all();

        return view('frontend.products');
    }




    public function blogs()
    {
        return app(BlogController::class)->blogs();
    }
    public function blogDetails($slug)
    {
        return app(BlogController::class)->blogDetails($slug);
    }
    public function contactUs()
    {
        return view('frontend.contact');
    }

    public function newsAndBlogs()
    {
        return app(BlogController::class)->newsAndBlogs();
    }
    public function blogTag(Request $request)
    {
        return app(BlogController::class)->blogTag($request);
    }
    public function blogCategory(Request $request)
    {
        return app(BlogController::class)->blogCategory($request);
    }
    public function searchBlogs(Request $request)
    {
        return app(BlogController::class)->searchBlogs($request);
    }

    public function product()
    {
        $products = Product::where('status', true)->get();
        return view('frontend.products', compact('products'));
    }

    public function productDetails($productId)
    {
        $product = Product::where('id', $productId)->where('status', true)->first();
        return view('frontend.product-details', compact('product'));
    }



    public function sendContactMessage(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'nullable|exists:films,id',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Insert into database
        $contact = ContactMessage::create([
            'film_id' => $validated['film_id'] ?? null,
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'status' => true,
        ]);

        return response()->json([
            'message' => 'Your message send successfully.',
            'data' => $contact
        ], 201);
    }


    public function powerhouseTeam()
    {

        $managements = Member::where('status', true)->where('department', 'Management')->orderBy('designation', 'asc')->get();
        $members = Member::where('status', true)->where('department', '!=', 'Management')->orderBy('created_at', 'asc')->get();
        return view('frontend.team', compact('managements', 'members'));
    }


    public function termsAndConditions()
    {
        $policy = Policy::where(['type' => 'terms_and_condition'])->first();
        return view('frontend.terms-and-conditions', compact('policy'));
    }
    public function privacyPolicy()
    {
        $policy = Policy::where(['type' => 'privacy_and_policy'])->first();
        return view('frontend.privacy-policy', compact('policy'));
    }
    public function apply(Request $request)
    {
        $request->validate([
            'career_id' => 'required|exists:careers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'nullable|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:5120',
        ]);


        if ($request->hasFile('cv')) {
            $cvPath = $this->handleFileUpload($request->cv, 'cv_files');
        }


        JobApplication::create([
            'career_id' => $request->career_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cover_letter' => $request->cover_letter,
            'cv' => $cvPath,
        ]);

        return response()->json([
            'success' => 'Your application has been submitted successfully!'
        ]);
    }




    public function estimatePrice()
    {
        $products = Product::where('status', true)->get();
        $films = Film::where('status', true)->get();
        return view('frontend.estimate-price', [
            'films' => $films,
            'products' => $products,
        ]);
    }
}
