<?php

namespace Livewire;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Util;

class FileUploadConfiguration
{
    public static function storage()
    {
        if (app()->environment('testing')) {
            // We want to "fake" the first time in a test run, but not again because
            // ::fake() whipes the storage directory every time its called.
            rescue(function () {
                // If the storage disk is not found (meaning it's the first time),
                // this will throw an error and trip the second callback.
                return Storage::disk(static::disk());
            }, function () {
                return Storage::fake(static::disk());
            });
        }

        return Storage::disk(static::disk());
    }

    public static function disk()
    {
        if (app()->environment('testing')) {
            return 'tmp-for-tests';
        }

        return config('livewire.temporary_file_upload.disk') ?: config('filesystems.default');
    }

    public static function diskConfig()
    {
        return config('filesystems.disks.'.static::disk());
    }

    public static function isUsingS3()
    {
        $diskBeforeTestFake = config('livewire.temporary_file_upload.disk') ?: config('filesystems.default');

        return config('filesystems.disks.'.strtolower($diskBeforeTestFake).'.driver') === 's3';
    }

    protected static function directory()
    {
        return Util::normalizeRelativePath(config('livewire.temporary_file_upload.directory') ?: 'livewire-tmp');
    }

    protected static function s3Root()
    {
        return static::isUsingS3() && is_array(static::diskConfig()) && array_key_exists('root', static::diskConfig())
            ? Util::normalizeRelativePath(static::diskConfig()['root'])
            : '';
    }

    public static function path($path = '', $withS3Root = true)
    {
        $prefix = $withS3Root ? static::s3Root() : '';
        $directory = static::directory();
        $path = Util::normalizeRelativePath($path);

        return $prefix.($prefix ? '/' : '').$directory.($path ? '/' : '').$path;
    }

    public static function mimeType($filename)
    {
        $mimeType = static::storage()->getMimeType(static::path($filename));
        return $mimeType === 'image/svg' ? 'image/svg+xml' : $mimeType;
    }

    public static function middleware()
    {
        return config('livewire.temporary_file_upload.middleware') ?: 'throttle:60,1';
    }

    public static function rules()
    {
        $rules = config('livewire.temporary_file_upload.rules');

        if (is_null($rules)) return ['required', 'file', 'max:12288'];

        if (is_array($rules)) return $rules;

        return explode('|', $rules);
    }

    public static function maxUploadTime()
    {
        return config('livewire.temporary_file_upload.max_upload_time');
    }
}
