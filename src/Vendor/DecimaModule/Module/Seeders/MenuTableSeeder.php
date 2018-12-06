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

		Menu::create(array('name' => 'App Management', 'lang_key' => 'decima-open-cms::menu.appManagement', 'url' => '/cms/events/app-management', 'action_button_id' => 'rh-emp-btn-close', 'action_lang_key' => 'decima-open-cms::menu.appAction', 'icon' => 'fa fa-gear', 'parent_id' => $parentMenuId, 'module_id' => $moduleId, 'created_by' => 1));

		$lastMenuId = DB::table('SEC_Menu')->max('id');

		Permission::create(array('name' => 'New App', 'key' => 'newApp', 'lang_key' => 'decima-open-cms::menu.newApp', 'url' => '/cms/events/app-management/new', 'alias_url' => '/cms/events/app-management', 'action_button_id' => 'rh-emp-btn-new', 'action_lang_key' => 'decima-open-cms::menu.newAppAction', 'icon' => 'fa fa-plus', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1));
		Permission::create(array('name' => 'Edit App', 'key' => 'editApp', 'lang_key' => 'decima-open-cms::menu.editApp', 'url' => '/cms/events/app-management/edit', 'alias_url' => '/cms/events/app-management', 'action_button_id' => 'rh-emp-btn-edit-helper', 'action_lang_key' => 'decima-open-cms::menu.editAppAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
		Permission::create(array('name' => 'Delete App', 'key' => 'deleteApp', 'lang_key' => 'decima-open-cms::menu.deleteApp', 'url' => '/cms/events/app-management/delete', 'alias_url' => '/cms/events/app-management', 'action_button_id' => 'rh-emp-btn-delete-helper', 'action_lang_key' => 'decima-open-cms::menu.deleteAppAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
	}

}
