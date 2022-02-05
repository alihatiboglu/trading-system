<?php

Route::group(['middleware' => ['auth', 'language']], function () {
    Route::prefix('accounts')->group(function() {
        Route::get('/', 'ClientController@dashboard')->name('client.index');

        Route::get('profile', 'UserController@profile')->name('client.profile');
        Route::get('profile/change-email', 'UserController@changeEmail')->name('client.profile.change_email');
        Route::post('profile/change-email', 'UserController@updateEmail')->name('client.profile.update_email');
        Route::get('profile/additional-email', 'UserController@additionalEmail')->name('client.profile.change_email2');
        Route::post('profile/additional-email', 'UserController@updateAdditionalEmail')->name('client.profile.update_email2');
        Route::get('profile/change-password', 'UserController@changePassword')->name('client.profile.change_password');
        Route::post('profile/change-password', 'UserController@updatePassword')->name('client.profile.update_password');
        Route::get('profile/change-phone', 'UserController@changePhone')->name('client.profile.change_phone');
        Route::post('profile/change-phone', 'UserController@updatePhone')->name('client.profile.update_phone');
        Route::get('referrals', 'UserController@referrals')->name('client.referrals');
        Route::get('real-account/changePasswordRequest', 'UserController@changePasswordRequest')->name('client.change.password.request');
        Route::post('real-account/changePasswordRequest', 'UserController@changePasswordSend')->name('client.change.password.send');

        Route::get('documents', 'DocumentController@index')->name('client.documents');
        Route::get('documents/id', 'DocumentController@id')->name('client.documents.id');
        Route::post('documents/id', 'DocumentController@updateId')->name('client.documents.update_id');
        Route::get('documents/por', 'DocumentController@por')->name('client.documents.por');
        Route::post('documents/por', 'DocumentController@updatePor')->name('client.documents.update_por');

        Route::get('services', 'PageController@services')->name('client.service');
        Route::get('news', 'PageController@news')->name('client.news');
        Route::get('news/{id}', 'PageController@singleBlog')->name('client.news.single');

        Route::get('deposits', 'TransactionController@deposits')->name('client.deposits');
        Route::get('deposits/paypal', 'TransactionController@depositsPaypal')->name('deposits.paypal');
        Route::get('deposits/visa', 'TransactionController@depositsVisa')->name('deposits.visa');
        Route::post('deposits/visa', 'IyzipayController@pay')->name('deposits.iyzipay');
        Route::get('withdraw', 'TransactionController@withdraw')->name('client.withdraw');
        Route::get('withdraw/request', 'TransactionController@withdrawRequest')->name('client.withdraw.request');
        Route::post('withdraw/request', 'TransactionController@withdrawRequestSend')->name('client.withdraw.send');
        Route::get('transactions', 'TransactionController@transactions')->name('client.transactions');

        Route::get('binance', 'TransactionController@binance')->name('deposits.binance');
        Route::post('binance', 'BinanceController@pay')->name('deposits.binance.pay');

        Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
        Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
        Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));


        Route::get('accounts/my', 'AccountController@my')->name('client.accounts.my');
        Route::get('demoAccount', 'AccountController@demoAccount')->name('client.accounts.demo');
        Route::post('demoAccount', 'AccountController@demoSave')->name('client.accounts.demo.save');

        Route::get('realAccount', 'AccountController@realAccount')->name('client.accounts.real');
        Route::post('realAccount', 'AccountController@realSave')->name('client.accounts.real.save');

        Route::get('packages', 'AccountController@packages')->name('client.accounts.packages');
        Route::get('packageAccount/{id}', 'AccountController@packageAccount')->name('client.accounts.package');
        Route::post('packageAccount/{id}', 'AccountController@packageSave')->name('client.accounts.package.save');

        Route::get('partners', 'AccountController@partners')->name('client.partners');
        Route::post('partners', 'AccountController@savePartner')->name('client.partners.save');
    });
});
