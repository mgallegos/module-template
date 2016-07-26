<?php

/**
 * @file
 * Application Routes.
 *
 * All DecimaAccounting code is copyright by the original authors and released under the GNU Aferro General Public License version 3 (AGPLv3) or later.
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
	// Route::controller('/initial-accounting-setup', 'Mgallegos\DecimaAccounting\Accounting\Controllers\SettingManager');
});

Route::group(array('middleware' => array('auth'), 'prefix' => 'accounting'), function()
{
	Route::group(array('prefix' => '/setup'), function()
	{
		Route::get('/template-management/new', function()
		{
			return Redirect::to('module/setup/template-management')->with('newAccountAction', true);
		});

		Route::get('/template-management/edit', function()
		{
			return Redirect::to('module/setup/template-management')->with('editAccountAction', true);
		});

		Route::get('/template-management/delete', function()
		{
			return Redirect::to('module/setup/template-management')->with('deleteAccountAction', true);
		});

		Route::group(array('middleware' => array('check.first.time.access', 'check.access', 'csrf')), function()
		{
			// Route::controller('/template-management', 'Mgallegos\DecimaAccounting\Accounting\Controllers\AccountManager');
		});
	});
});
