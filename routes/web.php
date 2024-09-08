<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminSignupLogin\AdminSignupLoginController;
use App\Http\Controllers\adminDashboard\AdminDashboardController;
use App\Http\Controllers\noticeDocument\NoticeDocumentController;
use App\Http\Controllers\homePage\HomePageController;
use PHPUnit\Framework\TestStatus\Notice;

Route::get('/', [HomePageController::class, 'homePageView'])->name('home');


Route::get('/about', function () {
    return view('frontend.about');
});


Route::get('/notice', [NoticeDocumentController::class, 'noticeDocumentFrontendView']);



Route::get('/ourschool-admin/signup/view', [AdminSignupLoginController::class, 'adminSignupPageView'])->name('admin.signup');
Route::post('/ourschool-admin/signup/create', [AdminSignupLoginController::class, 'adminSignupPageCreate'])->name('admin.signup.create');
Route::get('/ourschool-admin/login/view', [AdminSignupLoginController::class, 'adminLoginPageView'])->name('admin.login');
Route::post('/ourschool-admin/login/create', [AdminSignupLoginController::class, 'adminLoginPageCreate'])->name('admin.login.create');
Route::post('/ourschool-admin/logout', [AdminSignupLoginController::class, 'adminLogout'])->name('admin.logout');

Route::get('/ourschool-admin/dashboard', [AdminDashboardController::class, 'adminDashboardPageView']);

Route::get('/ourschool-admin/noticedocument/view', [NoticeDocumentController::class, 'noticeDocumentPageView'])->name('admin.noticedocument.view');
Route::post('/ourschool-admin/noticedocument/create', [NoticeDocumentController::class, 'noticeDocumentPageCreate'])->name('admin.noticedocument.create');
Route::get('/ourschool-admin/noticedocument/edit/{id}', [NoticeDocumentController::class, 'noticeDocumentPageEdit'])->name('admin.noticedocument.edit');
Route::post('/ourschool-admin/noticedocument/update/{id}', [NoticeDocumentController::class, 'noticeDocumentPageUpdate'])->name('admin.noticedocument.update');
Route::get('/ourschool-admin/noticedocument/delete/{id}', [NoticeDocumentController::class, 'noticeDocumentPageDelete'])->name('admin.noticedocument.delete');

// Route::get('/ourschool-admin/login', function () {
//     return view('backend.login');
// });

// Route::get('/ourschool-admin/signup', function () {
//     return view('backend.signup');
// });

// Route::get('/ourschool-admin/logout', function () {
//     return redirect()->route('admin.login');
// });

// Route::get('/ourschool-admin/noticedocument', function () {
//     return view('backend.noticedocument');
// });

// Route::get('/ourschool-admin/editnoticedocument', function () {
//     return view('backend.editnoticedocument');
// });

// Route::get('/ourschool-admin/addnoticedocument', function () {
//     return view('backend.addnoticedocument');
// });

// Route::get('/ourschool-admin/profile', function () {
//     return view('backend.profile');
// });

// Route::get('/ourschool-admin/setting', function () {
//     return view('backend.setting');
// });

// Route::get('/ourschool-admin/gallery', function () {
//     return view('backend.gallery');
// });

// Route::get('/ourschool-admin/addgallery', function () {
//     return view('backend.addgallery');
// });

// Route::get('/ourschool-admin/editgallery', function () {
//     return view('backend.editgallery');
// });

// Route::get('/ourschool-admin/teacher', function () {
//     return view('backend.teacher');
// });

// Route::get('/ourschool-admin/addteacher', function () {
//     return view('backend.addteacher');
// });

// Route::get('/ourschool-admin/editteacher', function () {
//     return view('backend.editteacher');
// });

// Route::get('/ourschool-admin/student', function () {
//     return view('backend.student');]);




// Route::get('/ourschool-admin/dashboard', function () {
//     return view('backend.dashboard');
// });




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
