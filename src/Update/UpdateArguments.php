<?php

namespace Zerotoprod\DocblockAnnotatorCli\Update;

use Zerotoprod\DataModel\DataModel;

class UpdateArguments
{
    use DataModel;

    public const directory = 'directory';
    public string $directory;

    public const comments = 'comments';
    public array $comments;
}