<?php

namespace LaravelDoctrine\Extensions;

use Illuminate\Support\ServiceProvider;

class GedmoExtensionsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen('doctrine.extensions.booting', function () {
            $registry = $this->app->make('registry');

            foreach ($registry->getManagers() as $manager) {
                $chain = $manager->getConfiguration()->getMetadataDriverImpl();
            }
        });
    }

    /**
     * @return mixed
     */
    private function needsAllMappings()
    {
        return $this->app->make('config')->get('doctrine.gedmo.all_mappings', false) === true;
    }
}
