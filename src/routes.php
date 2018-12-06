<?php

/**
 * @file
 * Application Routes.
 *
 * All DecimaModule code is copyright by the original authors and released under the GNU Aferro General Public License version 3 (AGPLv3) or later.
 * See COPYRIGHT and LICENSE.
 */

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('middleware' => array('auth', 'check.first.time.access', 'check.access', 'csrf'), 'prefix' => 'module/setup'), function()
{
	// Route::controller('/initial-DecimaModule-setup', 'Mgallegos\Vendor\DecimaModule\Controllers\SettingManager');
});

Route::group(array('middleware' => array('auth'), 'prefix' => 'module'), function()
{
	Route::group(array('prefix' => '/mantenimiento'), function()
	{
		Route::get('/app/new', function()
		{
			return Redirect::to('module/setup/app')->with('newAppAction', true);
		});

		Route::get('/app/edit', function()
		{
			return Redirect::to('module/setup/app')->with('editAppAction', true);
		});

		Route::get('/app/delete', function()
		{
			return Redirect::to('module/setup/app')->with('deleteAppAction', true);
		});

		Route::group(array('middleware' => array('check.first.time.access', 'check.access', 'csrf')), function()
		{
			// Route::controller('/app', 'Vendor\DecimaModule\Module\Controllers\AppManager');
		});
	});
});
