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

// Route::get('/', function () {
//     return view('auth/login');
// });

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');



Route::get('/request/info/{serviceRequest}', 'ServiceRequestController@show')->name('request.info');



//USER
Route::post('request_cancel/{serviceRequest}', 'EvaluationController@cancel')->name('request_cancel');
Route::post('/request/edit/{serviceRequest}', 'ServiceRequestController@update')->name('request.update');
Route::get('/request/edit/{serviceRequest}', 'ServiceRequestController@edit')->name('request.edit');
Route::get('/request/quotation/{serviceRequest}', 'EvaluationController@quotation')->name('request.quotation');

Route::get('/request/completion/{serviceRequest}', 'CompletionController@index')->name('request.completion');
Route::post('store_completion/{serviceRequest}', 'CompletionController@store')->name('store_completion');

Route::post('store_request', 'ServiceRequestController@store')->name('store_request');
Route::post('store_quotation/{serviceRequest}', 'QuotationController@store')->name('store_quotation');



//ADMIN
Route::post('store_process/{serviceRequest}', 'EvaluationController@store')->name('store_process')->middleware('processing');

Route::middleware('processing')->group(function ()
{
    Route::post('request_deny/{serviceRequest}', 'EvaluationController@deny')->name('request_deny');
    Route::get('request/process/{serviceRequest}', 'EvaluationController@process')->name('request.process');    
});



Route::get('/user/edit/{user}', 'UserController@edit')->name('user.edit');
Route::post('store_user', 'UserController@store')->name('store_user');
Route::post('update_user/{user}', 'UserController@update')->name('update_user');



//for approvals - email
// Route::get('/approval/request/bem/{id}', function($id) 
// {   
//     $serviceRequest = \App\ServiceRequest::find($id);
//     //abort_if($serviceRequest == null, 404);    
//     return view('approval.request.bem', ['service' => $serviceRequest]); 
// });



/**
 * Approval expiring links
 */
Route::prefix('approval')->name('approval')->middleware('signed')->group(function(){


    /**
     * Request approval links
     */
    Route::prefix('request')->name('.request')->group(function(){

        Route::get('bem/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.request.bem', ['service' => $serviceRequest]); 

        })->name('.bem');

        Route::get('ehss/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.request.ehss', ['service' => $serviceRequest]); 

        })->name('.ehss');

        Route::get('dept/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.request.dept', ['service' => $serviceRequest]); 

        })->name('.dept');

        Route::get('factory/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.request.factory', ['service' => $serviceRequest]); 

        })->name('.factory');

        Route::get('project/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.request.project', ['service' => $serviceRequest]); 

        })->name('.project');

    });


    /**
     * Outsource approval links
     */
    Route::prefix('outsource')->name('.outsource')->group(function(){

        // Route::get('bem/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        // {   
        //     return view('approval.outsource.bem', ['service' => $serviceRequest]); 

        // })->name('.bem');

        Route::get('factory/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.outsource.factory', ['service' => $serviceRequest]); 

        })->name('.factory');

        Route::get('project/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.outsource.project', ['service' => $serviceRequest]); 

        })->name('.project');

        Route::get('regional/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.outsource.regional', ['service' => $serviceRequest]); 

        })->name('.regional');

    });
    


    /**
     * Completion approval links
     */
    Route::prefix('completion')->name('.completion')->group(function(){

        Route::get('bem/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.completion.bem', ['service' => $serviceRequest]); 

        })->name('.bem');

        Route::get('dept/{serviceRequest}', function(\App\ServiceRequest $serviceRequest) 
        {   
            return view('approval.completion.dept', ['service' => $serviceRequest]); 

        })->name('.dept');

    });


});





//DENY AND APPROVE
//request 
Route::post('bem_request_approval_deny/{serviceRequest}', 'ApprovalController@bem_request_approval_deny')->name('bem_request_approval_deny');
Route::post('bem_request_approval_approve/{serviceRequest}', 'ApprovalController@bem_request_approval_approve')->name('bem_request_approval_approve');

Route::post('ehss_request_approval_deny/{serviceRequest}', 'ApprovalController@ehss_request_approval_deny')->name('ehss_request_approval_deny');
Route::post('ehss_request_approval_approve/{serviceRequest}', 'ApprovalController@ehss_request_approval_approve')->name('ehss_request_approval_approve');

Route::post('dept_request_approval_deny/{serviceRequest}', 'ApprovalController@dept_request_approval_deny')->name('dept_request_approval_deny');
Route::post('dept_request_approval_approve/{serviceRequest}', 'ApprovalController@dept_request_approval_approve')->name('dept_request_approval_approve');

Route::post('factory_request_approval_deny/{serviceRequest}', 'ApprovalController@factory_request_approval_deny')->name('factory_request_approval_deny');
Route::post('factory_request_approval_approve/{serviceRequest}', 'ApprovalController@factory_request_approval_approve')->name('factory_request_approval_approve');

Route::post('project_request_approval_deny/{serviceRequest}', 'ApprovalController@project_request_approval_deny')->name('project_request_approval_deny');
Route::post('project_request_approval_approve/{serviceRequest}', 'ApprovalController@project_request_approval_approve')->name('project_request_approval_approve');


//outsource
Route::post('bem_outsource_approval_deny/{serviceRequest}', 'ApprovalController@bem_outsource_approval_deny')->name('bem_outsource_approval_deny');
Route::post('bem_outsource_approval_approve/{serviceRequest}', 'ApprovalController@bem_outsource_approval_approve')->name('bem_outsource_approval_approve');

Route::post('factory_outsource_approval_deny/{serviceRequest}', 'ApprovalController@factory_outsource_approval_deny')->name('factory_outsource_approval_deny');
Route::post('factory_outsource_approval_approve/{serviceRequest}', 'ApprovalController@factory_outsource_approval_approve')->name('factory_outsource_approval_approve');

Route::post('project_outsource_approval_deny/{serviceRequest}', 'ApprovalController@project_outsource_approval_deny')->name('project_outsource_approval_deny');
Route::post('project_outsource_approval_approve/{serviceRequest}', 'ApprovalController@project_outsource_approval_approve')->name('project_outsource_approval_approve');

Route::post('regional_outsource_approval_deny/{serviceRequest}', 'ApprovalController@regional_outsource_approval_deny')->name('regional_outsource_approval_deny');
Route::post('regional_outsource_approval_approve/{serviceRequest}', 'ApprovalController@regional_outsource_approval_approve')->name('regional_outsource_approval_approve');

//completions
Route::post('bem_completion_approval_deny/{serviceRequest}', 'ApprovalController@bem_completion_approval_deny')->name('bem_completion_approval_deny');
Route::post('bem_completion_approval_approve/{serviceRequest}', 'ApprovalController@bem_completion_approval_approve')->name('bem_completion_approval_approve');
Route::post('dept_completion_approval_deny/{serviceRequest}', 'ApprovalController@dept_completion_approval_deny')->name('dept_completion_approval_deny');
Route::post('dept_completion_approval_approve/{serviceRequest}', 'ApprovalController@dept_completion_approval_approve')->name('dept_completion_approval_approve');



