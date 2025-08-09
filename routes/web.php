<?php

Route::get('/', function(){return redirect('/home');});
Route::get('/home', 'UserController@home')->name('home');
Route::get('/sejarah', 'UserController@sejarah')->name('sejarah');
Route::get('/struktur', 'UserController@struktur')->name('struktur');
Route::get('/visimisi', 'UserController@visimisi')->name('visimisi');
Route::get('/galeri', 'UserController@galeri')->name('galeri');
Route::get('/logo', 'UserController@logo')->name('logo');
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/blog/{slug}', 'UserController@show_article')->name('blog.show');
Route::get('/destination', 'UserController@destination')->name('destination');
Route::get('/destination/{slug}', 'UserController@show_destination')->name('destination.show');
Route::get('/contact', 'UserController@contact')->name('contact');

Route::prefix('admin')->group(function(){

  Route::get('/', function(){
    return view('auth/login');
  });
  
  // handle route register
  Route::match(["GET", "POST"], "/register", function(){ 
    return redirect("/login"); 
  })->name("register");
  
  Auth::routes();
  
  // Route Dashboard
  Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
  
  // route categories
  Route::get('/categories/{category}/restore', 'CategoryController@restore')->name('categories.restore');
  Route::delete('/categories/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
  Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
  Route::resource('categories', 'CategoryController')->middleware('auth');
  
  // route article
  Route::post('/articles/upload', 'ArticleController@upload')->name('articles.upload')->middleware('auth');
  Route::resource('/articles', 'ArticleController')->middleware('auth');
  
  // route destination
  Route::resource('/destinations', 'DestinationController')->middleware('auth');
    
  // Route about
  Route::get('/abouts', 'AboutController@index')->name('abouts.index')->middleware('auth');
  Route::get('/abouts/{about}/edit', 'AboutController@edit')->name('abouts.edit')->middleware('auth');
  Route::put('/abouts/{about}', 'AboutController@update')->name('abouts.update')->middleware('auth');

  // Route tentang
  Route::get('/tentangs', 'tentangController@index')->name('tentangs.index')->middleware('auth');
  Route::get('/tentangs/{tentang}/edit', 'tentangController@edit')->name('tentangs.edit')->middleware('auth');
  Route::put('/tentangs/{tentang}', 'tentangController@update')->name('tentangs.update')->middleware('auth');

  // Route sejarah
  Route::get('/sejarahs', 'sejarahController@index')->name('sejarahs.index')->middleware('auth');
  Route::get('/sejarahs/{sejarah}/edit', 'sejarahController@edit')->name('sejarahs.edit')->middleware('auth');
  Route::put('/sejarahs/{sejarah}', 'sejarahController@update')->name('sejarahs.update')->middleware('auth');

// Route struktur
  Route::get('/strukturs', 'strukturController@index')->name('strukturs.index')->middleware('auth');
  Route::get('/strukturs/{struktur}/edit', 'strukturController@edit')->name('strukturs.edit')->middleware('auth');
  Route::put('/strukturs/{struktur}', 'strukturController@update')->name('strukturs.update')->middleware('auth');

  // Route visimisi
  Route::get('/visimisis', 'visimisiController@index')->name('visimisis.index')->middleware('auth');
  Route::get('/visimisis/{visimisi}/edit', 'visimisiController@edit')->name('visimisis.edit')->middleware('auth');
  Route::put('/visimisis/{visimisi}', 'visimisiController@update')->name('visimisis.update')->middleware('auth');
    
    // route galeris
  Route::get('/galeris/{galeri}/restore', 'galeriController@restore')->name('galeris.restore');
  Route::delete('/galeris/{galeri}/delete-permanent', 'galeriController@deletePermanent')->name('galeris.delete-permanent');
  Route::get('/ajax/galeris/search', 'galeriController@ajaxSearch');
  Route::resource('galeris', 'galeriController')->middleware('auth');  

  // Route logo
  Route::get('/logos', 'logoController@index')->name('logos.index')->middleware('auth');
  Route::get('/logos/{logo}/edit', 'logoController@edit')->name('logos.edit')->middleware('auth');
  Route::put('/logos/{logo}', 'logoController@update')->name('logos.update')->middleware('auth');

  // Route quote
  Route::get('/quotes', 'quoteController@index')->name('quotes.index')->middleware('auth');
  Route::get('/quotes/{quote}/edit', 'quoteController@edit')->name('quotes.edit')->middleware('auth');
  Route::put('/quotes/{quote}', 'quoteController@update')->name('quotes.update')->middleware('auth');


});