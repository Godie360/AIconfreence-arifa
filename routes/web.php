<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Contacts_and_NewsletterController;
use App\Http\Controllers\ExhibitionMapController;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/ticket', 'register')->name('ticket');
    Route::get('/speaker', 'speaker')->name('speaker');
    Route::get('/speaker/register', 'speaker_register')->name('speaker.register');
    Route::post('/speaker/store', 'store_speaker_register')->name('store_speaker.register');
    Route::get('/sponsors', 'sponsors')->name('sponsors');
    Route::post('/sponsors/register', 'registerSponsors')->name('sponsor.register');
    Route::get('/speaker/detils', 'speaker')->name('speaker-details');

    Route::post('/participants/register/store', 'store_participant_register')->name('participants_registration.submit');


    //attend
    Route::get('/attend', 'attend')->name('attend');
    Route::get('/exhibitors', 'exhibitors_landing')->name('exhibitors');
    Route::post('/exhibitors/store', 'exhibitors_store')->name('store_exhibitor.register');

    Route::get('/admin/exhibitor-manage/', 'view_manage_exhibition_map')->name('view_manage_exhibitor');
    Route::post('/admin/exhibitor-manage/store', 'store_manage_exhibitor')->name('store_manage_exhibitor');

    Route::get('/invoices', 'getInvoicesByEmail')->name('getInvoices');
    Route::get('/verify-payment', 'verifyPayment')->name('verifyPayments');



    // udambwi
    Route::get('/admin/booths', 'view_manage_exhibitor')->name('booths');
    Route::post('/admin/booths/store', 'store_booth')->name('store_booth');



    // Route::get('/exhibitor/register',  'index']);
    Route::post('/exhibitor/register',  'exhibitors_store')->name('exhibitors_registration.submit');

    Route::get('/verify_payment',  'verifyPayment')->name('verify_payments.submit');

    // invoice
    Route::get('/get-invoice-data/{filter_value}',  'getInvoiceData')->name('get-invoice-data');
});


// In routes/web.php or routes/api.php
Route::post('/save-layout', [ExhibitionMapController::class, 'saveLayout'])->name('save.layout');

Route::post('/save-new-map', [ExhibitionMapController::class, 'save_new_map'])->name('store.new_map');

// update map
Route::post('/update-map', [ExhibitionMapController::class, 'update_map'])->name('store.update_map');


//labels
Route::post('/save-label', [ExhibitionMapController::class, 'save_label'])->name('store.label');

// booths
Route::post('/save-booth', [ExhibitionMapController::class, 'save_booth'])->name('store.booth');

// load the booth na labels from db
Route::get('/get-map-data/{mapId}', [ExhibitionMapController::class, 'fetch_booth_and_labels']);

// to search for booths
Route::get('/search-booths', [ExhibitionMapController::class, 'searchBooths'])->name('search.booths');





Route::get('/send-test-email', function () {
    $toEmail = 'spom.mmari@gmail.com'; // Replace with the recipient's email

    Mail::raw('This is a test email from your Laravel app.', function ($message) use ($toEmail) {
        $message->to($toEmail)
            ->subject('Test Email');
    });

    return 'Test email sent!';
});

// Newsletter subscription route
Route::post('/subscribe/newsletter', [Contacts_and_NewsletterController::class, 'subscribe_news_latter_store'])->name('newsletter.subscribe');

// Contact us form submission route
Route::post('/contact_us/store', [Contacts_and_NewsletterController::class, 'contact_us_store'])->name('contact_us.store');




// <div class="gb-pricing gb-section text-center">
// <div class="container mx-auto">
//     <div class="title-section">
//         <h1 class="color-red">
//             <span class="before-top"></span>
//             <span>Pricing Options</span>
//             <span class="before-bottom"></span>
//         </h1>
//     </div>
//     <div class="row text-center">
//         <div class="col-sm-4">
//             <div class="gb-price">
//                 <div class="price-info">
//                     <h2>Standard Access</h2>
//                     <h3 class="color-red">$200</h3>
//                     <span class="per-month">Early Bird Price</span>
//                 </div>
//                 <ul class="gb-list">
//                     <li>Full Conference Access</li>
//                     <li>Networking Events</li>
//                     <li>Engaging Workshop Sessions</li>
//                     <li>Conference Materials Included</li>
//                 </ul>
//                 <a href="#" class="btn"><span>Register Now</span></a>
//             </div>
//         </div>
//         <div class="col-sm-4">
//             <div class="gb-price active">
//                 <div class="price-info">
//                     <h2>Premium Experience</h2>
//                     <h3 class="color-red">$400</h3>
//                     <span class="per-month">Early Bird Price</span>
//                 </div>
//                 <ul class="gb-list">
//                     <li>All Standard Access features</li>
//                     <li>Priority Seating</li>
//                     <li>Exclusive Networking Opportunities</li>
//                     <li>Premium Conference Materials</li>
//                 </ul>
//                 <a href="#" class="btn btn-red"><span>Register Now</span></a>
//             </div>
//         </div>
//         <div class="col-sm-4">
//             <div class="gb-price">
//                 <div class="price-info">
//                     <h2>Deluxe VIP Package</h2>
//                     <h3 class="color-red">$800</h3>
//                     <span class="per-month">Early Bird Price</span>
//                 </div>
//                 <ul class="gb-list">
//                     <li>All Premium Experience features</li>
//                     <li>VIP Access to Exclusive Dinners</li>
//                     <li>Special VIP Sessions</li>
//                     <li>Deluxe Conference Materials</li>
//                 </ul>
//                 <a href="#" class="btn"><span>Register Now</span></a>
//             </div>
//         </div>
//     </div>
// </div>
// </div>
