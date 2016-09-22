<?php
/**
 * @file
 * SEC_User Table Seeder
 *
 * All DecimaModule code is copyright by the original authors and released under the GNU Aferro General Public License version 3 (AGPLv3) or later.
 * See COPYRIGHT and LICENSE.
 */
namespace Vendor\DecimaModule\Module\Seeders;

use DB;
use App\Kwaai\Security\Module;
use App\Kwaai\Security\Menu;
use App\Kwaai\Security\Permission;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder {

	public function run()
	{
		Module::create(array('name' => 'Decima Module', 'lang_key' => 'decima-module::menu.module', 'icon' => 'fa fa-calculator', 'created_by' => 1));
		$moduleId = DB::table('SEC_Module')->max('id');

		Menu::create(array('name' => 'Setup ()', 'lang_key' => 'decima-module::menu.setup', 'url' => null, 'icon' => 'fa fa-gear', 'parent_id' => null, 'module_id' => $moduleId, 'created_by' => 1));

		$parentMenuId = DB::table('SEC_Menu')->max('id');

		Menu::create(array('name' => 'App', 'lang_key' => 'decima-module::menu.app', 'url' => '/recurso-humano/mantenimiento/apps', 'action_button_id' => 'rh-emp-btn-close', 'action_lang_key' => 'decima-module::menu.appAction', 'icon' => 'fa fa-gear', 'parent_id' => $parentMenuId, 'module_id' => $moduleId, 'created_by' => 1));

		// $lastMenuId = DB::table('SEC_Menu')->max('id');
		//
		// Permission::create(array('name' => 'New app', 'key' => 'newApp', 'lang_key' => 'decima-module::menu.newApp', 'url' => '/recurso-humano/mantenimiento/apps/new', 'alias_url' => '/recurso-humano/mantenimiento/apps', 'action_button_id' => 'rh-emp-btn-new', 'action_lang_key' => 'decima-module::menu.newAppAction', 'icon' => 'fa fa-plus', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1));
		// Permission::create(array('name' => 'Edit app', 'key' => 'editApp', 'lang_key' => 'decima-module::menu.editApp', 'url' => '/recurso-humano/mantenimiento/apps/edit', 'alias_url' => '/recurso-humano/mantenimiento/apps', 'action_button_id' => 'rh-emp-btn-edit-helper', 'action_lang_key' => 'decima-module::menu.editAppAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
		// Permission::create(array('name' => 'Delete app', 'key' => 'deleteApp', 'lang_key' => 'decima-module::menu.deleteApp', 'url' => '/recurso-humano/mantenimiento/apps/delete', 'alias_url' => '/recurso-humano/mantenimiento/apps', 'action_button_id' => 'rh-emp-btn-delete-helper', 'action_lang_key' => 'decima-module::menu.deleteAppAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
	}

}
