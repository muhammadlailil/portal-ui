<?php
namespace Laililmahfud\PortalUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laililmahfud\PortalUi\PublishCssProperties;

class PortalUiServiceProvider extends ServiceProvider
{
     protected $components = [
          "accordion",
          "alert",
          "alert-dialog",
          "avatar",
          "badge",
          "breadcrumb",
          "button",
          "card",
          "checkbox",
          "combobox",
          "command",
          "datepicker",
          "dialog",
          "dropdown-menu",
          "editor",
          "file-upload",
          "form",
          "heading",
          "hover-card",
          "icon",
          "input",
          "label",
          "layout",
          "link",
          "otp",
          "pagination",
          "popover",
          "progress",
          "radio",
          "select",
          "separator",
          "sheet",
          "sidebar",
          "switch",
          "table",
          "tabs",
          "textarea",
          "toast",
          "tooltip"
     ];

     /**
      * Register services.
      */
     public function register(): void
     {

     }


     /**
      * Bootstrap services.
      */
     public function boot(): void
     {
          $this->loadViewsFrom(__DIR__ . '/../resources', 'portal');
          $this->registerBladeDirective();

          $this->assetPublisher();

          if ($this->app->runningInConsole()) {
               $this->commands([
                   PublishCssProperties::class,
               ]);
           }
     }

     private function assetPublisher()
     {
          $this->publishes([__DIR__ . '/../public' => public_path('portal-ui')], 'portal-ui:asset');
          $this->publishes([__DIR__ . '/../tailwind.config.js' => base_path('tailwind.config.js')], 'portal-ui:tailwind-config');
          $this->publishes([__DIR__ . '/../resources/css' => resource_path('css')], 'portal-ui:input-css');

          foreach ($this->components as $component) {
               $this->publishes([__DIR__ . "/../resources/components/$component" => resource_path("views/components/$component")], "portal-ui:$component");
          }
     }

     private function registerBladeDirective()
     {
          Blade::directive('portalUI', function () {
               $alpineModule = "";
               $csrf = '<meta name="csrf-token" content="' . csrf_token() . '">';
               $fonts = '<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"/>';
               $css = '<link href="' . asset('portal-ui/portal-ui.css') . '" rel="stylesheet"/>';
               $yieldCss = "<?php echo view()->yieldPushContent('css'); ?>";
               $alpine = '<script defer src="' . asset('portal-ui/module/alpine.js') . '"></script>';
               $alpineModule .= '<script defer src="' . asset('portal-ui/module/alpine-collapse.js') . '"></script>';
               $alpineModule .= '<script defer src="' . asset('portal-ui/module/alpine-anchor.js') . '"></script>';
               $yieldJs = "<?php echo view()->yieldPushContent('scripts'); ?>";
               $themeToggle = ' <script> document.documentElement.classList.toggle("dark",localStorage.theme === "dark" ||(!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches));</script>';
               return $csrf . $fonts . $css . $alpineModule . $yieldCss . $alpine . $yieldJs . $themeToggle;
          });
     }
}