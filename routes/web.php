<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CentralCabinetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadershipController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SlidesController;
use App\Models\CentralCabinet;
use App\Models\Registration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::post('/registration', [RegistrationController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'homeGallery'])->name('home');

Route::get('/central-cabinets', [
    HomeController::class,
    'centralCabinets',
])->name('central-cabinets');
Route::get('/associated-wings', [
    HomeController::class,
    'associatedWings',
])->name('associated-wings');
Route::get('/news', [HomeController::class, 'newsEvents'])->name('news-events');
Route::view('/contact-us', 'contact')->name('contact');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/wings/{id}', [HomeController::class, 'wings'])->name(
    'associated-wings'
);
Route::get('/track-secretariat', [
    HomeController::class,
    'trackSecretariat',
])->name('track-secretariat');
Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/about-syp', [HomeController::class, 'about'])->name('about');
Route::get('/policy/privacy-policy', [HomeController::class, 'privacy'])->name(
    'privacy'
);

Route::get('/news/{id}', [HomeController::class, 'newsEvent'])->name(
    'news-events'
);
//leadership route
Route::get('/leadership', [HomeController::class, 'leadership'])->name(
    'leadership'
);
Route::get('/leadership/{main}/{submain}', [
    HomeController::class,
    'leaderships',
])->name('leadership');

//Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::put('/admin/general-info/update', [
    AdminController::class,
    'generalInfoUpdate',
]);
Route::middleware(['auth', 'auth.superadmin'])
    ->prefix('admin')
    ->group(function () {
        Route::resource('slides', SlidesController::class, [
            'names' => [
                'index' => 'adminSlides',
                'create' => 'adminSlides',
                'edit' => 'adminSlides',
            ],
        ]);
        Route::resource('news', NewsController::class, [
            'names' => [
                'index' => 'adminNews',
                'create' => 'adminNews',
                'edit' => 'adminNews',
            ],
        ]);
        Route::resource('gallery', GalleryController::class, [
            'names' => [
                'index' => 'adminGallery',
                'create' => 'adminGallery',
                'edit' => 'adminGallery',
            ],
        ]);
        Route::resource('accounts', AccountController::class, [
            'names' => [
                'index' => 'adminAccounts',
                'create' => 'adminAccounts',
                'edit' => 'adminAccounts',
            ],
        ]);
        Route::resource('contacts', ContactController::class, [
            'names' => [
                'index' => 'adminContact',
                'create' => 'adminContact',
                'edit' => 'adminContact',
            ],
        ]);

        Route::resource(
            'central-cabinets/cc',
            CentralCabinetController::class,
            [
                'names' => [
                    'index' => 'adminCC',
                    'create' => 'adminCC',
                    'edit' => 'adminCC',
                ],
            ]
        );
        Route::resource(
            'central-cabinets/coc',
            CentralCabinetController::class,
            [
                'names' => [
                    'index' => 'adminCOC',
                    'create' => 'adminCOC',
                    'edit' => 'adminCOC',
                ],
            ]
        );
        Route::resource('leadership', LeadershipController::class, [
            'names' => [
                'index' => 'adminLeadership',
                'create' => 'adminLeadership',
                'edit' => 'adminLeadership',
            ],
        ]);
        Route::resource(
            'notification-template',
            NotificationTemplateController::class,
            [
                'names' => [
                    'index' => 'adminNotificationTemplate',
                    'create' => 'adminNotificationTemplate',
                    'edit' => 'adminNotificationTemplate',
                ],
            ]
        );
        Route::get('notifications', [
            NotificationController::class,
            'index',
        ])->name('adminNotifications');
    });

Route::prefix('admin')->group(function () {
    Route::get('/about-us', [AdminController::class, 'about'])->name(
        'adminAbout'
    );
    Route::put('/about', [AdminController::class, 'about']);
    Route::get('/privacy-policy', [AdminController::class, 'privacy'])->name(
        'adminPrivacy'
    );
    Route::put('/privacy', [AdminController::class, 'privacy']);
});

Route::post('/site/upload-images', [
    AdminController::class,
    'editorImageSave',
])->middleware(['web']);

Route::middleware(['auth', 'auth.admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/registrations', [
            RegistrationController::class,
            'index',
        ])->name('adminRegistrations');
        Route::get('/registrations/new', [
            RegistrationController::class,
            'new',
        ])->name('adminRegistrationsNew');
        Route::get('/registrations/rejects', [
            RegistrationController::class,
            'rejects',
        ])->name('adminRegistrationsRejected');
        Route::get('/registrations/{id}', [
            RegistrationController::class,
            'show',
        ]);
        Route::delete('/registrations/{id}', [
            RegistrationController::class,
            'delete',
        ]);
        Route::put('/registrations/{id}/accept', [
            RegistrationController::class,
            'accept',
        ]);
        Route::put('/registrations/{id}/reject', [
            RegistrationController::class,
            'reject',
        ]);
    });
Route::post('/admin/registrations/file-save', [
    RegistrationController::class,
    'uploadFile',
])->middleware('web');

Auth::routes();

//Profile routes

Route::get('/profile', [ProfileController::class, 'edit'])
    ->middleware(['auth'])
    ->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->middleware([
    'auth',
]);

Route::view('/test', 'admin.notification', ['data' => Registration::first()]);
