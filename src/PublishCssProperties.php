<?php

namespace Laililmahfud\PortalUi;

use Illuminate\Console\Command;
use function Laravel\Prompts\info;


class PublishCssProperties extends Command
{
     /**
      * The name and signature of the console command.
      *
      * @var string
      */
     protected $signature = 'portalui:development';

     /**
      * The console command description.
      *
      * @var string
      */
     protected $description = 'Portal UI Development Properties';

     /**
      * Execute the console command.
      */
     public function handle()
     {
          $this->publishStub();
          info('Start with');
          info('.\tailwindcss.exe -i resources/css/input.css -o public/portal-ui/portal-ui.css --watch --minify');
     }

     private function publishStub()
     {
          $inputDir = resource_path('css');
          if (!file_exists($inputDir)) {
               @mkdir($inputDir, 0755);
          }

          if (!file_exists("{$inputDir}/input.css")) {
               $inputTemplate = file_get_contents(__DIR__ . '/../resources/stubs/input.css.stub');
               file_put_contents($inputDir . '/input.css', $inputTemplate);
          }

          $tailwindDir = base_path('');
          if (!file_exists($tailwindDir)) {
               @mkdir($tailwindDir, 0755);
          }

          if (!file_exists("{$tailwindDir}/tailwind-admin.config.js")) {
               $tailwind = file_get_contents(__DIR__ . '/../resources/stubs/tailwind.config.js.stub');
               file_put_contents($tailwindDir . '/tailwind-admin.config.js', $tailwind);
          }
     }

}
