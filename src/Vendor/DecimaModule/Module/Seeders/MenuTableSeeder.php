<?php
/**
 * @file
 * SEC_User Table Seeder
 *
 * All DecimaAccounting code is copyright by the original authors and released under the GNU Aferro General Public License version 3 (AGPLv3) or later.
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
		Module::create(array('name' => 'Recursos Humanos', 'lang_key' => 'decima-module::menu.rhModule', 'icon' => 'fa fa-calculator', 'created_by' => 1));
		$accountingModuleId = DB::table('SEC_Module')->max('id');

		Menu::create(array('name' => 'Mantenimientos', 'lang_key' => 'decima-module::menu.mantenimiento', 'url' => null, 'icon' => 'fa fa-gear', 'parent_id' => null, 'module_id' => $accountingModuleId, 'created_by' => 1));

		$parentMenuId = DB::table('SEC_Menu')->max('id');

		Menu::create(array('name' => 'Empleado', 'lang_key' => 'decima-module::menu.empleado', 'url' => '/recurso-humano/mantenimiento/empleados', 'action_button_id' => 'rh-emp-btn-close', 'action_lang_key' => 'decima-module::menu.empleadoAccion', 'icon' => 'fa fa-gear', 'parent_id' => $parentMenuId, 'module_id' => $accountingModuleId, 'created_by' => 1));
		Menu::create(array('name' => 'Contratos', 'lang_key' => 'decima-module::menu.contrato', 'url' => '/recurso-humano/mantenimiento/contratos', 'action_button_id' => 'rh-con-btn-close', 'action_lang_key' => 'decima-module::menu.empleadoContrato', 'icon' => 'fa fa-wrench', 'parent_id' => $parentMenuId, 'module_id' => $accountingModuleId, 'created_by' => 1));

		$lastMenuId = DB::table('SEC_Menu')->max('id');

		Permission::create(array('name' => 'Nuevo empleado', 'key' => 'newEmpleado', 'lang_key' => 'decima-module::menu.newEmpleado', 'url' => '/recurso-humano/mantenimiento/empleados/new', 'alias_url' => '/recurso-humano/mantenimiento/empleados', 'action_button_id' => 'rh-emp-btn-new', 'action_lang_key' => 'decima-module::menu.newEmpleadoAction', 'icon' => 'fa fa-plus', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1));
		Permission::create(array('name' => 'Editar empleado', 'key' => 'editEmpleado', 'lang_key' => 'decima-module::menu.editEmpleado', 'url' => '/recurso-humano/mantenimiento/empleados/edit', 'alias_url' => '/recurso-humano/mantenimiento/empleados', 'action_button_id' => 'rh-emp-btn-edit-helper', 'action_lang_key' => 'decima-module::menu.editEmpleadoAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
		Permission::create(array('name' => 'Eliminar empleado', 'key' => 'deleteEmpleado', 'lang_key' => 'decima-module::menu.deleteEmpleado', 'url' => '/recurso-humano/mantenimiento/empleados/delete', 'alias_url' => '/recurso-humano/mantenimiento/empleados', 'action_button_id' => 'rh-emp-btn-delete-helper', 'action_lang_key' => 'decima-module::menu.deleteEmpleadoAction', 'is_only_shortcut' => true, 'menu_id' => $lastMenuId, 'created_by' => 1, 'hidden' => true));
	}

}
