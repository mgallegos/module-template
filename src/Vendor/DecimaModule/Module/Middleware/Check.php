<?php
/**
 * @file
 * Check DecimaModule Setup Middleware.
 *
 * All DecimaModule code is copyright by the original authors and released under the GNU Aferro General Public License version 3 (AGPLv3) or later.
 * See COPYRIGHT and LICENSE.
 */

namespace Vendor\DecimaModule\Module\Middleware;

use Closure;
use Mgallegos\Vendor\DecimaModule\Services\SettingManagement\SettingManagementInterface;

class Check {

	/**
	 * Setting Manager Service
	 *
	 * @var Mgallegos\Vendor\DecimaModule\Services\SettingManagement\SettingManagementInterface
	 *
	 */
	protected $SettingManagerService;

	/**
	 * Create a new filter instance.
	 *
	 * @param  SettingManagementInterface $SettingManagerService
	 * @return void
	 */
	public function __construct(SettingManagementInterface $SettingManagerService)
	{
		$this->SettingManagerService = $SettingManagerService;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!$this->SettingManagerService->isDecimaModuleSetup())
		{
			return redirect('DecimaModule/setup/initial-DecimaModule-setup');
		}

		return $next($request);
	}

}
