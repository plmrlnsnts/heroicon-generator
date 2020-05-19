<?php

namespace Plmrlnsnts\HeroiconGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HeroiconsBuildCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heroicons:build {--path=js/components/HeroIcons}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate heroicon vue components.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $paths = File::glob(base_path('node_modules/heroicons/*/*.svg'));

        File::ensureDirectoryExists($this->componentPath());

        File::cleanDirectory($this->componentPath());

        collect($paths)->each(function ($path) {
            File::put(
                $this->componentPath($this->componentName($path)),
                $this->componentStub(File::get($path)),
            );
        });
    }

    public function componentPath($path = '')
    {
        $path = Str::start($path, DIRECTORY_SEPARATOR);

        return resource_path($this->option('path') . $path);
    }

    public function componentName($path)
    {
        return (string) Str::of($path)
            ->afterLast('heroicons')
            ->trim(DIRECTORY_SEPARATOR)
            ->replace('/', '-')
            ->replace('.svg', '.vue')
            ->camel()
            ->ucfirst()
            ->start('HeroIcon');
    }

    public function componentStub($content)
    {
        $withIndentions = collect(explode(PHP_EOL, $content))
            ->filter()
            ->map(fn($line) => str_repeat(' ', 2) . $line)
            ->join(PHP_EOL);

        return <<<EOD
<template>
$withIndentions
</template>
EOD;
    }
}
