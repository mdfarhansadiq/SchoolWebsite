<?php

use App\Http\Controllers\aboutPage\AboutPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminSignupLogin\AdminSignupLoginController;
use App\Http\Controllers\adminDashboard\AdminDashboardController;
use App\Http\Controllers\adminRolePermission\AdminRolePermissionController;
use App\Http\Controllers\admissionInfo\AdmissionInfoController;
use App\Http\Controllers\classNumber\ClassNumberController;
use App\Http\Controllers\classSection\ClassSectionController;
use App\Http\Controllers\contactPage\ContactPageController;
use App\Http\Controllers\noticeDocument\NoticeDocumentController;
use App\Http\Controllers\homePage\HomePageController;
use App\Http\Controllers\lectureAndNoteFile\LectureNoteFileController;
use App\Http\Controllers\onlineClassLink\OnlineClassLinkController;
use App\Http\Controllers\teacherInfo\TeacherInfoController;
use App\Http\Controllers\teacherLoginSignup\TeacherLoginSignupController;
use App\Http\Controllers\onlineClassVideo\OnlineClassVideoController;
use App\Http\Controllers\photoFileLink\PhotoFileLinkController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\TestStatus\Notice;

Route::get('/', [HomePageController::class, 'homePageView'])->name('home');


Route::get('/about', [AboutPageController::class, 'aboutPageView'])->name('about');

Route::get('/contact', [ContactPageController::class, 'contactPageView'])->name('contact.view');
Route::post('/contact/create', [ContactPageController::class, 'contactPageCreate'])->name('contact.create');


Route::get('/notice', [NoticeDocumentController::class, 'noticeDocumentFrontendView']);
Route::get('/teacher', [TeacherInfoController::class, 'allTeacherInfoToFrontEnd']);
Route::get('/teacher/detail/serial-number={id}', [TeacherInfoController::class, 'specificTeacherDetail']);


Route::get('/online-class-link', [OnlineClassLinkController::class, 'onlineClassLinkFrontendView'])->name('online-class-link.view');
Route::get('/online-class-link/result', [OnlineClassLinkController::class, 'onlineClassLinkFrontendFind'])->name('online-class-link.result');


Route::get('/class-recording', [OnlineClassVideoController::class, 'classVideoPageFrontendView'])->name('class-record.view');
Route::get('/class-recording/result', [OnlineClassVideoController::class, 'classVideoPageFrontendFind'])->name('class-record.result');


Route::get('/admission-info', [AdmissionInfoController::class, 'admissionInfoFrontendView'])->name('admission-info.view');



Route::get('/ourschool-admin/signup/view', [AdminSignupLoginController::class, 'adminSignupPageView'])->name('admin.signup');
Route::post('/ourschool-admin/signup/create', [AdminSignupLoginController::class, 'adminSignupPageCreate'])->name('admin.signup.create');
Route::get('/ourschool-admin/login/view', [AdminSignupLoginController::class, 'adminLoginPageView'])->name('admin.login');
Route::post('/ourschool-admin/login/create', [AdminSignupLoginController::class, 'adminLoginPageCreate'])->name('admin.login.create');
Route::post('/ourschool-admin/logout', [AdminSignupLoginController::class, 'adminLogout'])->name('admin.logout');

Route::get('/ourschool-admin/dashboard', [AdminDashboardController::class, 'adminDashboardPageView'])->name('admin.dashboard');

Route::get('/ourschool-admin/admin-role/view', [AdminRolePermissionController::class, 'adminRolePermissionPageView'])->name('admin.role.view');
Route::post('/ourschool-admin/admin-role/create', [AdminRolePermissionController::class, 'adminRolePermissionPageCreate'])->name('admin.role.create');
Route::get('/ourschool-admin/admin-role/edit/{id}', [AdminRolePermissionController::class, 'adminRolePermissionPageEdit'])->name('admin.role.edit');
Route::post('/ourschool-admin/admin-role/update/{id}', [AdminRolePermissionController::class, 'adminRolePermissionPageUpdate'])->name('admin.role.update');
Route::get('/ourschool-admin/admin-role/delete/{id}', [AdminRolePermissionController::class, 'adminRolePermissionPageDelete'])->name('admin.role.delete');

Route::get('/ourschool-admin/noticedocument/view', [NoticeDocumentController::class, 'noticeDocumentPageView'])->name('admin.noticedocument.view');
Route::post('/ourschool-admin/noticedocument/create', [NoticeDocumentController::class, 'noticeDocumentPageCreate'])->name('admin.noticedocument.create');
Route::get('/ourschool-admin/noticedocument/edit/{id}', [NoticeDocumentController::class, 'noticeDocumentPageEdit'])->name('admin.noticedocument.edit');
Route::post('/ourschool-admin/noticedocument/update/{id}', [NoticeDocumentController::class, 'noticeDocumentPageUpdate'])->name('admin.noticedocument.update');
Route::get('/ourschool-admin/noticedocument/delete/{id}', [NoticeDocumentController::class, 'noticeDocumentPageDelete'])->name('admin.noticedocument.delete');

Route::get('/ourschool-admin/teacher/view', [TeacherInfoController::class, 'teacherInfoPageView'])->name('admin.teacher.view');
Route::post('/ourschool-admin/teacher/create', [TeacherInfoController::class, 'teacherInfoPageCreate'])->name('admin.teacher.create');
Route::get('/ourschool-admin/teacher/edit/{id}', [TeacherInfoController::class, 'teacherInfoPageEdit'])->name('admin.teacher.edit');
Route::post('/ourschool-admin/teacher/update/{id}', [TeacherInfoController::class, 'teacherInfoPageUpdate'])->name('admin.teacher.update');
Route::get('ourschool-admin/teacher/delete/{id}', [TeacherInfoController::class, 'teacherInfoPageDelete'])->name('admin.teacher.delete');


Route::get('/ourschool-admin/teacher/another/view', [TeacherInfoController::class, 'teacherInfoAnotherPageView'])->name('admin.teacher.another.view');
Route::post('/ourschool-admin/teacher/another/create', [TeacherInfoController::class, 'teacherInfoAnotherPageCreate'])->name('admin.teacher.another.create');
Route::get('/ourschool-admin/teacher/another/edit/{id}', [TeacherInfoController::class, 'teacherInfoAnotherPageEdit'])->name('admin.teacher.another.edit');
Route::post('/ourschool-admin/teacher/another/update/{id}', [TeacherInfoController::class, 'teacherInfoAnotherPageUpdate'])->name('admin.teacher.another.update');


Route::post('/ourschool-admin/teacher/publish-status/update', [TeacherInfoController::class, 'teacherInfoPublishStatusUpdate'])->name('admin.teacher-info-publish-status.update');
Route::post('/ourschool-admin/teacher/publish-status/delete', [TeacherInfoController::class, 'teacherInfoPublishStatusDelete'])->name('admin.teacher-info-publish-status.delete');


Route::get('/ourschool-admin/teacher-login-signup-info/view', [TeacherLoginSignupController::class, 'teacherLoginSignupInfoPageView'])->name('admin.teacher-login-signup-info.view');
Route::post('/ourschool-admin/teacher-login-signup-info/create', [TeacherLoginSignupController::class, 'teacherLoginSignupInfoPageCreate'])->name('admin.teacher-login-signup-info.create');



Route::get('/ourschool-admin/class-number/view', [ClassNumberController::class, 'classNumberPageView'])->name('admin.class-number.view');
Route::post('/ourschool-admin/class-number/create', [ClassNumberController::class, 'classNumberPageCreate'])->name('admin.class-number.create');
Route::get('/ourschool-admin/class-number/edit/{id}', [ClassNumberController::class, 'classNumberPageEdit'])->name('admin.class-number.edit');
Route::post('/ourschool-admin/class-number/update/{id}', [ClassNumberController::class, 'classNumberPageUpdate'])->name('admin.class-number.update');
Route::get('/ourschool-admin/class-number/delete/{id}', [ClassNumberController::class, 'classNumberPageDelete'])->name('admin.class-number.delete');

Route::get('/ourschool-admin/class-section/view', [ClassSectionController::class, 'classSectionPageView'])->name('admin.class-section.view');
Route::post('/ourschool-admin/class-section/create', [ClassSectionController::class, 'classSectionPageCreate'])->name('admin.class-section.create');
Route::get('/ourschool-admin/class-section/edit/{id}', [ClassSectionController::class, 'classSectionPageEdit'])->name('admin.class-section.edit');
Route::post('/ourschool-admin/class-section/update/{id}', [ClassSectionController::class, 'classSectionPageUpdate'])->name('admin.class-section.update');
Route::get('/ourschool-admin/class-section/delete/{id}', [ClassSectionController::class, 'classSectionPageDelete'])->name('admin.class-section.delete');

Route::get('/ourschool-admin/class-record/view', [OnlineClassVideoController::class, 'classVideoPageView'])->name('admin.class-record.view');
Route::get('/ourschool-admin/class-record/select-data/{id}', [OnlineClassVideoController::class, 'classSectionSelectData'])->name('admin.class-record.select-data');
Route::post('/ourschool-admin/class-record/create', [OnlineClassVideoController::class, 'classVideoPageCreate'])->name('admin.class-record.create');
Route::get('/ourschool-admin/class-record/edit/{id}', [OnlineClassVideoController::class, 'classVideoPageEdit'])->name('admin.class-record.edit');
Route::post('/ourschool-admin/class-record/update/{id}', [OnlineClassVideoController::class, 'classVideoPageUpdate'])->name('admin.class-record.update');
Route::get('/ourschool-admin/class-record/delete/{id}', [OnlineClassVideoController::class, 'classVideoPageDelete'])->name('admin.class-record.delete');


Route::get('/ourschool-admin/online-class-link/view', [OnlineClassLinkController::class, 'onlineClassLinkPageView'])->name('admin.online-class-link.view');
Route::get('/ourschool-admin/online-class-link/select-data/{id}', [OnlineClassLinkController::class, 'classSectionSelectData'])->name('admin.online-class-link.select-data');
Route::post('ourschool-admin/online-class-link/create', [OnlineClassLinkController::class, 'onlineClassLinkPageCreate'])->name('admin.online-class-link.create');
Route::get('/ourschool-admin/online-class-link/edit/{id}', [OnlineClassLinkController::class, 'onlineClassLinkPageEdit'])->name('admin.online-class-link.edit');
Route::post('/ourschool-admin/online-class-link/update/{id}', [OnlineClassLinkController::class, 'onlineClassLinkPageUpdate'])->name('admin.online-class-link.update');
Route::get('/ourschool-admin/online-class-link/delete/{id}', [OnlineClassLinkController::class, 'onlineClassLinkPageDelete'])->name('admin.online-class-link.delete');

Route::get('/ourschool-admin/lecture-note-file/view', [LectureNoteFileController::class, 'lectureNoteFilePageView'])->name('admin.lecture-note-file.view');
Route::get('/ourschool-admin/lecture-note-file/select-data/{id}', [OnlineClassVideoController::class, 'classSectionSelectData'])->name('admin.class-record.select-data');
Route::post('/ourschool-admin/lecture-note-file/create', [LectureNoteFileController::class, 'lectureNoteFilePageCreate'])->name('admin.lecture-note-file.create');
Route::get('/ourschool-admin/lecture-note-file/edit/{id}', [LectureNoteFileController::class, 'lectureNoteFilePageEdit'])->name('admin.lecture-note-file.edit');
Route::post('/ourschool-admin/lecture-note-file/update/{id}', [LectureNoteFileController::class, 'lectureNoteFilePageUpdate'])->name('admin.lecture-note-file.update');
Route::get('/ourschool-admin/lecture-note-file/delete/{id}', [LectureNoteFileController::class, 'lectureNoteFilePageDelete'])->name('admin.lecture-note-file.delete');

Route::get('/ourschool-admin/photo-file/view', [PhotoFileLinkController::class, 'photoFileLinkPageView'])->name('admin.photo-file.view');
Route::post('/ourschool-admin/photo-file/create', [PhotoFileLinkController::class, 'photoFileLinkPageCreate'])->name('admin.photo-file.create');
Route::get('/ourschool-admin/photo-file/edit/{id}', [PhotoFileLinkController::class, 'photoFileLinkPageEdit'])->name('admin.photo-file.edit');
Route::post('/ourschool-admin/photo-file/update/{id}', [PhotoFileLinkController::class, 'photoFileLinkPageUpdate'])->name('admin.photo-file.update');
Route::get('/ourschool-admin/photo-file/delete/{id}', [PhotoFileLinkController::class, 'photoFileLinkPageDelete']);
Route::get('/ourschool-admin/photo-file-specific/delete/view/{id}', [PhotoFileLinkController::class, 'photoFileLinkSpecificPageDeleteView']);
Route::post('/ourschool-admin/photo-file-specific/delete/post', [PhotoFileLinkController::class, 'photoFileLinkSpecificPageDeletePost']);




Route::get('/ourschool-admin/admission-info/view', [AdmissionInfoController::class, 'admissionInfoPageView'])->name('admin.admission-info.view');
Route::post('/ourschool-admin/admission-info/create', [AdmissionInfoController::class, 'admissionInfoPageCreate'])->name('admin.admission-info.create');
Route::get('/ourschool-admin/admission-info/edit/{id}', [AdmissionInfoController::class, 'admissionInfoPageEdit'])->name('admin.admission-info.edit');
Route::post('/ourschool-admin/admission-info/update/{id}', [AdmissionInfoController::class, 'admissionInfoPageUpdate'])->name('admin.admission-info.update');
Route::get('/ourschool-admin/admission-info/delete/{id}', [AdmissionInfoController::class, 'admissionInfoPageDelete'])->name('admin.admission-info.delete');


Route::get('/clear-cache', function () {
    $admin_login_role = Session::get('admin_login_role');
    if ($admin_login_role == 1) {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return back()->with('message', 'Cache Cleared Successfully!');
    }
    return redirect()->route('admin.login');
});
// Teacher Login and Dashboard
// Route::get('/teacher/signup/view', [TeacherLoginSignupController::class, 'teacherSignupPageView'])->name('teacher.signup');
// Route::post('/teacher/signup/create', [TeacherLoginSignupController::class, 'teacherSignupPageCreate'])->name('teacher.signup.create');


// Route::get('/teacher/login/view', [TeacherLoginSignupController::class, 'teacherLoginPageView'])->name('teacher.login');
// Route::post('/teacher/login/create', [TeacherLoginSignupController::class, 'teacherLoginPageCreate'])->name('teacher.login.create');
// Route::post('/teacher/logout', [TeacherLoginSignupController::class, 'teacherLogout'])->name('teacher.logout');

// Route::get('/teacher/dashboard', [TeacherLoginSignupController::class, 'teacherDashboardPageView'])->name('teacher.dashboard');

// Route::get('/teacher/profile', [TeacherLoginSignupController::class, 'teacherProfilePageView'])->name('teacher.profile');
// Route::post('/teacher/profile/update', [TeacherLoginSignupController::class, 'teacherProfilePageUpdate'])->name('teacher.profile.update');

// Route::get('/teacher/change-password', [TeacherLoginSignupController::class, 'teacherChangePasswordPageView'])->name('teacher.change-password');
// Route::post('/teacher/change-password/update', [TeacherLoginSignupController::class, 'teacherChangePasswordPageUpdate'])->name('teacher.change-password.update');

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
