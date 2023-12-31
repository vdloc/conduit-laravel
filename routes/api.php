<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/api/users/login', 'AuthController@login');

// Registration
Route::post('/api/users', 'AuthController@register');

// Group for authenticated user routes
Route::middleware(['auth:api'])->group(function () {
    Route::get('/api/user', 'UserController@getCurrentUser');
    Route::put('/api/user', 'UserController@updateUser');
});

// Profiles
Route::get('/api/profiles/{username}', 'ProfileController@getProfile');
Route::post('/api/profiles/{username}/follow', 'ProfileController@followUser')->middleware('auth:api');
Route::delete('/api/profiles/{username}/follow', 'ProfileController@unfollowUser')->middleware('auth:api');


// Public articles routes
Route::get('/api/articles', 'ArticleController@listArticles');
Route::get('/api/articles/{slug}', 'ArticleController@getArticle');

// Authenticated articles routes
Route::middleware(['auth:api'])->group(function () {
    Route::get('/api/articles/feed', 'ArticleController@feedArticles');
    Route::post('/api/articles', 'ArticleController@createArticle');
    Route::put('/api/articles/{slug}', 'ArticleController@updateArticle');
    Route::delete('/api/articles/{slug}', 'ArticleController@deleteArticle');
    // ... and so on for other authenticated article routes
});

// Comments
Route::post('/api/articles/{slug}/comments', 'CommentController@addComment')->middleware('auth:api');
Route::get('/api/articles/{slug}/comments', 'CommentController@getComments');
Route::delete('/api/articles/{slug}/comments/{id}', 'CommentController@deleteComment')->middleware('auth:api');

// Favorites
Route::post('/api/articles/{slug}/favorite', 'FavoriteController@favoriteArticle')->middleware('auth:api');
Route::delete('/api/articles/{slug}/favorite', 'FavoriteController@unfavoriteArticle')->middleware('auth:api');

Route::get('/api/tags', 'TagController@getTags');
