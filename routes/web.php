<?php

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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::prefix('administrator')->group(function () {
    Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('category','Admin\CategoryController');
    Route::post('category/delete', 'Admin\CategoryController@delete')->name('category.delete');
    Route::resource('card','Admin\CardController');
    Route::post('card/delete', 'Admin\CardController@delete')->name('card.delete');
    Route::resource('product','Admin\ProductController');
    Route::post('product/delete', 'Admin\ProductController@delete')->name('product.delete');
    Route::resource('sales','Admin\SalesController');
    Route::resource('contact','Admin\ContactController');
    Route::resource('user','Admin\UserController');
    Route::resource('setting','Admin\SettingController');
    Route::resource('customer','Admin\CustomerController');

    Route::get('slider','Admin\SliderController@index')->name('slider.index');
    Route::post('slider','Admin\SliderController@addSlider')->name('add.slider');
    Route::post('slider/delete','Admin\SliderController@deleteSlider')->name('delete.slider');

    Route::post('send-id-transaction', 'Admin\TransactionController@sendId')->name('send-id-transaction');
    Route::post('save-resi', 'Admin\TransactionController@saveResi')->name('save-resi');

    Route::get('customer','Admin\UserController@customers')->name('customer.index');

    Route::get('syarat-dan-ketentuan', 'Admin\DashboardController@syaratDanKetentuan')->name('tem.index');
    Route::put('syarat-dan-ketentuan', 'Admin\DashboardController@syaratDanKetentuanUpdate')->name('tem.update');

    Route::get('contact-us', 'ContactUsController@index')->name('contact-us.index');
    Route::get('contact-us/{id}/show', 'ContactUsController@show')->name('contact-us.show');
    Route::post('contact-us/{id}/replay', 'ContactUsController@replay')->name('contact-us.replay');
    Route::post('contact-us/delete', 'ContactUsController@delete')->name('contact-us.delete');

    Route::post('send-id-product', 'Admin\ProductController@sendId')->name('send-id-product');
    Route::post('save-product', 'Admin\ProductController@saveProduct')->name('save-product');

    Route::get('laporan', 'Admin\TransactionController@laporanIndex')->name('laporan.index');
    Route::get('laporan/export', 'Admin\TransactionController@laporanExport')->name('laporan.export');
    Route::get('laporan/print/{id}', 'Admin\TransactionController@laporanPrint')->name('laporan.print');

    Route::get('transaction', 'Admin\TransactionController@index')->name('transaction.index');
    Route::get('transaction/{nota}/preview', 'Admin\TransactionController@preview')->name('transaction.preview');
    Route::put('transaction/{nota}/proses', 'Admin\TransactionController@proses')->name('transaction.proses');
    Route::post('transaction/tolak', 'Admin\TransactionController@tolak')->name('transaction.tolak');
});

// ---------------- CART ------------
Route::get('/cart','Frontend\CartController@index');
Route::post('save-cart','Frontend\CartController@insertCart')->name('cart.save');
Route::get('/cart/{id}/delete','Frontend\CartController@destroy');


// ---------------- CHECKOUT ---------------
Route::get('/checkout','Frontend\CheckoutController@index');
Route::post('/simpan-checkout','Frontend\CheckoutController@Proses')->name('checkout.save');

Route::get('update-shipping','Frontend\CheckoutController@updateShippping')->name('update-shipping');
Route::get('/proses-transaction','Frontend\CheckoutController@Transaction');
Route::get('update-checkout','Frontend\CheckoutController@CheckoutUpdate');

// ---------------- LACAK ORDER ------------------------------
Route::get('lacak-order','Frontend\LacakOrderController@index');
Route::get('lacak-order/{slug}', 'Frontend\LacakOrderController@lacakPaket')->name('lacak-paket');
Route::get('konfirmasi-transaction','Frontend\LacakOrderController@Konfirmasi')->name('konfirmasi-transaction');

// ---------------- Pembayaran ------------------------------
Route::get('/payment','Frontend\TransactionController@index');
Route::get('cancel-transaction','Frontend\TransactionController@Cancel')->name('cancel-transaction');
Route::post('upload-bukti-transfer', 'Frontend\TransactionController@UploadBuktiTransfer')->name('upload-bukti-transfer.upload');

// ---------------- Profile ------------------------------
Route::get('profile', 'WelcomeController@profile')->name('profile.index');
Route::put('profile/{id}', 'WelcomeController@profileUpdate')->name('profile.update');

});



// ---------------- PRODUCT ----------------------
Route::get('products','Frontend\ProductController@index');
Route::get('products/{slug}','Frontend\ProductController@detail');
Route::get('products', 'Frontend\ProductController@search')->name('products.search');

Route::get('kategori/{slug}','Frontend\ProductController@category');


// ---------------- Wilayah ------------------------------
Route::get('/kabupaten' , 'WilayahController@kabupaten');
Route::get('/kecamatan' , 'WilayahController@kecamatan');
Route::get('/cost'      , 'WilayahController@cost');


Route::get('/kabupaten-destination' , 'WelcomeController@kabupatenDestination');
Route::get('/kecamatan-destination' , 'WelcomeController@kecamatanDestination');
Route::get('/cost-destination'      , 'WelcomeController@costDestination');

Route::prefix('pages')->group(function () {
    Route::get('syarat-dan-ketentuan'    ,'WelcomeController@syaratDanKetentuan')->name('syarat-dan-ketentuan');
    Route::get('cek-ongkir'   ,'WelcomeController@cekOngkir')->name('cek-ongkir');
    Route::post('cek-ongkir', 'WelcomeController@cekHargaOngkir')->name('cek-harga-ongkir');

    Route::get('hubungi-kami' ,'ContactUsController@hubungiKami')->name('hubungi-kami');
    Route::post('contact-us', 'ContactUsController@contactUs')->name('contact-us');
    Route::get('mail-successfull', 'ContactUsController@mailSuccessfull')->name('mail-success');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
