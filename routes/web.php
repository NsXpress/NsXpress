<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\Community\TagwallController;
use App\Http\Controllers\Community\Bank\BankController;
use App\Http\Controllers\Community\Profile\AvatarController;
use App\Http\Controllers\Community\Profile\ProfileController;
use App\Http\Controllers\Community\Profile\PasswordController;
use App\Http\Controllers\Community\Shops\AvatarShopController;
use App\Http\Controllers\Community\Casino\HorseTrackController;
use App\Http\Controllers\Community\PageController as CommunityPageController;

Route::get('/', [ArticleController::class, 'index'])->name('pages.articles');

Route::get('/redaktionen', [PageController::class, 'team'])->name('pages.team');

Route::prefix('artikler')->group(function () {
    Route::get('/{article}', [ArticleController::class, 'show'])->name('pages.articles.show');

    Route::prefix('/kommentarer')->middleware('auth')->group(function () {
        Route::post('/{article}', [CommentController::class, 'store'])->name('pages.articles.comment.store');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('pages.articles.comment.destroy');
    });
});

Route::prefix('prisguide')->group(function () {
    Route::get('/{category?}', [ItemController::class, 'index'])->name('pages.items');
    Route::get('/ting/{item}', [ItemController::class, 'show'])->name('pages.items.show');
    Route::post('/sog', [ItemController::class, 'search'])->name('pages.items.search');
});

Route::prefix('konkurrencer')->group(function () {
    Route::get('/', [ContestController::class, 'index'])->name('pages.contests');
    Route::get('/{contest}', [ContestController::class, 'show'])->name('pages.contests.show');
});

Route::get('/profil/{user}', [ProfileController::class, 'show'])->name('pages.community.profile.show');

Route::prefix('community')->middleware('auth')->group(function () {
    Route::prefix('konto')->group(function () {
        Route::get('/indstillinger', [ProfileController::class, 'edit'])->name('pages.community.profile.edit');
        Route::post('/indstillinger', [ProfileController::class, 'update'])->name('pages.community.profile.update');
    
        Route::get('/indstillinger/adgangskode', [PasswordController::class, 'edit'])->name('pages.community.profile.password.edit');
        Route::post('/indstillinger/adgangskode', [PasswordController::class, 'update'])->name('pages.community.profile.password.update');
    
        Route::get('/indstillinger/avatar', [AvatarController::class, 'edit'])->name('pages.community.profile.avatar.edit');
        Route::post('/indstillinger/avatar', [AvatarController::class, 'update'])->name('pages.community.profile.avatar.update');
    });

    Route::get('/tagwall', [TagwallController::class, 'index'])->name('pages.community.tagwall');

    Route::prefix('centeret')->group(function () {
        Route::get('/', [CommunityPageController::class, 'center'])->name('pages.community.center');

        Route::prefix('figurbiksen')->group(function () {
            Route::get('/', [AvatarShopController::class, 'index'])->name('pages.community.shops.avatars');
            Route::post('/kob/{avatar}', [AvatarShopController::class, 'purchase'])->name('pages.community.shops.avatars.purchase');
        });

        Route::prefix('kasino')->group(function () {
            Route::prefix('vaeddeloebsbanen')->group(function () {
                Route::get('/', [HorseTrackController::class, 'index'])->name('pages.community.casino.hosetrack');
                Route::post('/', [HorseTrackController::class, 'placeBet'])->name('pages.community.casino.hosetrack.bet');
            });
        });

        Route::prefix('banken')->group(function () {
            Route::get('/', [BankController::class, 'index'])->name('pages.community.bank');
            Route::post('/', [BankController::class, 'transfer'])->name('pages.community.bank.transfer');
        });
    });

    Route::prefix('brugerlisten')->group(function () {
        Route::get('/', [CommunityPageController::class, 'userList'])->name('pages.community.userlist');
        Route::post('/sog', [CommunityPageController::class, 'search'])->name('pages.community.userlist.search');
    });
});

Route::get('/brugerbetingelser', [PageController::class, 'termsOfUse'])->name('pages.terms');
Route::get('/cookies-og-privatlivspolitik', [PageController::class, 'privacyPolicy'])->name('pages.cookies');
