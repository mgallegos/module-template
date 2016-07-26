<?php
/**
 * @file
 * SEC_User Table Seeder
 *
 * All DecimaAccounting code is copyright by the original authors and released under the GNU Aferro General Public License version 3 (AGPLv3) or later.
 * See COPYRIGHT and LICENSE.
 */
namespace Mgallegos\DecimaAccounting\Accounting\Seeders;

use DB;
use App\Kwaai\Security\Module;
use App\Kwaai\Security\Menu;
use App\Kwaai\Security\Permission;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder {

	public function run()
	{
		Module::create(array('name' => 'Accounting', 'lang_key' => 'decima-accounting::menu.accountingModule', 'icon' => 'fa fa-calculator', 'created_by' => 1));
		$accountingModuleId = DB::table('SEC_Module')->max('id');

		Menu::create(array('name' => 'Setup', 'lang_key' => 'decima-accounting::menu.setup', 'url' => null, 'icon' => 'fa fa-gear', 'parent_id' => null, 'module_id' => $accountingModuleId, 'created_by' => 1));

		$parentMenuId = DB::table('SEC_Menu')->max('id');

		Menu::create(array('name' => 'Initial Accounting Setup', 'lang_key' => 'decima-accounting::menu.initialAccountingSetup', 'url' => '/accounting/setup/initial-accounting-setup', 'action_button_id' => '', 'action_lang_key' => 'decima-accounting::menu.initialAccountingSetupAction', 'icon' => 'fa fa-gear', 'parent_id' => $parentMenuId, 'module_id' => $accountingModuleId, 'created_by' => 1));
		Menu::create(array('name' => 'Accounts Management', 'lang_key' => 'decima-accounting::menu.accountManagement', 'url' => '/accounting/setup/accounts-management', 'action_button_id' => 'acct-am-btn-close', 'action_lang_key' => 'decima-accounting::menu.accountManagementAction', 'icon' => 'fa fa-wrench', 'parent_id' => $parentMenuId, 'module_id' => $accountingModuleId, 'created_by' => 1));

		$lastMenuId = DB::table('SEC_Menu')->max('id');

		Permission::create(array('name' => 'New Account', 'key' => 'newAccount', 'lang_key' => 'decima-accounting::menu.newAccount', 'url' => '/accounting/setup/accounts-management/new', 'alias_url' => '/accounting/setup/accounts-management', 'action_button_id' => 'acct-am-btn-new', 'action_lang_key' => 'decima-accounting::menu.newAccountAction', 'icon' => 'fa fa-plus', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1));
		Permission::create(array('name' => 'Edit Account', 'key' => 'editAccount', 'lang_key' => 'decima-accounting::menu.editAccount', 'url' => '/accounting/setup/accounts-management/edit', 'alias_url' => '/accounting/setup/accounts-management', 'action_button_id' => 'acct-am-btn-edit-helper', 'action_lang_key' => 'decima-accounting::menu.editAccountAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
		Permission::create(array('name' => 'Delete Account', 'key' => 'deleteAccount', 'lang_key' => 'decima-accounting::menu.deleteAccount', 'url' => '/accounting/setup/accounts-management/delete', 'alias_url' => '/accounting/setup/accounts-management', 'action_button_id' => 'acct-am-btn-delete-helper', 'action_lang_key' => 'decima-accounting::menu.deleteAccountAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
	}

}
