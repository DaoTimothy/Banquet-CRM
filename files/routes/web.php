
<?php
include_once('customer.php');

/****************   Model binding into route **************************/
Route::model('call', 'App\Models\Call');
Route::model('category', 'App\Models\Category');
Route::model('city', 'App\Models\City');
Route::model('company', 'App\Models\Company');
Route::model('contract', 'App\Models\Contract');
Route::model('country', 'App\Models\Country');
Route::model('customer', 'App\Models\Customer');
Route::model('email', 'App\Models\Email');
Route::model('invoice', 'App\Models\Invoice');
Route::model('invoiceProduct', 'App\Models\InvoiceProduct');
Route::model('invoiceReceivePayment', 'App\Models\InvoiceReceivePayment');
Route::model('lead', 'App\Models\Lead');
Route::model('option', 'App\Models\Option');
Route::model('meeting', 'App\Models\Meeting');
Route::model('notification', 'App\Models\Notification');
Route::model('opportunity', 'App\Models\Opportunity');
Route::model('opportunity_converted_list', 'App\Models\Quotation');
Route::model('product', 'App\Models\Product');
Route::model('qtemplate', 'App\Models\Qtemplate');
Route::model('quotation', 'App\Models\Quotation');
Route::model('quotation_converted_list', 'App\Models\Saleorder');
Route::model('quotation_invoice_list', 'App\Models\Invoice');
Route::model('saleorder', 'App\Models\Saleorder');
Route::model('salesteam', 'App\Models\Salesteam');
Route::model('setting', 'App\Models\Setting');
Route::model('state', 'App\Models\State');
Route::model('staff', 'App\Models\User');
Route::model('tag', 'App\Models\Tag');
Route::model('user', 'App\Models\User');
Route::model('userType', 'App\Models\UserType');
Route::model('email_template', 'App\Models\EmailTemplate');
Route::model('task', 'App\Models\Task');

Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('slug2', '[a-z_]+');
Route::pattern('slug3', '[a-z0-9-_]+');
Route::pattern('id', '[0-9]+');

/******************   APP routes  ********************************/

Route::get('/', 'Users\DashboardController@index');
Route::get('home', 'Users\DashboardController@index');
Route::get('contacts', 'Users\DashboardController@contacts');
Route::get('/getActivityLog', 'Users\DashboardController@getActivity');
Route::get('/getAllActivityLog', 'Users\DashboardController@getAllActivity');
Route::get('invite/{slug3}', 'AuthController@getSignup');
Route::post('invite/{slug3}', 'AuthController@postSignup');
//route after user login into system
Route::get('signin', 'AuthController@getSignin');
Route::post('signin', 'AuthController@postSignin');
Route::get('forgot', 'AuthController@getForgotPassword');
Route::post('password', 'AuthController@postForgotPassword');
Route::get('reset_password/{token}', 'AuthController@getReset');
Route::post('reset_password/{token}', 'AuthController@postReset');
Route::get('logout', 'AuthController@getLogout');

Route::get('passwordreset/{id}/{token}', ['as' => 'reminders.edit', 'uses' => 'AuthController@edit']);
Route::post('passwordreset/{id}/{token}', ['as' => 'reminders.update', 'uses' => 'AuthController@update']);

Route::group(array('middleware' => ['sentinel', 'xss_protection']), function () {
    Route::get('profile', 'AuthController@getProfile');
    Route::get('account', 'AuthController@getAccount');
    Route::put('account/{user}', 'AuthController@postAccount');
});
Route::group(array('middleware' => ['sentinel', 'admin', 'xss_protection'], 'namespace' => 'Users'), function () {

    Route::get('setting', 'SettingsController@index');
    Route::post('setting', 'SettingsController@update');

    Route::post('support/send_support', 'MailboxController@sendSupport');
    Route::post('support/send_support_replay', 'MailboxController@sendSupportReplay');
    Route::get('support', 'MailboxController@support');

    Route::group(['prefix' => 'option'], function () {
        Route::get('data/{slug2}', 'OptionController@data');
        Route::get('data', 'OptionController@data');
        Route::get('{option}/show', 'OptionController@show');
        Route::get('{option}/delete', 'OptionController@delete');
    });
    Route::resource('option', 'OptionController');
});

Route::group(array('middleware' => ['sentinel', 'admin'], 'namespace' => 'Users'), function () {

    Route::group(['prefix' => 'email_template'], function () {
        Route::get('data', 'EmailTemplateController@data');
        Route::delete('{email_template}', 'EmailTemplateController@destroy');
        Route::put('{email_template}', 'EmailTemplateController@update');
        Route::post('', 'EmailTemplateController@store');
        Route::put('{email_template}/ajax', 'EmailTemplateController@ajaxUpdate');
        Route::get('', 'EmailTemplateController@index');
    });
    Route::resource('email_template', 'EmailTemplateController');
});

Route::group(array('middleware' => ['sentinel', 'authorized', 'xss_protection'], 'namespace' => 'Users'), function () {

    Route::group(['prefix' => 'salesteam'], function () {
        Route::get('data', 'SalesteamController@data');
        Route::get('import', 'SalesteamController@getImport');
        Route::post('import', 'SalesteamController@postImport');
        Route::post('ajax-store', 'SalesteamController@postAjaxStore');
        Route::get('download-template', 'SalesteamController@downloadExcelTemplate');
        Route::get('{salesteam}/delete', 'SalesteamController@delete');
        Route::get('{salesteam}/show', 'SalesteamController@show');
    });
    Route::resource('salesteam', 'SalesteamController');

    Route::group(['prefix' => 'category'], function () {
        Route::get('data', 'CategoryController@data');
        Route::get('{category}/delete', 'CategoryController@delete');
        
        Route::get('import', 'CategoryController@getImport');
        Route::post('import', 'CategoryController@postImport');
        Route::post('ajax-store', 'CategoryController@postAjaxStore');
        
        Route::get('download-template', 'CategoryController@downloadExcelTemplate');
        
    });
    Route::resource('category', 'CategoryController');

    Route::group(['prefix' => 'lead'], function () {
        Route::post('{lead}/editStatus', 'LeadController@editStatus');
        Route::get('data', 'LeadController@data');
        Route::get('ajax_state_list', 'LeadController@ajaxStateList');
        Route::get('ajax_city_list', 'LeadController@ajaxCityList');
        Route::get('{lead}/delete', 'LeadController@delete');
        Route::get('{lead}/show', 'LeadController@show');
        Route::post('filterMembers', 'LeadController@filterMembers');

        //Excel Import
        Route::get('import', 'LeadController@getImport');
        Route::post('import', 'LeadController@postImport');
        Route::post('ajax-store', 'LeadController@postAjaxStore');
        
        Route::get('download-template', 'LeadController@downloadExcelTemplate');
        
    });
    Route::resource('lead', 'LeadController');

// Event
    Route::group(['prefix' => 'event'], function () {
        Route::post('{event}/editStatus', 'EventController@editStatus');
        Route::get('data', 'EventController@data');
        Route::get('{event}/edit', 'EventController@edit');
        Route::get('{event}/show', 'EventController@show');
        Route::get('{event}/delete', 'EventController@delete');
        Route::delete('{event}', 'EventController@destroy');
        Route::put('{event}', 'EventController@update');
        Route::post('/create', 'EventController@create');
        Route::get('/create/{id}', 'EventController@create');
        Route::post('/store', 'EventController@store');
        Route::post('/addManager', 'EventController@addManager');
        Route::post('/foodCategory', 'EventController@foodCategory');
        Route::post('/addContact', 'EventController@addContact');
        Route::post('/menuChoice', 'EventController@menuChoice');
        Route::post('/addStaff', 'EventController@addStaff');
        Route::get('', 'EventController@index');
        Route::get('getEventMenu', 'EventController@getEventMenu');
        Route::get('{event}/createDocument', 'EventController@createDocument');
        Route::post('/paymentDone', 'EventController@paymentDone');
        Route::get('/getCapacity', 'EventController@getCapacity');
        Route::get('/filterRooms/{id}', 'EventController@filterRooms');


        Route::get('{docid}/viewform', 'EventController@createDocument');
        Route::get('{event}/eventpdf', 'EventController@eventPdfShow');


        Route::get('{event}/menupdf', 'EventController@menuPdfShow');
        Route::get('{event}/contractpdf', 'EventController@contractPdfShow');
        Route::get('{event}/invoicepdf', 'EventController@invoicePdfShow');
        Route::get('{event}/decorationpdf', 'EventController@decorationPdfShow');
        Route::get('{event}/entertainmentpdf', 'EventController@entertainmentPdfShow');
        Route::get('{event}/photographypdf', 'EventController@photographyPdfShow');
        Route::get('{event}/staffpdf', 'EventController@staffPdfShow');
        Route::get('{event}/proposalpdf', 'EventController@proposalPdfShow');
        Route::get('{event}/bookingorderpdf', 'EventController@bookingOrderPdfShow');

        Route::post('/addTask', 'EventController@addTask');
        Route::post('/addNote', 'EventController@addNote');
        Route::post('/addPayment', 'EventController@addPayment');
        Route::post('/editPayment', 'EventController@editPayment');
        Route::post('/updatePayment', 'EventController@updatePayment');
        Route::post('/deletePayment', 'EventController@deletePayment');
        Route::post('/addDiscussion', 'EventController@addDiscussion');

        Route::get('filterMenuType', 'EventController@filterMenuType');
        Route::get('filterSubMenuAndItems', 'EventController@filterSubMenuAndItems');
        Route::get('filterCatererPackages', 'EventController@filterCatererPackages');
        Route::get('sendMailToRecipients', 'EventController@sendMailToRecipients');
        Route::post('shareDocument', 'EventController@shareDocument');
    });
    Route::resource('event', 'EventController');


    // Reports
        //Event
    Route::group(['prefix' => 'eventReport'], function () {
        Route::get('data', 'EventReportController@data');
        Route::get('data/{slug2}', 'EventReportController@data');
        Route::get('getChart/{slug2}', 'EventReportController@getChartData');
    });
    Route::resource('eventReport', 'EventReportController');

        // Leads
    Route::group(['prefix' => 'leadReport'], function () {
        Route::get('data', 'LeadReportController@data');
        Route::get('data/{slug2}', 'LeadReportController@data');
        Route::get('getChart/{slug2}', 'LeadReportController@getChartData');
    });
    Route::resource('leadReport', 'LeadReportController');

    //sales
    Route::group(['prefix' => 'salesReport'], function () {
        Route::get('/', 'SalesReportController@index');
        Route::get('data', 'SalesReportController@data');
        Route::get('data/{slug2}', 'SalesReportController@data');
        Route::get('getSalesChart/{slug2}', 'SalesReportController@getSalesChartData');
    });
    Route::resource('salesReport', 'SalesReportController');

        // booking
    Route::group(['prefix' => 'bookingReport'], function () {
        Route::get('data', 'BookingReportController@data');
        Route::get('data/{slug2}', 'BookingReportController@data');
        Route::get('getChart/{slug2}', 'BookingReportController@getChartData');
    });
    Route::resource('bookingReport', 'BookingReportController');

        // supplier
    Route::group(['prefix' => 'supplierReport'], function () {
        Route::get('data', 'SupplierReportController@data');
        Route::get('data/{slug2}', 'SupplierReportController@data');
    });
    Route::resource('supplierReport', 'SupplierReportController');

// Event Settings
    Route::group(['prefix' => 'eventSetting'], function () {
        Route::get('data', 'EventSettingsController@data');
        Route::get('entertainData', 'EventSettingsController@entertainData');
        Route::get('parkingData', 'EventSettingsController@parkingData');
        Route::get('decoratorData', 'EventSettingsController@decoratorData');
        Route::get('photoData', 'EventSettingsController@photoData');
        Route::get('transportData', 'EventSettingsController@transportData');
        Route::get('equipData', 'EventSettingsController@equipData');
        Route::get('miscellaneousData', 'EventSettingsController@miscellaneousData');
        Route::get('eventLocationData', 'EventSettingsController@eventLocationData');
        Route::get('ownerData', 'EventSettingsController@ownerData');
        Route::get('managerData', 'EventSettingsController@managerData');
        Route::get('eventTypeData', 'EventSettingsController@eventTypeData');
        Route::get('catererServiceData', 'EventSettingsController@catererServiceData');
        Route::get('depositTypeData', 'EventSettingsController@depositTypeData');
        Route::get('eventRoomData', 'EventSettingsController@eventRoomData');
        Route::get('eventRoomData/{id}', 'EventSettingsController@eventRoomData');
        Route::get('leadSourceData', 'EventSettingsController@leadSourceData');
        Route::get('hotelData', 'EventSettingsController@hotelData');

//        Route::get('/suppliers', 'EventSettingsController@index');
//        Route::post('/create', 'EventSettingsController@create');
        Route::get('/agreementPolicies', 'EventSettingsController@agreementPoliciesIndex');
        Route::post('/terms', 'EventSettingsController@termsStore');

        //Index
        Route::get('/entertainIndex', 'EventSettingsController@entertainIndex');
        Route::get('/eventTypes', 'EventSettingsController@eventTypeIndex');
        Route::get('/catererIndex', 'EventSettingsController@catererIndex');
        Route::get('/parkingIndex', 'EventSettingsController@parkingIndex');
        Route::get('/decoratorIndex', 'EventSettingsController@decoratorIndex');
        Route::get('/catererServiceType', 'EventSettingsController@catererServiceTypeIndex');
        Route::get('/eventRoom', 'EventSettingsController@eventRoom');
        Route::get('/photoIndex', 'EventSettingsController@photoIndex');
        Route::get('/transportIndex', 'EventSettingsController@transportIndex');
        Route::get('/equipIndex', 'EventSettingsController@equipIndex');
        Route::get('/eventLocation', 'EventSettingsController@eventLocation');
        Route::get('/miscellaneous', 'EventSettingsController@miscellaneousIndex');
        Route::get('/depositsType', 'EventSettingsController@depositsTypeIndex');
        Route::get('/eventRoom', 'EventSettingsController@eventRoom');
        Route::get('/manager', 'EventSettingsController@managerIndex');
//        Route::get('/owner', 'EventSettingsController@ownerIndex');
        Route::get('/leadSource', 'EventSettingsController@leadSourceIndex');
        Route::get('/hotel', 'EventSettingsController@hotelIndex');


        //create
        Route::get('/entertainCreate', 'EventSettingsController@entertainCreate');
        Route::get('/catererCreate', 'EventSettingsController@catererCreate');
        Route::get('/parkingCreate', 'EventSettingsController@parkingCreate');
        Route::get('/decoratorCreate', 'EventSettingsController@decoratorCreate');
        Route::get('/catererTypeCreate', 'EventSettingsController@catererServiceTypeCreate');
        Route::get('/eventTypeCreate', 'EventSettingsController@eventTypeCreate');
        Route::get('/photoCreate', 'EventSettingsController@photoCreate');
        Route::get('/transportCreate', 'EventSettingsController@transportCreate');
        Route::get('/equipCreate', 'EventSettingsController@equipCreate');
        Route::get('/eventLocationCreate', 'EventSettingsController@eventLocationCreate');
        Route::get('/miscellaneousCreate', 'EventSettingsController@miscellaneousCreate');
        Route::get('/depositsTypeCreate', 'EventSettingsController@depositsTypeCreate');
        Route::get('/eventRoomCreate', 'EventSettingsController@eventRoomCreate');
        Route::get('/managerCreate', 'EventSettingsController@managerCreate');
        Route::get('/ownerCreate', 'EventSettingsController@ownerCreate');
        Route::get('/leadSourceCreate', 'EventSettingsController@leadSourceCreate');
        Route::get('/hotelCreate', 'EventSettingsController@hotelCreate');


        //store
        Route::post('/entertainStore', 'EventSettingsController@entertainStore');
        Route::post('/catererStore', 'EventSettingsController@catererStore');
        Route::post('/parkingStore', 'EventSettingsController@parkingStore');
        Route::post('/decoratorStore', 'EventSettingsController@decoratorStore');
        Route::post('/photoStore', 'EventSettingsController@photoStore');
        Route::post('/transportStore', 'EventSettingsController@transportStore');
        Route::post('/equipStore', 'EventSettingsController@equipStore');
        Route::post('/eventLocationStore', 'EventSettingsController@eventLocationStore');
        Route::post('/miscellaneousStore', 'EventSettingsController@miscellaneousStore');
        Route::post('/eventTypeStore', 'EventSettingsController@eventTypeStore');
        Route::post('/storeOwner', 'EventSettingsController@storeOwner');
        Route::post('/storeManager', 'EventSettingsController@storeManager');
        Route::post('/catererTypeStore', 'EventSettingsController@catererTypeStore');
        Route::post('/storeDepositType', 'EventSettingsController@storeDepositType');
        Route::post('/storeRoom', 'EventSettingsController@storeRoom');
        Route::post('/storeLeadSource', 'EventSettingsController@storeLeadSource');
        Route::post('/storeHotel', 'EventSettingsController@storeHotel');


        //edit
        Route::get('{entertain}/entertainEdit', 'EventSettingsController@entertainEdit');
        Route::get('{caterer}/catererEdit', 'EventSettingsController@catererEdit');
        Route::get('{parking}/parkingEdit', 'EventSettingsController@parkingEdit');
        Route::get('{decorator}/decoratorEdit', 'EventSettingsController@decoratorEdit');
        Route::get('{photographer}/photoEdit', 'EventSettingsController@photoEdit');
        Route::get('{transport}/transportEdit', 'EventSettingsController@transportEdit');
        Route::get('{equipment}/equipEdit', 'EventSettingsController@equipEdit');
        Route::get('{location}/editEventLocation', 'EventSettingsController@editEventLocation');
        Route::get('{extra}/miscellaneousEdit', 'EventSettingsController@miscellaneousEdit');
        Route::get('{eventType}/eventTypeEdit', 'EventSettingsController@eventTypeEdit');
        Route::get('{type}/catererTypeEdit', 'EventSettingsController@catererTypeEdit');
        Route::get('{owner}/editOwner', 'EventSettingsController@editOwner');
        Route::get('{manager}/editManager', 'EventSettingsController@editManager');
        Route::get('{deposit}/editDepositType', 'EventSettingsController@editDepositType');
        Route::get('{room}/editRoom', 'EventSettingsController@editRoom');
        Route::get('{leadSource}/editLeadSource', 'EventSettingsController@editLeadSource');
        Route::get('{hotel}/editHotel', 'EventSettingsController@editHotel');


        //update
        Route::put('{entertain}/entertainUpdate', 'EventSettingsController@entertainUpdate');
        Route::put('{caterer}/catererUpdate', 'EventSettingsController@catererUpdate');
        Route::put('{parking}/parkingUpdate', 'EventSettingsController@parkingUpdate');
        Route::put('{decorator}/decoratorUpdate', 'EventSettingsController@decoratorUpdate');
        Route::put('{photographer}/photoUpdate', 'EventSettingsController@photoUpdate');
        Route::put('{transport}/transportUpdate', 'EventSettingsController@transportUpdate');
        Route::put('{equipment}/equipUpdate', 'EventSettingsController@equipUpdate');
        Route::put('{location}/updateEventLocation', 'EventSettingsController@updateEventLocation');
        Route::put('{extra}/miscellaneousUpdate', 'EventSettingsController@miscellaneousUpdate');
        Route::put('{eventType}/eventTypeUpdate', 'EventSettingsController@eventTypeUpdate');
        Route::put('{owner}/updateOwner', 'EventSettingsController@updateOwner');
        Route::put('{manager}/updateManager', 'EventSettingsController@updateManager');
        Route::put('{type}/catererTypeUpdate', 'EventSettingsController@catererTypeUpdate');
        Route::put('{deposit}/updateDepositType', 'EventSettingsController@updateDepositType');
        Route::put('{room}/updateRoom', 'EventSettingsController@updateRoom');
        Route::put('{leadSource}/updateLeadSource', 'EventSettingsController@updateLeadSource');
        Route::put('{hotel}/updateHotel', 'EventSettingsController@updateHotel');

        //delete
        Route::get('{id}/entertainDelete', 'EventSettingsController@entertainDelete');
        Route::get('{id}/catererDelete', 'EventSettingsController@catererDelete');
        Route::get('{id}/parkingDelete', 'EventSettingsController@parkingDelete');
        Route::get('{id}/decoratorDelete', 'EventSettingsController@decoratorDelete');
        Route::get('{id}/photoDelete', 'EventSettingsController@photoDelete');
        Route::get('{id}/transportDelete', 'EventSettingsController@transportDelete');
        Route::get('{id}/equipDelete', 'EventSettingsController@equipDelete');
        Route::get('{id}/deleteEventLocation', 'EventSettingsController@deleteEventLocation');
        Route::get('{id}/miscellaneousDelete', 'EventSettingsController@miscellaneousDelete');
        Route::get('{id}/deleteEventType', 'EventSettingsController@deleteEventType');
        Route::get('/deleteOwner', 'EventSettingsController@deleteOwner');
        Route::get('/deleteManager', 'EventSettingsController@deleteManager');
        Route::get('{id}/catererTypeDelete', 'EventSettingsController@catererTypeDelete');
        Route::get('{id}/deleteDepositType', 'EventSettingsController@deleteDepositType');
        Route::get('{id}/deleteRoom', 'EventSettingsController@deleteRoom');
        Route::get('{id}/deleteLeadSource', 'EventSettingsController@deleteLeadSource');
        Route::get('{id}/deleteHotel', 'EventSettingsController@deleteHotel');
    });
    Route::resource('eventSetting', 'EventSettingsController');


    Route::group(['prefix' => 'eventMenu'], function () {
        Route::get('data', 'EventMenuController@data');
        Route::get('data/{id}/{id2}', 'EventMenuController@data');
        Route::get('menuData', 'EventMenuController@menuData');
        Route::get('menuItemData', 'EventMenuController@menuItemData');
        Route::get('menuItemData/{id}', 'EventMenuController@menuItemData');
        Route::get('menuTypeData', 'EventMenuController@menuTypeData');
        Route::get('menuTypeData/{id}', 'EventMenuController@menuTypeData');


        Route::get('/menu', 'EventMenuController@index');
        Route::get('/mainMenuCreate', 'EventMenuController@mainMenuCreate');
        Route::post('/storeMenu', 'EventMenuController@storeMenu');
        Route::get('{menu}/editMenu', 'EventMenuController@editMenu');
        Route::put('{menu}/updateMenu', 'EventMenuController@updateMenu');
        Route::get('{id}/deleteMenu', 'EventMenuController@deleteMenu');


        Route::get('/menuType', 'EventMenuController@menuTypeIndex');
        Route::get('/menuTypeCreate', 'EventMenuController@menuTypeCreate');
        Route::post('/storeMenuType', 'EventMenuController@storeMenuType');
        Route::get('{menuType}/editMenuType', 'EventMenuController@editMenuType');
        Route::put('{menuType}/updateMenuType', 'EventMenuController@updateMenuType');
        Route::get('{id}/deleteMenuType', 'EventMenuController@deleteMenuType');


        Route::get('/subMenu', 'EventMenuController@subMenuIndex');
        Route::get('/subMenuCreate', 'EventMenuController@subMenuCreate');
        Route::post('/storeSubMenu', 'EventMenuController@storeSubMenu');
        Route::get('{menu}/editSubMenu', 'EventMenuController@editSubMenu');
        Route::put('{menu}/updateSubMenu', 'EventMenuController@updateSubMenu');
        Route::get('{id}/deleteSubMenu', 'EventMenuController@deleteSubMenu');


        Route::get('/menuItem', 'EventMenuController@menuItemIndex');
        Route::get('/menuItemCreate', 'EventMenuController@menuItemCreate');
        Route::post('/storeMenuItem', 'EventMenuController@storeMenuItem');
        Route::get('{menu}/editMenuItem', 'EventMenuController@editMenuItem');
        Route::put('{menu}/updateMenuItem', 'EventMenuController@updateMenuItem');
        Route::get('{id}/deleteMenuItem', 'EventMenuController@deleteMenuItem');

        Route::get('filterMenuType', 'EventMenuController@filterMenuType');
        Route::get('filterSubMenu', 'EventMenuController@filterSubMenu');

    });
    Route::resource('eventMenu', 'EventMenuController');


    Route::group(['prefix' => 'opportunity'], function () {
        Route::get('data', 'OpportunityController@data');
        Route::get('{opportunity}/delete', 'OpportunityController@delete');
        Route::get('{opportunity}/show', 'OpportunityController@show');
        Route::get('{opportunity}/lost', 'OpportunityController@lost');
        Route::post('{opportunity}/update_lost', 'OpportunityController@updateLost');
        Route::get('{opportunity}/won', 'OpportunityController@won');
        Route::get('{opportunity}/convert_to_quotation', 'OpportunityController@convertToQuotation');
        Route::post('{opportunity}/opportunity_archive', 'OpportunityController@convertToArchive');
        Route::get('{opportunity}/opportunity_delete_list', 'OpportunityController@convertToDeleteList');
        Route::post('{opportunity}/customerData', 'OpportunityController@customerData');
        Route::get('customerData', 'OpportunityController@customerData');
        Route::get('ajax_agent_list', 'OpportunityController@ajaxAgentList');
        Route::get('ajax_main_staff_list', 'OpportunityController@ajaxMainStaffList');
    });
    Route::resource('opportunity', 'OpportunityController');

    Route::get('convertedlist_view/{id}/show', 'OpportunityConvertedListController@quatationList');

    Route::group(['prefix' => 'opportunity_archive'], function () {
        Route::get('{opportunity_archive}/show', 'OpportunityArchiveController@show');
        Route::get('data', 'OpportunityArchiveController@data');
    });
    Route::resource('opportunity_archive', 'OpportunityArchiveController');

    Route::group(['prefix' => 'opportunity_delete_list'], function () {
        Route::get('data', 'OpportunityDeleteListController@data');
        Route::get('{opportunity_delete_list}/show', 'OpportunityDeleteListController@show');
        Route::get('{opportunity_delete_list}/restore', 'OpportunityDeleteListController@delete');
        Route::delete('{opportunity_delete_list}', 'OpportunityDeleteListController@restoreOpportunity');
        Route::get('/', 'OpportunityDeleteListController@index');
    });

    Route::group(['prefix' => 'opportunity_converted_list'], function () {
        Route::get('data', 'OpportunityConvertedListController@data');
    });
    Route::resource('opportunity_converted_list','OpportunityConvertedListController');

    Route::group(['prefix' => 'company'], function () {
        Route::get('data', 'CompanyController@data');
        Route::get('{company}/show', 'CompanyController@show');
        Route::get('{company}/delete', 'CompanyController@delete');
    });
    Route::resource('company', 'CompanyController');

    Route::group(['prefix' => 'customer'], function () {
        Route::get('data', 'CustomerController@data');
        Route::put('{user}/ajax', 'CustomerController@ajaxUpdate');
        Route::get('{customer}/show', 'CustomerController@show');
        Route::get('{customer}/delete', 'CustomerController@delete');
        //Excel Import
        Route::get('import', 'CustomerController@getImport');
        Route::post('import', 'CustomerController@postImport');
        Route::post('ajax-store', 'CustomerController@postAjaxStore');

        Route::post('import-excel-data', 'CustomerController@importExcelData');
        Route::get('download-template', 'CustomerController@downloadExcelTemplate');
    });
    Route::resource('customer', 'CustomerController');

    Route::group(['prefix' => 'call'], function () {
        Route::get('data', 'CallController@data');
        Route::get('{call}/edit', 'CallController@edit');
        Route::get('{call}/show', 'CallController@show');
        Route::get('{call}/delete', 'CallController@delete');
        Route::delete('{call}', 'CallController@destroy');
        Route::put('{call}', 'CallController@update');
        Route::post('', 'CallController@store');
        Route::get('', 'CallController@index');
    });
    Route::resource('call', 'CallController');

    Route::group(['prefix' => 'leadcall'], function () {
        Route::get('{lead}', 'LeadCallController@index');
        Route::get('{lead}/data', 'LeadCallController@data');
        Route::get('{lead}/create', 'LeadCallController@create');
        Route::post('{lead}', 'LeadCallController@store');
        Route::get('{lead}/{call}/edit', 'LeadCallController@edit');
        Route::put('{lead}/{call}', 'LeadCallController@update');
        Route::get('{lead}/{call}/delete', 'LeadCallController@delete');
        Route::delete('{lead}/{call}', 'LeadCallController@destroy');
    });
    Route::resource('leadcall', 'LeadCallController');

    Route::group(['prefix' => 'opportunitycall'], function () {
        Route::get('{opportunity}', 'OpportunityCallController@index');
        Route::get('{opportunity}/data', 'OpportunityCallController@data');
        Route::get('{opportunity}/create', 'OpportunityCallController@create');
        Route::post('{opportunity}', 'OpportunityCallController@store');
        Route::get('{opportunity}/{call}/edit', 'OpportunityCallController@edit');
        Route::put('{opportunity}/{call}', 'OpportunityCallController@update');
        Route::get('{opportunity}/{call}/delete', 'OpportunityCallController@delete');
        Route::delete('{opportunity}/{call}', 'OpportunityCallController@destroy');
    });
    Route::resource('opportunitycall', 'OpportunityCallController');

    Route::group(['prefix' => 'opportunitymeeting'], function () {
        Route::get('{opportunity}', 'OpportunityMeetingController@index');
        Route::get('{opportunity}/data', 'OpportunityMeetingController@data');
        Route::get('{opportunity}/create', 'OpportunityMeetingController@create');
        Route::post('{opportunity}', 'OpportunityMeetingController@store');
        Route::get('{opportunity}/calendar', 'OpportunityMeetingController@calendar');
        Route::post('{opportunity}/calendarData', 'OpportunityMeetingController@calendar_data');
        Route::get('{opportunity}/{meeting}/edit', 'OpportunityMeetingController@edit');
        Route::put('{opportunity}/{meeting}', 'OpportunityMeetingController@update');
        Route::get('{opportunity}/{meeting}/delete', 'OpportunityMeetingController@delete');
        Route::delete('{opportunity}/{meeting}', 'OpportunityMeetingController@destroy');
    });
    Route::resource('opportunitymeeting', 'OpportunityMeetingController');

    Route::group(['prefix' => 'meeting'], function () {
        Route::get('calendar', 'MeetingController@calendar');
        Route::post('calendarData', 'MeetingController@calendar_data');
        Route::get('data', 'MeetingController@data');
        Route::get('{meeting}/show', 'MeetingController@show');
        Route::get('{meeting}/delete', 'MeetingController@delete');
    });
    Route::resource('meeting', 'MeetingController');

    Route::group(['prefix' => 'product'], function () {
        Route::get('data', 'ProductController@data');
        Route::get('import', 'ProductController@getImport');
        Route::post('import', 'ProductController@postImport');
        Route::post('ajax-store', 'ProductController@postAjaxStore');
        Route::get('download-template', 'ProductController@downloadExcelTemplate');
        Route::get('{product}/delete', 'ProductController@delete');
        Route::get('{product}/show', 'ProductController@show');
    });
    Route::resource('product', 'ProductController');

    Route::group(['prefix' => 'staff'], function () {
        Route::post('addDepartment', 'StaffController@addDepartment');
        Route::post('addDesignation', 'StaffController@addDesignation');
        Route::get('getFilterDepartment', 'StaffController@getFilterDepartment');
        Route::get('data', 'StaffController@data');
        Route::get('{staff}/show', 'StaffController@show');
        Route::get('{staff}/delete', 'StaffController@delete');
        Route::get('invite', 'StaffController@invite');
        Route::post('invite', 'StaffController@inviteSave');
    });
    Route::resource('staff', 'StaffController');

    Route::group(['prefix' => 'qtemplate'], function () {
        Route::get('data', 'QtemplateController@data');
        Route::get('{qtemplate}/delete', 'QtemplateController@delete');
    });
    Route::resource('qtemplate', 'QtemplateController');

    Route::group(['prefix' => 'quotation'], function () {
        Route::get('data', 'QuotationController@data');
        Route::post('send_quotation', 'QuotationController@sendQuotation');
        Route::get('{quotation}/show', 'QuotationController@show');
        Route::get('{quotation}/edit', 'QuotationController@edit');
        Route::get('{quotation}/delete', 'QuotationController@delete');
        Route::get('{quotation}/ajax_create_pdf', 'QuotationController@ajaxCreatePdf');
        Route::get('{quotation}/print_quot', 'QuotationController@printQuot');
        Route::get('{quotation}/make_invoice', 'QuotationController@makeInvoice');
        Route::get('{quotation}/confirm_sales_order', 'QuotationController@confirmSalesOrder');
        Route::put('{quotation}', 'QuotationController@update');
        Route::delete('{quotation}', 'QuotationController@destroy');
        Route::get('ajax_qtemplates_products/{qtemplate}', 'QuotationController@ajaxQtemplatesProducts');
        Route::get('ajax_sales_team_list', 'QuotationController@ajaxSalesTeamList');

        Route::get('draft_quotations_list', 'QuotationController@draftQuotations');
        Route::get('draft_quotations', 'QuotationController@draftIndex');
    });
    Route::resource('quotation', 'QuotationController');

    Route::group(['prefix' => 'quotation_converted_list'], function () {
        Route::get('data', 'QuotationConvertedListController@data');
    });
    Route::resource('quotation_converted_list','QuotationConvertedListController');
    Route::get('quotation_converted_list/{id}/show', 'QuotationConvertedListController@salesOrderList');

    Route::group(['prefix' => 'quotation_invoice_list'], function () {
        Route::get('data', 'QuotationInvoiceListController@data');
    });
    Route::resource('quotation_invoice_list','QuotationInvoiceListController');
    Route::get('quotation_invoice_list/{id}/show', 'QuotationInvoiceListController@invoiceList');

    Route::group(['prefix' => 'quotation_delete_list'], function () {
        Route::get('data', 'QuotationDeleteListController@data');
        Route::get('{quotation_delete_list}/show', 'QuotationDeleteListController@show');
        Route::get('{quotation_delete_list}/restore', 'QuotationDeleteListController@delete');
        Route::delete('{quotation_delete_list}', 'QuotationDeleteListController@restoreQuotation');
        Route::get('/', 'QuotationDeleteListController@index');
    });

    Route::post('calendar/events', 'CalendarController@events');
    Route::resource('calendar', 'CalendarController');

    Route::group(['prefix' => 'contract'], function () {
        Route::get('data', 'ContractController@data');
        Route::get('{contract}/delete', 'ContractController@delete');
        Route::get('{contract}/show', 'ContractController@show');
    });
    Route::resource('contract', 'ContractController');

    Route::group(['prefix' => 'sales_order'], function () {
        Route::get('data', 'SalesorderController@data');
        Route::post('send_saleorder', 'SalesorderController@sendSaleorder');
        Route::get('{saleorder}/show', 'SalesorderController@show');
        Route::get('{saleorder}/edit', 'SalesorderController@edit');
        Route::get('{saleorder}/delete', 'SalesorderController@delete');
        Route::get('{saleorder}/ajax_create_pdf', 'SalesorderController@ajaxCreatePdf');
        Route::get('{saleorder}/print_quot', 'SalesorderController@printQuot');
        Route::get('{saleorder}/make_invoice', 'SalesorderController@makeInvoice');
        Route::get('{saleorder}/confirm_sales_order', 'SalesorderController@confirmSalesOrder');
        Route::put('{saleorder}', 'SalesorderController@update');
        Route::delete('{saleorder}', 'SalesorderController@destroy');
        Route::get('ajax_qtemplates_products/{qtemplate}', 'SalesorderController@ajaxQtemplatesProducts');
        Route::get('draft_salesorder_list', 'SalesorderController@draftSalesOrders');
        Route::get('draft_salesorders', 'SalesorderController@draftIndex');
    });
    Route::resource('sales_order', 'SalesorderController');

    Route::group(['prefix' => 'salesorder_delete_list'], function () {
        Route::get('data', 'SalesorderDeleteListController@data');
        Route::get('{salesorder_delete_list}/show', 'SalesorderDeleteListController@show');
        Route::get('{salesorder_delete_list}/restore', 'SalesorderDeleteListController@delete');
        Route::delete('{salesorder_delete_list}', 'SalesorderDeleteListController@restoreSalesorder');
        Route::get('/', 'SalesorderDeleteListController@index');
    });

    Route::group(['prefix' => 'salesorder_invoice_list'], function () {
        Route::get('data', 'SalesorderInvoiceListController@data');
    });
    Route::resource('salesorder_invoice_list','SalesorderInvoiceListController');
    Route::get('salesorder_invoice_list/{id}/show', 'SalesorderInvoiceListController@invoiceList');

    Route::group(['prefix' => 'invoices_payment_log'], function () {
        Route::get('data', 'InvoicesPaymentController@data');
        Route::get('{invoiceReceivePayment}/show', 'InvoicesPaymentController@show');
        Route::get('{invoiceReceivePayment}/delete', 'InvoicesPaymentController@delete');
        Route::get('payment_logs','InvoicesPaymentController@paymentLog');
    });
    Route::resource('invoices_payment_log', 'InvoicesPaymentController');

    Route::get('mailbox', 'MailboxController@index');
    Route::get('mailbox/all', 'MailboxController@getData');
    Route::get('mailbox/mail-template/{id}', 'MailboxController@getMailTemplate');
    Route::get('mailbox/{id}/get', 'MailboxController@getMail');
    Route::get('mailbox/{id}/getSent', 'MailboxController@getSentMail');
    Route::post('mailbox/{id}/reply', 'MailboxController@postReply');
    Route::get('mailbox/data', 'MailboxController@getAllData');
    Route::get('mailbox/received', 'MailboxController@getReceived');
    Route::post('mailbox/send', 'MailboxController@sendEmail');
    Route::get('mailbox/sent', 'MailboxController@getSent');
    Route::post('mailbox/mark-as-read', 'MailboxController@postMarkAsRead');
    Route::post('mailbox/delete', 'MailboxController@postDelete');

    Route::group(['prefix' => 'invoice'], function () {
        Route::get('data', 'InvoiceController@data');
        Route::post('send_invoice', 'InvoiceController@sendInvoice');
        Route::get('{invoice}/show', 'InvoiceController@show');
        Route::get('{invoice}/edit', 'InvoiceController@edit');
        Route::get('{invoice}/delete', 'InvoiceController@delete');
        Route::post('getAllPayments', 'InvoiceController@getAllPayments');
        Route::post('payToSupplier', 'InvoiceController@payToSupplier');
        Route::post('{user}/ajax_customer_details', 'InvoiceController@ajaxCustomerDetails');
        Route::get('{invoice}/ajax_create_pdf', 'InvoiceController@ajaxCreatePdf');
        Route::get('{invoice}/print_quot', 'InvoiceController@printQuot');
    });
    Route::resource('invoice', 'InvoiceController');

    Route::group(['prefix' => 'invoice_delete_list'], function () {
        Route::get('data', 'InvoiceDeleteListController@data');
        Route::get('{invoice_delete_list}/show', 'InvoiceDeleteListController@show');
        Route::get('{invoice_delete_list}/restore', 'InvoiceDeleteListController@delete');
        Route::delete('{invoice_delete_list}', 'InvoiceDeleteListController@restoreInvoice');
        Route::get('/', 'InvoiceDeleteListController@index');
    });

    Route::group(['prefix' => 'paid_invoice'], function () {
        Route::get('data', 'InvoicePaidListController@data');
    });
    Route::resource('paid_invoice','InvoicePaidListController');


    Route::group(['prefix' => 'notifications'], function () {
        Route::get('all', 'NotificationController@getAllData');
        Route::post('read', 'NotificationController@postRead');
    });

    Route::get('task', 'TaskController@index');
    Route::post('task/create', 'TaskController@store');
    Route::get('task/data', 'TaskController@data');
    Route::post('task/{task}/edit', 'TaskController@update');
    Route::post('task/{task}/delete', 'TaskController@delete');
});


/**
 * Installation
 */
Route::group(['prefix' => 'install'], function () {
	Route::get('', 'InstallController@index');
	Route::get('requirements','InstallController@requirements');
	Route::get('permissions','InstallController@permissions');
	Route::get('database','InstallController@database');
	Route::get('start-installation','InstallController@installation');
	Route::post('start-installation','InstallController@installation');
	Route::get('install','InstallController@install');
	Route::post('install','InstallController@install');
	Route::get('settings','InstallController@settings');
	Route::post('settings','InstallController@settingsSave');
	Route::get('email_settings','InstallController@settingsEmail');
	Route::post('email_settings','InstallController@settingsEmailSave');
	Route::get('complete','InstallController@complete');
	Route::get('error','InstallController@error');
});
