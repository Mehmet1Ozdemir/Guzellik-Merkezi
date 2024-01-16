<?php

use App\Http\Controllers\Front\Blog\BlogCommentController;
use App\Http\Controllers\Front\Blog\BlogController;
use App\Http\Controllers\Front\ContactsFrontController;
use App\Http\Controllers\Front\DefaultController;
use App\Http\Controllers\Front\Dentist\DentistFrontController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Panel\Blog\BlogCategoriesController;
use App\Http\Controllers\Panel\Blog\BlogComments;
use App\Http\Controllers\Panel\DentistController;
use App\Http\Controllers\Panel\IndexPanelController;
use App\Http\Controllers\Panel\Patients\AppointmentsController;
use App\Http\Controllers\Panel\Patients\PatientController;
use App\Http\Controllers\Panel\Patients\PatientTreatmentController;
use App\Http\Controllers\Panel\PaymentController;
use App\Http\Controllers\Panel\Stocks\StockProductsController;
use App\Http\Controllers\Panel\Stocks\StockTransactions;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//front routes

Route::get('/',[DefaultController::class, 'index'])->name('front.home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


//ADMİN PANEL ROUTES
//Panel Modülleri

    Route::group(['prefix' =>'panel'],function (){


        Route::get('/',[IndexPanelController::class, 'index'])->name('panelIndex');

        //Panel Hasta Modülleri
        Route::group(['prefix' =>'patients'],function (){
            Route::get('/fetch',[PatientController::class,'fetch'])->name('fetchPatients');
            Route::get('/list',[PatientController::class,'listPage'])->name('listPatients');
            Route::post('/add',[PatientController::class,'patientAdd'])->name('patientAdd');
            Route::get('/detail',[PatientController::class,'patientDetail'])->name('patientDetail');
            Route::post('/update',[PatientController::class,'patientUpdate'])->name('patientUpdate');
            Route::post('/delete',[PatientController::class,'patientDelete'])->name('patientDelete');

            Route::group(['prefix' =>'treatments'],function (){
                Route::get('/fetch/{id}',[PatientTreatmentController::class,'fetch'])->name('fetchPatientTreatments');
                Route::post('/add',[PatientTreatmentController::class,'patientTreatmentAdd'])->name('patientTreatmentAdd');
                Route::post('/delete',[PatientTreatmentController::class,'patientTreatmentDelete'])->name('patientTreatmentDelete');

            });

            Route::group(['prefix' =>'payments'],function (){
                Route::get('/fetch/{id}',[PaymentController::class,'fetch'])->name('fetchTreatmentPayments');
                Route::post('/add',[PaymentController::class,'treatmentPaymentAdd'])->name('treatmentPaymentAdd');

            });

        });

        //Panel Dişçi Modülleri
        Route::group(['prefix'=>'dentist'], function () {
            Route::get('/fetch',[DentistController::class,'dentistFetch'])->name('panel.dentistFetch');
            Route::get('/list',[DentistController::class,'dentistList'])->name('panel.dentistList');
            Route::get('/detail',[DentistController::class,'dentistDetail'])->name('panel.dentistDetail');
            Route::get('/add',[DentistController::class,'dentistAdd'])->name('panel.dentistAdd');
            Route::post('/create',[DentistController::class,'dentistCreate'])->name('panel.dentistCreate');
            Route::post('/update',[DentistController::class,'dentistUpdate'])->name('panel.dentistUpdate');
            Route::post('/delete',[DentistController::class,'dentistDelete'])->name('panel.dentistDelete');
            Route::post('/dentist_work_time',[DentistController::class,'dentist_work_time'])->name('panel.dentist_work_time');
            Route::get('/dentist_work_time_detail',[DentistController::class,'dentist_work_time_detail'])->name('panel.dentist_work_time_detail');
        });

        //Panel Randevu Modülleri
        Route::group(['prefix'=>'appointments'], function () {
            Route::get('/fetch',[AppointmentsController::class,'appointmentsFetch'])->name('panel.appointmentsFetch');
            Route::get('/list',[AppointmentsController::class,'appointmentsList'])->name('panel.appointmentsList');
            Route::post('/change',[AppointmentsController::class,'appointmentsAttendance'])->name('panel.appointmentsAttendance');
            Route::post('/add',[AppointmentsController::class,'appointmentsAdd'])->name('panel.appointmentsAdd');
            Route::get('/detail',[AppointmentsController::class,'appointmentsDetail'])->name('panel.appointmentsDetail');
            Route::post('/update',[AppointmentsController::class,'appointmentsUpdate'])->name('panel.appointmentsUpdate');
            Route::post('/delete',[AppointmentsController::class,'appointmentsDelete'])->name('panel.appointmentsDelete');
        });

        //Panel Stok Modülleri
        Route::group(['prefix' =>'stocks'],function (){
            Route::get('/fetch',[StockProductsController::class,'stockFetch'])->name('panel.stocksFetch');
            Route::get('/list',[StockProductsController::class,'stockList'])->name('panel.stocksList');
            Route::post('/add',[StockProductsController::class,'stockAdd'])->name('panel.stocksAdd');
            Route::get('/detail',[StockProductsController::class,'stockDetail'])->name('panel.stocksDetail');
            Route::post('/update',[StockProductsController::class,'stockUpdate'])->name('panel.stocksUpdate');
            Route::post('/delete',[StockProductsController::class,'stockDelete'])->name('panel.stocksDelete');

            Route::group(['prefix' =>'transactions'],function (){
                Route::get('/fetch/{id}',[StockTransactions::class,'stockTransactionFetch'])->name('panel.stockTransactionFetch');
                Route::post('/add',[StockTransactions::class,'stockTransactionAdd'])->name('panel.stockTransactionAdd');
                Route::get('/delete',[StockTransactions::class,'stockTransactionDelete'])->name('panel.stockTransactionDelete');

            });

        });

        // Panel iletişim
        Route::group(['prefix'=>'contact'], function () {
            Route::get('/fetch',[\App\Http\Controllers\Panel\ContactsPanelController::class,'fetch'])->name('panel.fetchContact');
            Route::get('/list', [\App\Http\Controllers\Panel\ContactsPanelController::class,'listContact'])->name('panel.listContact');
            Route::post('/add',[\App\Http\Controllers\Panel\ContactsPanelController::class,'contactAdd'])->name('panel.contactAdd');
            Route::get('/detail',[\App\Http\Controllers\Panel\ContactsPanelController::class,'contactDetail'])->name('panel.contactDetail');
            Route::post('/update',[\App\Http\Controllers\Panel\ContactsPanelController::class,'contactUpdate'])->name('panel.contactUpdate');
            Route::post('/delete',[\App\Http\Controllers\Panel\ContactsPanelController::class,'contactDelete'])->name('panel.contactDelete');
            Route::get('/delete',[\App\Http\Controllers\Panel\ContactsPanelController::class,'contactDownload'])->name('panel.contactDownload');
        });

        // Panel Mail iletişim
        Route::group(['prefix'=>'mail'], function () {
            Route::get('/fetch',[\App\Http\Controllers\Panel\Mail\MailPanelController::class,'fetch'])->name('panel.fetchContactMail');
            Route::get('/list', [\App\Http\Controllers\Panel\Mail\MailPanelController::class,'listContactMail'])->name('panel.listContactmail');
            Route::get('/detail',[\App\Http\Controllers\Panel\Mail\MailPanelController::class,'contactMailDetail'])->name('panel.contactMailDetail');
            Route::post('/delete',[\App\Http\Controllers\Panel\Mail\MailPanelController::class,'contactMailDelete'])->name('panel.contactMailDelete');
        });

        // Panel Blog
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', [\App\Http\Controllers\Panel\Blog\BlogController::class, 'listBlog'])->name('panel.getBlogList');
            Route::post('/updatelist/{id}', [\App\Http\Controllers\Panel\Blog\BlogController::class, 'listBlogUpdate'])->name('panel.getBlogListUpdate');
            Route::get('/fetch',[\App\Http\Controllers\Panel\Blog\BlogController::class, 'fetch'])->name('panel.fetchBlog');
            Route::get('/add',[\App\Http\Controllers\Panel\Blog\BlogController::class,'listBlogAdd'])->name('panel.listBlogAdd');
            Route::post('/create', [\App\Http\Controllers\Panel\Blog\BlogController::class, 'blogAdd'])->name('panel.blogCreate');
            Route::get('/detail',[\App\Http\Controllers\Panel\Blog\BlogController::class,'blogDetail'])->name('panel.blogDetail');
            Route::post('/update',[\App\Http\Controllers\Panel\Blog\BlogController::class,'update'])->name('panel.blogUpdate');
            Route::post('/delete',[\App\Http\Controllers\Panel\Blog\BlogController::class,'deleteBlog'])->name('panel.blogDelete');
        });

        // Kategori iletişim
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [BlogCategoriesController::class, 'listCategory'])->name('panel.category');
            Route::get('/fetch', [BlogCategoriesController::class, 'fetch'])->name('panel.fetchCategory');
            Route::post('/add', [BlogCategoriesController::class, 'addCategory'])->name('panel.addCategory');
            Route::get('/detail', [BlogCategoriesController::class, 'categoryDetail'])->name('panel.categoryDetail');
            Route::post('/update', [BlogCategoriesController::class, 'categoryUpdate'])->name('panel.categoryUpdate');
            Route::post('/delete', [BlogCategoriesController::class, 'categoryDelete'])->name('panel.categoryDelete');
        });

        // Blog Yorum listesi
        Route::group(['prefix' => 'blogComments'], function () {
            Route::get('/', [BlogComments::class, 'listComments'])->name('panel.comments.blogs');
            Route::get('/fetch', [BlogComments::class, 'fetch'])->name('panel.fetchComments.blog');
            Route::post('/comments/update-status', [BlogComments::class, 'updateStatus'])->name('update-comment-status');
            Route::post('/delete', [BlogComments::class, 'commentDelete'])->name('panel.commentDelete');
        });

        // Dentist Yorum listesi
        Route::group(['prefix' => 'dentistComments'], function () {
            Route::get('/', [\App\Http\Controllers\Panel\DentistCommentController::class, 'listComments'])->name('panel.comments.dentist');
            Route::get('/fetch', [\App\Http\Controllers\Panel\DentistCommentController::class, 'fetch'])->name('panel.fetchComments');
            Route::post('/comments/update-status', [\App\Http\Controllers\Panel\DentistCommentController::class, 'updateStatus'])->name('update-comment-status');
            Route::post('/delete', [\App\Http\Controllers\Panel\DentistCommentController::class, 'commentDelete'])->name('panel.commentDelete');
        });


        //Panel Galleri Modülleri
        Route::group(['prefix'=>'gallery'], function () {
            Route::get('/fetch',[GalleryController::class,'galleryFetch'])->name('panel.galleryFetch');
            Route::get('/list',[GalleryController::class,'galleryList'])->name('panel.galleryList');
            Route::get('/add',[GalleryController::class,'galleryAdd'])->name('panel.galleryAdd');
            Route::post('/create',[GalleryController::class,'galleryCreate'])->name('panel.galleryCreate');
            Route::get('/galleryDetail',[GalleryController::class,'galleryDetail'])->name('panel.galleryDetail');
            Route::post('/update',[GalleryController::class,'galleryUpdate'])->name('panel.galleryUpdate');
            Route::post('/delete',[GalleryController::class,'galleryDelete'])->name('panel.galleryDelete');
        });
    });
});



//// FRONT ROUTES

//Dis Hekimleri Sayfaları
Route::get('/dentist', [DentistFrontController::class, 'dentistList'])->name('dentist.listDentist');
Route::get('/dentistsDetails/{id}', [DentistFrontController::class, 'dentistDetails'])->name('dentist.dentistsDetails');
Route::post('/dentist-comments/create', [\App\Http\Controllers\Front\Dentist\DentistCommentController::class, 'create'])->name('dentist-comments.create');

// Diş hekimlerini döndüren route
Route::get('dentist/get-dentists', [\App\Http\Controllers\Panel\Blog\BlogController::class,'getDentists'])->name('dentist.getDentists');
// Kategorileri döndüren route
Route::get('category/get-categories', [\App\Http\Controllers\Panel\Blog\BlogController::class,'getCategories'])->name('category.getCategories');
// şehirleri döndüren fonksiyon
Route::get('getCities', [GeneralController::class, 'getCities'])->name('getCities');

Route::get('/doctorProfilSettings', function (){
    return view('panel.pages.doctorPages.doctorProfilSettings');
})->name('dentist_add_DENEME');

// front contact sayfası
Route::get('/contact-pages',[ContactsFrontController::class,'listContact'])->name('listContact');
Route::post('/addContactMail',[ContactsFrontController::class,'saveContactMail'])->name('addContactMail');

//KULLANICI PANEL ROUTES
Route::get('/indexF', function (){
    return view('front.pages.index');
});

Route::get('/contact', function (){
    return view('front.pages.contact.contact');
});

Route::get('/about', function (){
    return view('front.pages.about.about');
})->name('front.About');

// blog front listeleme ve detay
Route::get('/blogGird/{category_id?}', [BlogController::class,'index'])->name('blogList');
Route::get('/blogDetails/{id}',[BlogController::class,'detail'])->name('blogDetail');

// Blog Yorum
Route::post('/comments/create', [BlogCommentController::class, 'create'])->name('comments.create');
Route::get('/comments/{id}', [BlogCommentController::class, 'detail'])->name('blogDetailComments');

Route::get('/about',[DefaultController::class, 'aboutFront'])->name('front.About');
Route::get('/plasticSurgery',[DefaultController::class, 'plasticIndex'])->name('front.plasticIndex');
Route::get('/dermatology',[DefaultController::class, 'dermatologyIndex'])->name('dermatology');
Route::get('/gallery',[DefaultController::class, 'galleryIndex'])->name('gallery');

Route::get('/dentists', function (){
    return view('front.pages.dentists.dentists');
})->name('disDeneme');

/*
Route::get('/dentistsDetails', function (){
    return view('front.pages.dentists.dentistsDetails');
});

//Yeni Eklenen Sayfalar
Route::get('/plastic', function (){
    return view('front.pages.services.plastic-surgery');
})->name('plastic');



Route::get('/dermatology', function (){
    return view('front.pages.services.dermatology');
})->name('dermatology');

Route::get('/gallery', function (){
    return view('front.pages.gallery.gallery');
})->name('gallery');

*/





Route::get('/createPhoto', function (){
    return view('panel.pages.gallery.createPhoto');
})->name('createPhoto');




