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
use Vendor\DecimaModule\Module\Empleado;
use Vendor\DecimaModule\Module\ExperienciaLaboral;
use Vendor\DecimaModule\Module\Puesto;
use Illuminate\Database\Seeder;

class EmpleadoTableSeeder extends Seeder {

	public function run()
	{
		Puesto::create(array('nombre' => 'Progamador Senior'));
		Puesto::create(array('nombre' => 'Progamador Junior'));

		Empleado::create(array('nombre' => 'Mario', 'apellido' => 'Gallegos', 'edad' => 31, 'salario' => 300.20, 'decripcion' => 'Ejemplo de descripcion', 'puesto_id' => 1));

		ExperienciaLaboral::create(array('cargo' => 'Analista Programador', 'decripcion' => 'Ejemplo de descripcion 1', 'fecha_inicio' => '2016-01-01', 'fecha_fin' => '2016-03-30', 'empleado_id' => 1));
		ExperienciaLaboral::create(array('cargo' => 'Beta Tester', 'decripcion' => 'Ejemplo de descripcion 2', 'fecha_inicio' => '2016-04-01', 'fecha_fin' => '2016-04-30', 'empleado_id' => 1));
	}

}
