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

Route::group(array('middleware' => array('auth', 'check.first.time.access', 'check.access', 'csrf'), 'prefix' => 'recurso-humano/mantemiento'), function()
{
	// Route::controller('/initial-accounting-setup', 'Mgallegos\DecimaAccounting\Accounting\Controllers\SettingManager');
});

Route::group(array('middleware' => array('auth'), 'prefix' => 'recurso-humano'), function()
{
	Route::group(array('prefix' => '/mantenimiento'), function()
	{
		Route::get('/empleados/new', function()
		{
			return Redirect::to('recurso-humano/mantemiento/empleados')->with('newEmpleadoAction', true);
		});

		Route::get('/empleados/edit', function()
		{
			return Redirect::to('recurso-humano/mantemiento/empleados')->with('editEmpleadoAction', true);
		});

		Route::get('/empleados/delete', function()
		{
			return Redirect::to('recurso-humano/mantemiento/empleados')->with('deleteEmpleadoAction', true);
		});

		Route::group(array('middleware' => array('check.first.time.access', 'check.access', 'csrf')), function()
		{
			// Route::controller('/empleados', 'Vendor\DecimaModule\Module\Controllers\EmpleadoManager');
		});
	});
});
