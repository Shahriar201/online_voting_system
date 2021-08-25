<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('backend.layouts.home');
// });
Route::get('/', 'Frontend\FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){

    Route::prefix('users')->group(function(){

        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');  
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
        
    });
    
    Route::prefix('votes')->group(function(){

        Route::get('/view', 'Backend\VoteController@view')->name('votes.view');
        Route::get('/add', 'Backend\VoteController@add')->name('votes.add');
        Route::post('/store', 'Backend\VoteController@store')->name('votes.store');  
        Route::get('/edit/{id}', 'Backend\VoteController@edit')->name('votes.edit');
        Route::post('/update/{id}', 'Backend\VoteController@update')->name('votes.update');
        Route::get('/delete/{id}', 'Backend\VoteController@delete')->name('votes.delete');
        
    });
    
    Route::prefix('categories')->group(function(){

        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');  
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::get('/delete/{id}', 'Backend\CategoryController@delete')->name('categories.delete');
        
    });
    
    Route::prefix('candidates')->group(function(){
        //President Candidate
        Route::get('/view', 'Backend\PresidentController@view')->name('candidates.president.view');
        Route::get('/add', 'Backend\PresidentController@add')->name('candidates.president.add');
        Route::post('/store', 'Backend\PresidentController@store')->name('candidates.president.store');  
        Route::get('/edit/{id}', 'Backend\PresidentController@edit')->name('candidates.president.edit');
        Route::post('/update/{id}', 'Backend\PresidentController@update')->name('candidates.president.update');
        Route::get('/delete/{id}', 'Backend\PresidentController@delete')->name('candidates.president.delete');
        
        //Vice President Candidate
        Route::get('/view/vice-president', 'Backend\VicePresidentController@view')->name('candidates.vicepresident.view');
        Route::get('/add/vice-president', 'Backend\VicePresidentController@add')->name('candidates.vicepresident.add');
        Route::post('/store/vice-president', 'Backend\VicePresidentController@store')->name('candidates.vicepresident.store');  
        Route::get('/edit/vice-president/{id}', 'Backend\VicePresidentController@edit')->name('candidates.vicepresident.edit');
        Route::post('/update/vice-president/{id}', 'Backend\VicePresidentController@update')->name('candidates.vicepresident.update');
        Route::get('/delete/vice-president/{id}', 'Backend\VicePresidentController@delete')->name('candidates.vicepresident.delete');
        
    });
    
    Route::prefix('nominations')->group(function(){
        //President Candidate
        Route::get('/view/president', 'Backend\PresidentNominationController@view')->name('nominations.president.view');
        Route::get('/add/president', 'Backend\PresidentNominationController@add')->name('nominations.president.add');
        Route::post('/store/president', 'Backend\PresidentNominationController@store')->name('nominations.president.store');  
        Route::get('/edit/president/{id}', 'Backend\PresidentNominationController@edit')->name('nominations.president.edit');
        Route::post('/update/president/{id}', 'Backend\PresidentNominationController@update')->name('nominations.president.update');
        Route::get('/delete/president/{id}', 'Backend\PresidentNominationController@delete')->name('nominations.president.delete');
        
        //Vice President Candidate
        Route::get('/view/vice/president', 'Backend\VicePresidentNominationController@view')->name('nominations.vicepresident.view');
        Route::get('/add/vice/president', 'Backend\VicePresidentNominationController@add')->name('nominations.vicepresident.add');
        Route::post('/store/vice/president', 'Backend\VicePresidentNominationController@store')->name('nominations.vicepresident.store');  
        Route::get('/edit/vice/president/{id}', 'Backend\VicePresidentNominationController@edit')->name('nominations.vicepresident.edit');
        Route::post('/update/vice/president/{id}', 'Backend\VicePresidentNominationController@update')->name('nominations.vicepresident.update');
        Route::get('/delete/vice/president/{id}', 'Backend\VicePresidentNominationController@delete')->name('nominations.vicepresident.delete');
        
    });

    Route::prefix('valots')->group(function(){

        Route::get('/view', 'Backend\ValotController@view')->name('valots.view');
        Route::get('/add', 'Backend\ValotController@add')->name('valots.add');
        Route::post('/store', 'Backend\ValotController@store')->name('valots.store');  
        Route::get('/edit/{id}', 'Backend\ValotController@edit')->name('valots.edit');
        Route::post('/update/{id}', 'Backend\ValotController@update')->name('valots.update');
        Route::get('/delete/{id}', 'Backend\ValotController@delete')->name('valots.delete');

        Route::get('/get-candidate-name', 'Backend\ValotController@getCandidate')->name('get-candidate-name');
        
    });

});
