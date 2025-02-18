<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use Zerotoprod\DataModel\DataModel;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateDirectoryArguments
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const directory = 'directory';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public string $directory;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const comments = 'comments';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $comments;
}