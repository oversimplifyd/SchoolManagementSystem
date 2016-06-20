<?php namespace Elihans\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'Elihans\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'Elihans\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'Elihans\Http\Middleware\RedirectIfAuthenticated',
        'admin_auth' => 'Elihans\Http\Middleware\AdminAuth',
        'student_auth' => 'Elihans\Http\Middleware\StudentAuth',
        'teacher_auth' => 'Elihans\Http\Middleware\TeacherAuth',
        'guardian_auth' => 'Elihans\Http\Middleware\GuardianAuth',
        'forum_auth' => 'Elihans\Http\Middleware\ForumAuth'
	];

}
