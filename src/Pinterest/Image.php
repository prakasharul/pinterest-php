<?php

namespace Pinterest;

use InvalidArgumentException;

final class Image
{
    const TYPE_URL = 'url';
    const TYPE_BASE64 = 'base64';
    const TYPE_FILE = 'file';

    private $type;
    private $data;

    private function __construct($type, $data)
    {
        $allowedTypes = array(Image::TYPE_URL, Image::TYPE_BASE64, Image::TYPE_FILE);
        if (!in_array($type, $allowedTypes)) {
            throw new InvalidArgumentException('Type ' . $type . ' is not allowed.');
        }

        $this->type = $type;
        $this->data = $data;
    }

    public static function url($url)
    {
        return new static(static::TYPE_URL, $url);
    }

    public static function base64($base64)
    {
        return new static(static::TYPE_BASE64, $base64);
    }

    public static function file($file)
    {
        return new static(static::TYPE_FILE, $file);
    }

    public function isUrl()
    {
        return $this->type === static::TYPE_URL;
    }

    public function isBase64()
    {
        return $this->type === static::TYPE_BASE64;
    }

    public function isFile()
    {
        return $this->type === static::TYPE_FILE;
    }

    public function getData()
    {
        if ($this->isFile()) {
            return $this->data;
        }

        return $this->data;
    }
}
