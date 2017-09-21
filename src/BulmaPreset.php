<?php
namespace Softquantum\BulmaPreset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class BulmaPreset extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install($withAuth = false)
    {
        static::updatePackages();
        static::updateSass();

        if($withAuth)
        {
            static::addAuthTemplates();
        }

        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                'bulma' => '^0.5.*',
            ] + Arr::except($packages, ['bootstrap-sass', 'foundation-sites', 'uikit']);
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        // clean up orphan files
        $orphan_sass_files = glob(resource_path('/assets/sass/*.*'));

        foreach($orphan_sass_files as $sass_file)
        {
            (new Filesystem)->delete($sass_file);
        }

        copy(__DIR__.'/bulma-stubs/initial-variables.sass', resource_path('assets/sass/initial-variables.sass'));
        copy(__DIR__.'/bulma-stubs/bulma.sass', resource_path('assets/sass/bulma.sass'));
        copy(__DIR__.'/bulma-stubs/app.scss', resource_path('assets/sass/app.scss'));
    }

    /**
     * Copy Bulma Auth view templates.
     *
     * @return void
     */
    protected static function addAuthTemplates()
    {
        // Add Home controller
        copy(__DIR__.'/bulma-stubs/Controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));

        // Add Auth route in 'routes/web.php'
        $auth_route_entry = "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n";
        file_put_contents('./routes/web.php', $auth_route_entry, FILE_APPEND);

        // Copy Bulma Auth view templates
        (new Filesystem)->copyDirectory(__DIR__.'/bulma-stubs/views', resource_path('views'));
    }
}