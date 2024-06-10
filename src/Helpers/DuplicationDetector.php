<?php

namespace Jeelsureja\LaravelDuplicationChecker\Helpers;

class DuplicationDetector
{
    public function checkForDuplications()
    {
        // This is a simplified example. A real implementation would need a more robust algorithm.
        $warnings = [];

        // Define directories and files to scan
        $directories = ['app', 'resources'];
        $excluded = config('duplication.excluded_directories');
        
        foreach ($directories as $directory) {
            $files = $this->getPhpFiles(base_path($directory), $excluded);

            // Compare files for duplications (this is a naive approach)
            foreach ($files as $file) {
                $content = file_get_contents($file);
                // Generate a simple hash to identify duplicates
                $hash = md5($content);

                if (isset($warnings[$hash])) {
                    $warnings[$hash][] = $file;
                } else {
                    $warnings[$hash] = [$file];
                }
            }
        }

        // Filter out unique files
        return array_filter($warnings, function($files) {
            return count($files) > 1;
        });
    }

    private function getPhpFiles($directory, $excluded)
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        $files = [];

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue;
            }

            $path = $file->getPathname();
            if (pathinfo($path, PATHINFO_EXTENSION) === 'php' && !$this->isExcluded($path, $excluded)) {
                $files[] = $path;
            }
        }

        return $files;
    }

    private function isExcluded($path, $excluded)
    {
        foreach ($excluded as $dir) {
            if (strpos($path, base_path($dir)) === 0) {
                return true;
            }
        }

        return false;
    }
}