<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhyPeopleLikeUsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ImageSettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\MetaTagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LifeCycleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CouncillorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PageBannerController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AppreciationController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\NewsandUpdateController;
use App\Http\Controllers\HelplineNumberController;
use App\Http\Controllers\FrontEndAboutUsController;
use App\Http\Controllers\VideoPresentationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NewSchemeIntegrationController;
use App\Http\Controllers\AdministrativeOfficerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RolesAndPermissionMappingController;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*

*/


Route::get('/seed-admin', function () {
    Artisan::call('db:seed', [
        '--class' => 'Database\\Seeders\\AdminSeeder',
        '--force' => true, // force run even in production
    ]);

    return 'Admin seeded successfully!';
});






Route::post('/upload-image', function (Request $request) {
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);

        $url = asset('public/images/' . $filename);
        return response()->json([
            'uploaded' => 1,
            'fileName' => $filename,
            'url' => $url
        ]);
    } else {
        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'File upload failed.']
        ]);
    }
});



Route::get('/single', function() {
    return view('front-end.single');
});

Route::get('/update', function() {
   \DB::table('users')->where('email','admin@admin.com')->update(['password' => bcrypt('password')]); 
});

// Route::get('/' , [FrontEndController::class,'homePage']);
Route::get('/', function() {
    return view('welcome');
});


Route::get('/about-us', [FrontEndController::class,'aboutUs']);

Route::get('/terms-condition',function() {
    $term = Page::where('title','Terms and Condition')->first();
    return view('front-end.term-condition',compact('term'));
});

Route::get('/privacy-policy', function() {
    $term = Page::where('title','Privacy Policy')->first();
    return view('front-end.privacy-policy',compact('term'));
});

Route::get('/service', [FrontEndController::class,'services'])->name('front-end.services');

Route::post('/contact-submit', [App\Http\Controllers\FrontEndController::class, 'submit'])->name('contact.submit');

Route::get('/service/{title}', [FrontEndController::class,'singleService'])->name('front-end.single-service');

Route::get('/project/{title}', [FrontEndController::class,'singleProject'])->name('front-end.single-project');

Route::get('/about-us/{title}', [FrontEndController::class,'singleAboutUs'])->name('front-end.single-about-us');



Route::get('/category-service/{title}', [FrontEndController::class,'categoryWiseService'])->name('front-end.category-service');

Route::get('/projects', [FrontEndController::class,'projects']);

Route::get('/contact',[FrontEndController::class,'contactUs'])->name('contact.page');

Route::post('/contact', [FrontEndController::class, 'store'])->name('contact.store');

Route::get('/ai-powered-business-solutions',[FrontEndController::class, 'aiBusinessSolutions'])->name('ai-powered-business-solutions');
Route::get('/data-analytics-and-predictive-intelligence',[FrontEndController::class, 'dataAnalytics'])->name('data-analytics-and-predictive-intelligence');
Route::get('/sustainable-digital-solutions',[FrontEndController::class, 'sustainableSolutions'])->name('sustainable-digital-solutions');
Route::get('/creative-ai-and-generative-design',[FrontEndController::class, 'creativeAI'])->name('creative-ai-and-generative-design');
Route::get('/it-and_digital-transformation-solutions',[FrontEndController::class, 'itSolutions'])->name('it-and-digital-transformation-solutions');

Route::post('/newsletter', [FrontEndController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/clear-cache', function () {
    Artisan::call('optimize'); 
    dd( "Application cache cleared successfully!");
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group( function () {
    Route::get('password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('lifecycles', LifeCycleController::class);
    Route::resource('pages', PagesController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('contacts', ContactController::class);
    Route::get('/services',[ServiceController::class,'index'])->name('services.index');
    Route::get('/create-service',[ServiceController::class,'create'])->name('service.create');
    Route::post('/save-service',[ServiceController::class,'save'])->name('save.service');
    Route::get('/edit-service/{id}',[ServiceController::class,'edit'])->name('edit.service');
    Route::get('/delete-service/{id}',[ServiceController::class,'delete'])->name('delete.service');
    Route::post('/update-service',[ServiceController::class,'update'])->name('update.service');
    Route::post('/delete-all-service', [ServiceController::class, 'deleteMultipleservice'])->name('delete_all_service');
    Route::get('/change-status-service/{id}', [ServiceController::class, 'changeStatusservice'])->name('change_status_service');
    Route::resource('helpline-numbers', HelplineNumberController::class);
    Route::resource('officers', AdministrativeOfficerController::class);
    Route::resource('holidays', HolidayController::class);
    Route::resource('news_and_update', NewsandUpdateController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('contact-us', ContactUsController::class);
    Route::resource('video_presentations', VideoPresentationController::class);
    Route::resource('new_scheme_integration', NewSchemeIntegrationController::class);
    Route::resource('events', ImageController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/create-setting', [SettingController::class, 'create'])->name('setting.create');
    Route::post('/save-setting', [SettingController::class, 'save'])->name('save.setting');
    Route::get('/edit-setting/{id}', [SettingController::class, 'edit'])->name('edit.setting');
    Route::get('/delete-setting/{id}', [SettingController::class, 'delete'])->name('delete.setting');
    Route::post('/update-setting', [SettingController::class, 'update'])->name('update.setting');
    Route::post('/delete-all-setting', [SettingController::class, 'deleteMultipleSetting'])->name('delete_all_setting');
    Route::post('/delete-remove-footer-content', [SettingController::class, 'removeFooterContent'])->name('project.removeFooterContent');
    Route::post('delete-remove-header-content', [SettingController::class, 'removeHeaderContent'])->name('project.removeHeaderContent');
    Route::resource('councillors', CouncillorController::class);


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('complaints', ComplaintController::class)->except(['edit', 'update', 'destroy']);
        Route::post('complaints/update-status', [ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
        // Route::get('complaints/search', [ComplaintController::class, 'search'])->name('complaints.search'); // Add this line
        Route::get('complaints/{id}/check-status', [ComplaintController::class, 'checkStatus'])->name('complaints.checkStatus');
        Route::get('complaints/view-comments/{id}', [ComplaintController::class, 'showComments'])->name('complaints.showUsers');
        Route::delete('complaints/comments/{id}', [ComplaintController::class, 'deleteComments'])->name('complaints.deleteComments');
        // Route::post('complaints/reply/store', [ComplaintController::class, 'storeReply'])->name('complaints.reply.store');
        Route::post('/complaints/comments', [ComplaintController::class, 'storeComment'])->name('complaints.reply.store');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('suggestions', SuggestionController::class);
        Route::put('suggestions/{id}/status', [SuggestionController::class, 'updateStatus'])->name('suggestions.updateStatus');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/appreciations', [AppreciationController::class, 'index'])->name('appreciations.index');
        Route::post('appreciations/update-status', [AppreciationController::class, 'updateStatus'])->name('appreciations.updateStatus');
        Route::get('appreciations/{id}/check-status', [AppreciationController::class, 'checkStatus'])->name('appreciations.checkStatus');
    });
Route::post('/delete-all-page', [PageController::class, 'deleteMultipleCategory'])->name('delete_all_page');
    Route::get('/faq',[FaqController::class,'index'])->name('faq.index');
Route::get('/create-faq',[FaqController::class,'create'])->name('faq.create');
Route::post('/save-faq',[FaqController::class,'save'])->name('save.faq');
Route::get('/edit-faq/{id}',[FaqController::class,'edit'])->name('edit.faq');
Route::get('/delete-faq/{id}',[FaqController::class,'delete'])->name('delete.faq');
Route::post('/update-faq',[FaqController::class,'update'])->name('update.faq');
Route::post('/delete-all-faq', [FaqController::class, 'deleteMultipleCategory'])->name('delete_all_our_faq');

Route::get('/news-letters',[NewsLetterController::class,'index'])->name('newsletter.index');
Route::get('/export-news-letters',[NewsLetterController::class,'export'])->name('newsletter.export');
Route::get('/delete-news-letter/{id}',[NewsLetterController::class,'delete'])->name('delete.newsletter');
Route::post('/delete-all-news-letter', [NewsLetterController::class, 'deleteMultipleNewsLetter'])->name('delete_all_newsletter');

Route::get('/testimonails',[TestimonialController::class,'index'])->name('testimonails.index');
Route::get('/create-testimonail',[TestimonialController::class,'create'])->name('testimonail.create');
Route::post('/save-testimonail',[TestimonialController::class,'save'])->name('save.testimonail');
Route::get('/edit-testimonail/{id}',[TestimonialController::class,'edit'])->name('edit.testimonail');
Route::get('/delete-testimonail/{id}',[TestimonialController::class,'delete'])->name('delete.testimonail');
Route::post('/update-testimonail',[TestimonialController::class,'update'])->name('update.testimonail');
Route::post('/delete-all-testimonail', [TestimonialController::class, 'deleteMultipletestimonail'])->name('delete_all_testimonail');
Route::get('/change-status-testimonail/{id}', [TestimonialController::class, 'changeStatustestimonail'])->name('change_status_testimonail');


Route::get('/enquiries',[EnquiryController::class,'index'])->name('enquiries.index');
Route::get('/service-enquiries',[EnquiryController::class,'serviceIndex'])->name('service-enquiries.index');
Route::get('/export-enquiries',[EnquiryController::class,'export'])->name('export_enquiries');
// Route::get('/create-enquiry',[EnquiryController::class,'create'])->name('enquiry.create');

Route::get('/our-teams',[OurTeamController::class,'index'])->name('our-team.index');
Route::get('/create-our-team',[OurTeamController::class,'create'])->name('our-team.create');
Route::post('/save-our-team',[OurTeamController::class,'save'])->name('save.our-team');
Route::get('/edit-our-team/{id}',[OurTeamController::class,'edit'])->name('edit.our-team');
Route::get('/delete-our-team/{id}',[OurTeamController::class,'delete'])->name('delete.our-team');
Route::post('/update-our-team',[OurTeamController::class,'update'])->name('update.our-team');
Route::post('/our-team-sortable',[OurTeamController::class,'sortTable'])->name('admin.our_team_sort');
Route::post('/delete-all-our-team', [OurTeamController::class, 'deleteMultipleCategory'])->name('delete_all_our_team');

Route::get('/view-enquiry/{id}',[EnquiryController::class,'view'])->name('view.enquiry');
Route::get('/view-service-enquiry/{id}',[EnquiryController::class,'viewService'])->name('view.service_enquiry');
Route::get('/delete-enquiry/{id}',[EnquiryController::class,'delete'])->name('delete.enquiry');
Route::get('/delete-service-enquiry/{id}',[EnquiryController::class,'deleteService'])->name('delete.service-enquiry');
// Route::post('/update-enquiry',[EnquiryController::class,'update'])->name('update.enquiry');
Route::post('/delete-all-enquiry', [EnquiryController::class, 'deleteMultipleEnquiry'])->name('delete_all_enquiry');

Route::get('/image-settings',[ImageSettingController::class,'index'])->name('image_settings.index');
Route::get('/create-image-setting',[ImageSettingController::class,'create'])->name('image-setting.create');
Route::post('/save-image-setting',[ImageSettingController::class,'save'])->name('save.image-setting');
Route::get('/edit-image-setting/{id}',[ImageSettingController::class,'edit'])->name('edit.image-setting');
Route::get('/delete-image-setting/{id}',[ImageSettingController::class,'delete'])->name('delete.image-setting');
Route::post('/update-image-setting',[ImageSettingController::class,'update'])->name('update.image-setting');
Route::post('/delete-all-image-setting', [ImageSettingController::class, 'deleteMultipleslider'])->name('delete_all_image_setting');
Route::get('/change-status-image-setting/{id}', [ImageSettingController::class, 'changeStatusslider'])->name('change_status_image_setting');


Route::get('/meta-tags',[MetaTagController::class,'index'])->name('meta_tag.index');
Route::get('/create-meta-tag',[MetaTagController::class,'create'])->name('meta_tag.create');
Route::post('/save-meta-tag',[MetaTagController::class,'save'])->name('save.meta_tag');
Route::get('/edit-meta-tag/{id}',[MetaTagController::class,'edit'])->name('edit.meta_tag');
Route::get('/delete-meta-tag/{id}',[MetaTagController::class,'delete'])->name('delete.meta_tag');
Route::post('/update-meta-tag',[MetaTagController::class,'update'])->name('update.meta_tag');
Route::post('/delete-all-meta-tag', [MetaTagController::class, 'deleteMultipleCategory'])->name('delete_all_our_meta_tag');
Route::post('/get-sub-page-data',[MetaTagController::class,'getMetaTagController'])->name('get_sub_page_data');


Route::get('/projects',[CaseStudyController::class,'index'])->name('case_study.index');
Route::get('/create-projects',[CaseStudyController::class,'create'])->name('case_study.create');
Route::post('/save-projects',[CaseStudyController::class,'save'])->name('save.case_study');
Route::get('/edit-projects/{id}',[CaseStudyController::class,'edit'])->name('edit.case_study');
Route::get('/delete-projects/{id}',[CaseStudyController::class,'delete'])->name('delete.case_study');
Route::post('/update-projects',[CaseStudyController::class,'update'])->name('update.case_study');
Route::post('/delete-all-projects', [CaseStudyController::class, 'deleteMultipleCategory'])->name('delete_all_case_study');


    Route::get('/sliders',[SliderController::class,'index'])->name('sliders.index');
Route::get('/create-slider',[SliderController::class,'create'])->name('slider.create');
Route::post('/save-slider',[SliderController::class,'save'])->name('save.slider');
Route::get('/edit-slider/{id}',[SliderController::class,'edit'])->name('edit.slider');
Route::get('/delete-slider/{id}',[SliderController::class,'delete'])->name('delete.slider');
Route::post('/update-slider',[SliderController::class,'update'])->name('update.slider');
Route::post('/delete-all-slider', [SliderController::class, 'deleteMultipleslider'])->name('delete_all_slider');
Route::get('/change-status-slider/{id}', [SliderController::class, 'changeStatusslider'])->name('change_status_slider');

    
    Route::resource('about_us', AboutUsController::class);
    Route::delete('about_us/images/{imageId}', [AboutUsController::class, 'destroyImage'])->name('about_us.images.destroy');

    Route::resource('page-banners', PageBannerController::class);


    Route::get('/page-contents',[PageContentController::class,'index'])->name('page-contents.index');
    Route::get('/create-page-content',[PageContentController::class,'create'])->name('page-contents.create');
    Route::post('/save-page-content',[PageContentController::class,'store'])->name('save.page-contents');
    Route::get('/edit-page-content/{id}',[PageContentController::class,'edit'])->name('edit.page-contents');
    Route::get('/delete-page-content/{id}',[PageContentController::class,'delete'])->name('delete.page-contents');
    Route::post('/update-page-content',[PageContentController::class,'update'])->name('update.page-contents');
    Route::post('/delete-all-page-content', [PageContentController::class, 'deleteMultipleslider'])->name('delete_all_page-contents');
    Route::get('/change-status-page-content/{id}', [PageContentController::class, 'changeStatusslider'])->name('change_status_page-contents');
});





// Route::group(['middleware' =>['auth','check.module']],function(){

// Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// Route::resource('/blogs',BlogController::class);
// Route::resource('categories', CategoryController::class);
// Route::resource('departments', DepartmentController::class);
// Route::resource('lifecycles', LifeCycleController::class);
// Route::resource('pages', PagesController::class);
// Route::resource('roles', RoleController::class);
// Route::resource('users', UserController::class);
// Route::resource('contacts', ContactController::class);

// Route::prefix('admin')->group(function () {
//     // Complaint index page (list all complaints)
//     Route::get('complaints', [ComplaintController::class, 'index'])->name('admin.complaints.index');

//     // Store new complaint (admin creating complaints)
//     Route::post('complaints', [ComplaintController::class, 'store'])->name('admin.complaints.store');

//     // Update complaint status
//     Route::put('complaints/{complaint}', [ComplaintController::class, 'update'])->name('admin.complaints.update');

//     // View a specific complaint's details (admin view)
//     Route::get('complaints/{complaint}', [ComplaintController::class, 'show'])->name('admin.complaints.show');
// });

// });

Route::get('/why-people-like-us',[WhyPeopleLikeUsController::class,'index'])->name('why-people-like-us.index');
Route::get('/create-why-people-like-us',[WhyPeopleLikeUsController::class,'create'])->name('why-people-like-us.create');
Route::post('/save-why-people-like-us',[WhyPeopleLikeUsController::class,'save'])->name('why-people-like-us.save');
Route::post('/update-why-people-like-us',[WhyPeopleLikeUsController::class,'update'])->name('why-people-like-us.update');
Route::get('/edit-why-people-like-us/{id}',[WhyPeopleLikeUsController::class,'edit'])->name('edit.why-people-like-us');
Route::get('/delete-why-people-like-us/{id}',[WhyPeopleLikeUsController::class,'delete'])->name('delete.why-people-like-us');
Route::post('/delete-all-why-people-like-us', [WhyPeopleLikeUsController::class, 'deleteMultipleTrainingModel'])->name('delete_all_why_people_like_us');




require __DIR__ . '/auth.php';
