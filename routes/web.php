<?php

use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\EstimationController;
use App\Models\Client;
use App\Models\CallToAction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\FaqMainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ExhibitionController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WhyWorkController;
use App\Http\Controllers\Admin\KeypointController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CoverImageController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\CallToActionController;
use App\Http\Controllers\Admin\ManageUser\RoleController;
use App\Http\Controllers\Admin\ManageUser\UserController;
use App\Http\Controllers\Admin\TestimonialMainController;
use App\Http\Controllers\Admin\ManageUser\PermissionController;



Route::get('/estimations/lookup', [EstimationController::class, 'lookup'])
    ->name('estimations.lookup.public')
    ->withoutMiddleware(['auth', 'verified']);
Route::get('/films/{id}/types', [EstimationController::class, 'getTypes']);
Route::get('/products/colors/{id}', [ProductController::class, 'getProductColors'])
    ->name('products.colors');

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.page');
    Route::get('/about-us', 'aboutUs')->name('about-us.page');
    Route::get('/why-choose', 'whyChoose')->name('why-choose.page');
    Route::get('/films', 'film')->name('film.page');

    Route::get('/films/details/{slug}', 'filmDetails')->name('film.details');
    Route::get('/products', 'products')->name('products.page');
    Route::get('/news', 'news')->name('news.page');
    Route::get('/news/details/{slug}', 'newsDetails')->name('news.details');
    Route::post('/news/{newsBlog}/comments', 'newsCommentStore')->name('comments.store');
    Route::post('/comments/{comment}/like', 'toggleLike')->name('comments.like');
    Route::get('/blogs/tag', 'blogTag')->name('blog.tag');
    Route::get('/contact-us', 'contactUs')->name('contact-us.page');
    Route::get('/blogs/category', 'blogCategory')->name('blog.category');

    Route::get('/news-and-blogs', 'newsAndBlogs')->name('all.blogs');
    Route::get('/powerhouse-team', 'powerhouseTeam')->name('powerhouse.team');

    Route::get('/blogs/search', 'searchBlogs')->name('blogs.search');

    Route::get('/products', 'product')->name('product.page');
    Route::get('/products/details/{productId}', 'productDetails')->name('product.details.page');

    Route::get('/exhibition/estimator', 'exhibitionEstimator')->name('exhibition.estimator');

    Route::get('/exhibitions', 'exhibition')->name('exhibition.page');
    Route::get('/exhibitions/details/{exhibitionId}', 'exhibitionDetails')->name('exhibition.details.page');
    Route::get('/gallery', 'gallery')->name('gallery.page');
    Route::get('/gallery/{number}', 'images')->name('gallery.all');

    Route::get('/managing-team', 'managingTeam')->name('managing-team.page');
    Route::get('/site-engineer-team', 'siteEngineerTeam')->name('site-engineer-team.page');
    Route::get('/marketing-team', 'marketingTeam')->name('marketing-team.page');
    Route::get('/team-member/details/{memberId}', 'memberDetails')->name('member.details.page');



    Route::get('/career', 'career')->name('career.page');

    Route::post('/contact-messege/send', 'sendContactMessage')->name('contactmessage.send');

    Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions.page');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy.page');
    Route::post('/job-apply', 'apply')->name('job.apply');


    Route::get('/get-estimate-price/{film_id}/{product_id}', 'getEstimatePrice');
    Route::get('/estimate-price', 'estimatePrice')->name('estimate-price.page');
});

Route::middleware(['auth:admin', 'verified'])->group(function () {
    // support apis
    Route::get('/active-clients', [ClientController::class, 'activeClients'])->name('active.clients');


    Route::prefix('/dashboard')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'adminDashboard')->name('dashboard');
    });
    Route::prefix('/dashboard')->controller(SliderController::class)->group(function () {
        Route::get('/slider', 'index')->name('slider.index');
        Route::post('/slider/store', 'store')->name('slider.store');
        Route::get('/slider/toggle-status/{id}', 'toggleStatus')->name('slider.toggle-status');
        Route::put('/slider/update/{id}', 'update')->name('slider.update');
        Route::delete('/slider/destroy/{id}', 'destroy')->name('slider.destroy');
        Route::get('/slider-counter/toggle-status/{id}', 'counterToggleStatus')->name('slider-counter.toggle-status');
        Route::put('/slider-counter/update/{id}', 'counterUpdate')->name('slider-counter.update');
    });
    Route::prefix('/dashboard')->controller(CounterController::class)->group(function () {
        Route::get('/counter', 'index')->name('counter.index');
        Route::post('/counter/store', 'store')->name('counter.store');
        Route::get('/counter/toggle-status/{id}', 'toggleStatus')->name('counter.toggle-status');
        Route::put('/counter/update/{id}', 'update')->name('counter.update');
        Route::delete('/counter/destroy/{id}', 'destroy')->name('counter.destroy');
    });

    Route::prefix('/dashboard')->controller(KeypointController::class)->group(function () {
        Route::get('/keypoint', 'index')->name('keypoint.index');
        Route::get('/keypoint/list', 'list')->name('keypoint.list');
        Route::post('/keypoints/{id}/update', 'update')->name('keypoint.update');
        Route::post('/keypoint/store', 'store')->name('keypoint.store');
        Route::delete('/keypoints/{id}', 'destroy')->name('keypoint.destroy');
        Route::get('/keypoints/toggle-status/{id}', 'toggleStatus')->name('keypoint.toggle-status');
    });

    Route::prefix('/dashboard')->controller(ExhibitionController::class)->group(function () {
        Route::get('/exhibition/category', 'category')->name('exhibition.category');
        Route::get('/exhibition', 'index')->name('exhibition.index');

        Route::post('/exhibition-category/store', 'categoryStore')->name('exhibition-category.store');
        Route::get('/exhibition-category/toggle-status/{id}', 'categoryToggleStatus')->name('exhibition-category.toggle-status');
        Route::put('/exhibition-category/update/{id}', 'categoryUpdate')->name('exhibition-category.update');
        Route::delete('/exhibition-category/destroy/{id}', 'categoryDestroy')->name('exhibition-category.destroy');

        Route::post('/exhibition/store', 'store')->name('exhibition.store');
        Route::get('/exhibition/toggle-status/{id}', 'toggleStatus')->name('exhibition.toggle-status');
        Route::put('/exhibition/update/{id}', 'update')->name('exhibition.update');
        Route::delete('/exhibition/destroy/{id}', 'destroy')->name('exhibition.destroy');

        // সব ইমেজ load করার জন্য
        Route::get('/exhibition/{id}/images', 'getImages');

        // Single image delete করার জন্য
        Route::delete('/exhibition/image/{id}', 'deleteImage');
    });

    Route::prefix('/dashboard')->controller(CallToActionController::class)->group(function () {
        Route::get('/call-to-action', 'index')->name('action.index');
        Route::get('/call-to-action/toggle-status/{id}', 'toggleStatus')->name('action.toggle-status');
        Route::put('/call-to-action/update/{id}', 'update')->name('action.update');
    });
    Route::prefix('/dashboard')->controller(ApplicationController::class)->group(function () {
        Route::get('/application', 'index')->name('application.index');
        Route::post('/application/store', 'store')->name('application.store');
        Route::get('/application/toggle-status/{id}', 'toggleStatus')->name('application.toggle-status');
        Route::post('/application/show-url/{id}', 'showURL')->name('application.showUrl');
        Route::put('/application/update/{id}', 'update')->name('application.update');
        Route::delete('/application/destroy/{id}', 'destroy')->name('application.destroy');
    });
    Route::prefix('/dashboard')->controller(AboutUsController::class)->group(function () {
        Route::get('/about-us', 'index')->name('about-us');
        Route::get('/about-us/toggle-status/{id}', 'toggleStatus')->name('about-us.toggle-status');
        Route::get('/about-us/edit/{id}', 'edit')->name('about-us.edit');
        Route::put('/about-us/update/{id}', 'update')->name('about-us.update');

        Route::post('/about-us/remove-point/{id}', 'removePoint')->name('about-us.remove-point');
    });
    Route::prefix('/dashboard')->controller(WhyWorkController::class)->group(function () {
        Route::get('/why-work', 'index')->name('why-work.index');
        Route::post('/why-work/store', 'store')->name('why-work.store');
        Route::get('/why-work/toggle-status/{id}', 'toggleStatus')->name('why-work.toggle-status');
        Route::put('/why-work/update/{id}', 'update')->name('why-work.update');
        Route::delete('/why-work/destroy/{id}', 'destroy')->name('why-work.destroy');
    });

    Route::prefix('/dashboard')->controller(ProductController::class)->group(function () {
        Route::get('products', 'index')->name('products.index');
        Route::post('products', 'store')->name('products.store');
        Route::get('products/{product}/edit', 'edit')->name('products.edit');
        Route::delete('products/{product}', 'destroy')->name('products.destroy');
        Route::post('products/{product}/toggle-status', 'toggleStatus')->name('products.toggle-status');
    });


    Route::prefix('/dashboard')->controller(EstimationController::class)->group(function () {
        Route::get('estimations', 'index')->name('admin.estimations.index');              // DataTables source + page
        Route::post('estimations', 'store')->name('admin.estimations.store');             // create
        Route::get('estimations/{estimation}', 'show')->name('admin.estimations.show');   // read single (JSON)
        Route::get('estimations/{estimation}/edit', 'edit')->name('admin.estimations.edit'); // load for modal
        Route::put('estimations/{estimation}', 'update')->name('admin.estimations.update');  // update
        Route::delete('estimations/{estimation}', 'destroy')->name('admin.estimations.destroy');     // delete
        Route::get('products/simple-list', 'productsimpleList')->name('products.simple-list');
        Route::get('films/simple-list', 'filmsimpleList')->name('films.simple-list');
        Route::get('estimations/lookup', 'lookup')->name('admin.estimations.lookup');

        Route::get('/products/{id}/colors', 'getColors');

        Route::get('/films/{id}/types', 'getTypes');
    });


    Route::prefix('/dashboard')->controller(FilmController::class)->group(function () {
        Route::get('/film', 'index')->name('film.index');
        Route::post('/film/store', 'store')->name('film.store');
        Route::get('/film/toggle-status/{id}', 'toggleStatus')->name('film.toggle-status');
        Route::get('/film/edit/{id}', 'edit')->name('film.edit');

        Route::delete('/film/image/{id}', 'removeImage')->name('film.image.destroy');



        Route::get('/api/films/{film}', [FilmController::class, 'apiFilmShow']);
        Route::put('/api/films/why-need/update/{film}', [FilmController::class, 'apiWhyNeedUpdate'])->name('why-need.update');
        Route::delete('/api/films/{film}/needs/{filmNeed}', [FilmController::class, 'apiWhyNeedDestroy'])->name('why-need.destroy');


        Route::put('/film/update/{id}', 'update')->name('film.update');
        Route::delete('/film/destroy/{id}', 'destroy')->name('film.destroy');
        //    Route::put('/film/why-need/update/{id}',  'whyNeed')->name('why-need.update');

        Route::put('/film/offered-films/{film}', 'offeredFilm')->name('offered-films.update');
        // Route::put('/film/offered-films/update/{id}',  'offeredFilm')->name('offered-films.update');
        Route::post('/film/film-faq/update/{id}', 'faqUpdate')->name('film-faq.update');
        Route::put('/film/development-process/update/{id}', 'processUpdate')->name('development-process.update');
        Route::post('/film/technology/update/{id}', 'technologyUpdate')->name('technology.update');

        Route::post('/film/provided-client/store/{id}', 'storeclient')->name('provided-client.store');
        Route::post('/film/provided-client/toggle-status/{id}', 'toggleclientStatus')->name('provided-client.toggle-status');
        Route::post('/film/provided-client/update/{id}', 'updateclient')->name('provided-client.update');
        Route::post('/film/provided-client/show-url/{id}', 'showURL')->name('provided-client.showUrl');
        Route::delete('/film/provided-client/destroy/{id}', 'destroyclient')->name('provided-client.destroy');


        Route::delete('/film/benefits/{id}', 'destroyBenefit')->name('film.benefit.destroy');
        Route::delete('/film/offered-films/{id}', 'destroyOfferedFilms')->name('film.offered-films.destroy');
        Route::delete('/film/development-process/{id}', 'destroyDevelopmentProcess')->name('film.development-process.destroy');
        Route::delete('/film/technology/{id}', 'destroyTechnology')->name('film.technology.destroy');
        Route::delete('/film/faq/{id}', 'destroyFaq')->name('film.faq.destroy');
    });
    Route::prefix('/dashboard')->controller(CareerController::class)->group(function () {
        Route::get('/career', 'index')->name('career.index');
        Route::post('/career/store', 'store')->name('career.store');
        Route::get('/career/toggle-status/{id}', 'toggleStatus')->name('career.toggle-status');
        Route::get('/career/edit/{id}', 'edit')->name('career.edit');

        Route::put('/career/update/{id}', 'update')->name('career.update');
        Route::delete('/career/destroy/{id}', 'destroy')->name('career.destroy');

        Route::get('/career/applications/{id}', 'getApplications')->name('career.applications');
        Route::delete('/career/job-applications/{id}/{careerId}',  'destroyApplication')->name('career.application.destroy');
    });

    Route::prefix('/dashboard')->controller(CoverImageController::class)->group(function () {
        Route::get('/cover-image', 'index')->name('cover-image');
        Route::get('/cover-images', 'loadCoverImage')->name('cover-images.index');

        Route::post('/cover_images', 'store')->name('cover_images.store');
        // New route for updating a specific cover image
        Route::post('/cover-image/update', 'updateImage')->name('cover-image.update');
    });

    Route::prefix('/dashboard')->controller(ContactController::class)->group(function () {
        Route::get('/messages', 'contactMessages')->name('contact.messages');
        Route::get('/messages/unread', 'unreadContactMessages')->name('contact.messages.unread');
        Route::get('/messages/read', 'readContactMessages')->name('contact.messages.read');

        Route::get('/api/messages', 'apiMessages')->name('api.messages');
        Route::get('/api/read/messages', 'readMessages')->name('api.read.messages');
        Route::post('/api/messages/{id}/status', 'updateStatus');
        Route::delete('/api/messages/{id}', 'destroyMessage');
    });


    Route::prefix('/dashboard/member')->controller(MemberController::class)->group(function () {
        Route::get('/', 'index')->name('member.index');
        Route::get('/get', 'get')->name('member.get');
        Route::post('/store', 'store')->name('member.store');
        Route::get('/edit/{id}', 'edit')->name('member.edit');
        Route::put('/update/{id}', 'update')->name('member.update');
        Route::delete('/delete/{id}', 'destroy')->name('member.destroy');
        Route::post('/status/{id}', 'status')->name('member.status');



        Route::get('/management-body/index', 'indexManagementBody')->name('management.body.index');
        Route::get('/management-body/get', 'getManagementBody')->name('management.body.get');
        Route::post('/management-body/store', 'storeManagementBody')->name('management.body.store');
        Route::get('/management-body/edit/{id}', 'editManagementBody')->name('management.body.edit');
        Route::put('/management-body/update/{id}', 'updateManagementBody')->name('management.body.update');
        Route::delete('/management-body/delete/{id}', 'destroyManagementBody')->name('management.body.destroy');
        Route::post('/management-body/status/{id}', 'statusManagementBody')->name('management.body.status');
    });


    Route::prefix('/dashboard')->controller(ClientController::class)->group(function () {
        Route::get('/client', 'index')->name('client');
        Route::post('/client/store', 'store')->name('client.store');
        Route::get('/client/toggle-status/{id}', 'toggleStatus')->name('client.toggle-status');
        Route::post('/client/show-url/{id}', 'showURL')->name('client.showUrl');
        Route::put('/client/update/{id}', 'update')->name('client.update');
        Route::delete('/client/destroy/{id}', 'destroy')->name('client.destroy');
    });
    Route::prefix('/dashboard')->controller(TestimonialController::class)->group(function () {
        Route::get('/testimonial', 'index')->name('testimonial');
        Route::post('/testimonial/store', 'store')->name('testimonial.store');
        Route::get('/testimonial/toggle-status/{id}', 'toggleStatus')->name('testimonial.toggle-status');
        Route::put('/testimonial/update/{id}', 'update')->name('testimonial.update');
        Route::delete('/testimonial/destroy/{id}', 'destroy')->name('testimonial.destroy');
    });
    Route::prefix('/dashboard')->controller(TestimonialMainController::class)->group(function () {
        Route::get('/testimonial_main', 'index')->name('testimonial_main.index');
        Route::post('/testimonial_main/store', 'store')->name('testimonial_main.store');
        Route::get('/testimonial_main/toggle-status/{id}', 'toggleStatus')->name('testimonial_main.toggle-status');
        Route::put('/testimonial_main/update/{id}', 'update')->name('testimonial_main.update');
    });
    Route::prefix('/dashboard')->controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('blog.index');
        Route::post('/blog/category/store', 'storeCategory')->name('blog-category.store');
        Route::get('/blog/category/toggle-status/{id}', 'toggleCategoryStatus')->name('blog-category.toggle-status');
        Route::put('/blog/category/update/{id}', 'updateCategory')->name('blog-category.update');
        Route::delete('/blog/category/destroy/{id}', 'destroyCategory')->name('blog-category.destroy');
        Route::post('/blog/store', 'store')->name('blog.store');
        Route::get('/blog/toggle-status/{id}', 'toggleStatus')->name('blog.toggle-status');
        Route::put('/blog/update/{id}', 'update')->name('blog.update');
        Route::delete('/blog/destroy/{id}', 'destroy')->name('blog.destroy');
    });
    Route::prefix('/dashboard')->controller(FaqController::class)->group(function () {
        Route::get('/faq', 'index')->name('faq');
        Route::post('/faq/store', 'store')->name('faq.store');
        Route::get('/faq/toggle-status/{id}', 'toggleStatus')->name('faq.toggle-status');
        Route::put('/faq/update/{id}', 'update')->name('faq.update');
        Route::delete('/faq/destroy/{id}', 'destroy')->name('faq.destroy');
    });
    Route::prefix('/dashboard')->controller(FaqMainController::class)->group(function () {
        Route::get('/faq_main', 'index')->name('faq_main.index');
        Route::get('/faq_main/toggle-status/{id}', 'toggleStatus')->name('faq_main.toggle-status');
        Route::put('/faq_main/update/{id}', 'update')->name('faq_main.update');
    });

    Route::prefix('/dashboard')->controller(AlbumController::class)->group(function () {
        Route::get('/album', 'index')->name('album.index');
        Route::post('/album/store', 'store')->name('album.store');
        Route::get('/album/datatable', 'getDatatable')->name('album.datatable');
        Route::post('/album/image-video/store', 'storeImageVideo')->name('album.imageVideo.store');

        Route::get('/album/toggle-status/{id}', 'toggleStatus')->name('album.toggle-status');
        Route::get('/album/{id}/edit', 'edit')->name('album.edit');

        Route::get('/album/get/image-video/{id}', 'getImageVideo')->name('album.imageVideo');

        Route::delete('/album/image-video/delete/{id}', 'deleteImageVideo')->name('album.imageVideo.delete');

        Route::put('/album/update/{id}', 'update')->name('album.update');
        Route::delete('/album/destroy/{id}', 'destroy')->name('album.destroy');
    });

    Route::prefix('/dashboard')->controller(PolicyController::class)->group(function () {
        Route::get('/policy/privacy-policy', 'privacyPolicy')->name('privacy-policy');
        Route::get('/policy/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
        Route::get('/policy/update', 'update')->name('policy.update');
    });

    Route::prefix('/dashboard')->controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact');
        Route::post('/contact/store', 'store')->name('contact.store');
        Route::get('/contact/toggle-status/{id}', 'toggleStatus')->name('contact.toggle-status');
        Route::put('/contact/update/{id}', 'update')->name('contact.update');
        Route::delete('/contact/destroy/{id}', 'destroy')->name('contact.destroy');
    });
    Route::prefix('/dashboard')->controller(SettingController::class)->group(function () {
        Route::get('/setting', 'index')->name('settings.index');
        Route::put('/setting/update/{id}', [SettingController::class, 'update'])->name('settings.update');
    });

    Route::prefix('/dashboard/maintenance')->controller(MaintenanceController::class)->group(function () {
        Route::get('/', 'index')->name('maintenance');
        Route::get('/cache-clear', 'clearCache')->name('cache-clear');
        Route::get('/storage-link', 'storageLink')->name('storage-link');
    });

    Route::resource('/dashboard/manageuser', UserController::class);
    Route::get('/dashboard/manageuser/status/{id}', [UserController::class, 'status'])->name('status.manageuser');
    Route::resource('/dashboard/manageuserrole', RoleController::class);
    Route::get('/dashboard/manageuserrole/role/{roleId}', [RoleController::class, 'addPermissionToRole'])->name('manageuserrole.addPermissionToRole');
    Route::put('/dashboard/manageuserrole/role/{roleId}', [RoleController::class, 'givePermissionToRole'])->name('manageuserrole.givePermissionToRole');
    Route::resource('/dashboard/permission', PermissionController::class);
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/admin-login', 'adminLogin')->name('admin-login');
    Route::post('/custom-logout', 'logout')->name('custom-logout');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
