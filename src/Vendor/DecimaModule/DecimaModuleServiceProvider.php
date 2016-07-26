<?php namespace Vendor\DecimaModule;

// use Vendor\DecimaModule\Module\ModuleTable;

use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;

class DecimaModuleServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	* Bootstrap any application services.
	*
	* @return void
	*/
	public function boot()
	{
		include __DIR__.'/../../routes.php';

		// include __DIR__.'/../../helpers.php';

		$this->loadViewsFrom(__DIR__.'/../../views', 'decima-module');

		$this->loadTranslationsFrom(__DIR__.'/../../lang', 'decima-module');

		$this->publishes([
				__DIR__ . '/../../config/config.php' => config_path('module-general.php'),
		], 'config');

		$this->mergeConfigFrom(
				__DIR__ . '/../../config/config.php', 'module-general'
		);

		$this->publishes([
				__DIR__ . '/../../config/journal.php' => config_path('module-journal.php'),
		], 'config');

		$this->mergeConfigFrom(
				__DIR__ . '/../../config/journal.php', 'module-journal'
		);

		$this->publishes([
    __DIR__.'/../../migrations/' => database_path('/migrations')
		], 'migrations');

		// $this->registerJournalConfiguration();

		// $this->registerAccountChartTypeInterface();

		// $this->registerJournalManagementInterface();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	* Register a new organization trigger.
	*
	* @return void
	*/
	protected function registerJournalConfiguration()
	{
		$journalConfiguration = $this->app->make('AppJournalConfigurations');

		$this->app->instance('AppJournalConfigurations', array_merge($journalConfiguration, $this->app['config']->get('module-journal')));
	}

	/**
	* Register an account chart type interface instance.
	*
	* @return void
	*/
	protected function registerAccountChartTypeInterface()
	{
		$this->app->bind('Mgallegos\DecimaAccounting\System\Repositories\AccountChartType\AccountChartTypeInterface', function()
		{
			return new \Mgallegos\DecimaAccounting\System\Repositories\AccountChartType\EloquentAccountChartType( new AccountChartType() );
		});
	}

	/**
	* Register a account management interface instance.
	*
	* @return void
	*/
	protected function registerAccountManagementInterface()
	{
		$this->app->bind('Mgallegos\DecimaAccounting\Accounting\Services\AccountManagement\AccountManagementInterface', function($app)
		{
			return new AccountManager(
				$app->make('App\Kwaai\Security\Services\AuthenticationManagement\AuthenticationManagementInterface'),
				$app->make('App\Kwaai\Security\Services\JournalManagement\JournalManagementInterface'),
				$app->make('App\Kwaai\Security\Repositories\Journal\JournalInterface'),
				new	\Mgallegos\LaravelJqgrid\Encoders\JqGridJsonEncoder($app->make('excel')),
				new	\Mgallegos\DecimaAccounting\Accounting\Repositories\Account\EloquentAccountGridRepository(
					$app['db'],
					$app->make('App\Kwaai\Security\Services\AuthenticationManagement\AuthenticationManagementInterface'),
					$app['translator']
				),
				$app->make('Mgallegos\DecimaAccounting\Accounting\Repositories\Account\AccountInterface'),
				$app->make('Mgallegos\DecimaAccounting\Accounting\Repositories\AccountType\AccountTypeInterface'),
				$app->make('Mgallegos\DecimaAccounting\Accounting\Repositories\JournalEntry\JournalEntryInterface'),
				new Carbon(),
				$app['db'],
				$app['translator'],
				$app['config']
			);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
