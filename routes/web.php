<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminSignupLogin\AdminSignupLoginController;



Route::get('/', function () {
    return view('frontend.home');
});


Route::get('/about', function () {
    return view('frontend.about');
});


Route::get('/notice', function () {
    return view('frontend.notice');
});


Route::get('/ourschool-admin/signup/view', [AdminSignupLoginController::class, 'adminSignupPageView']);
Route::post('/ourschool-admin/signup/create', [AdminSignupLoginController::class, 'adminSignupPageCreate']);
Route::get('/ourschool-admin/login/view', [AdminSignupLoginController::class, 'adminLoginPageView']);
Route::post('/ourschool-admin/login/create', [AdminSignupLoginController::class, 'adminLoginPageCreate']);
Route::get('/ourschool-admin/logout', [AdminSignupLoginController::class, 'adminLogout']);









// Route::get('/', 'Frontend\HomeController@index')->name('home');

// Route::get('/about', 'Frontend\AboutController@index')->name('about');

// Route::get('/contact', 'Frontend\ContactController@index')->name('contact');

// Route::get('/blog', 'Frontend\BlogController@index')->name('blog');

// Route::get('/blog/{slug}', 'Frontend\BlogController@show')->name('blog.show');

// Route::get('/gallery', 'Frontend\GalleryController@index')->name('gallery');

// Route::get('/gallery/{slug}', 'Frontend\GalleryController@show')->name('gallery.show');

// Route::get('/admission', 'Frontend\AdmissionController@index')->name('admission');

// Route::get('/department', 'Frontend\DepartmentController@index')->name('department');

// Route::get('/department/{slug}', 'Frontend\DepartmentController@show')->name('department.show');

// Route::get('/faculty', 'Frontend\FacultyController@index')->name('faculty');

// Route::get('/faculty/{slug}', 'Frontend\FacultyController@show')->name('faculty.show');

// Route::get('/news', 'Frontend\NewsController@index')->name('news');

// Route::get('/news/{slug}', 'Frontend\NewsController@show')->name('news.show');

// Route::get('/event', 'Frontend\EventController@index')->name('event');

// Route::get('/event/{slug}', 'Frontend\EventController@show')->name('event.show');

// Route::get('/career', 'Frontend\CareerController@index')->name('career');

// Route::get('/career/{slug}', 'Frontend\CareerController@show')->name('career.show');

// Route::get('/research', 'Frontend\ResearchController@index')->name('research');

// Route::get('/research/{slug}', 'Frontend\ResearchController@show')->name('research.show');

// Route::get('/publication', 'Frontend\PublicationController@index')->name('publication');

// Route::get('/publication/{slug}', 'Frontend\PublicationController@show')->name('publication.show');

// Route::get('/testimonial', 'Frontend\TestimonialController@index')->name('testimonial');

// Route::get('/testimonial/{slug}', 'Frontend\TestimonialController@show')->name('testimonial.show');

// Route::get('/faq', 'Frontend\FaqController@index')->name('faq');
