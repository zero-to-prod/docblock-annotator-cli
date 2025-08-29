<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use Zerotoprod\DataModel\DataModel;

/**
 * @internal
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateDirectoryArguments
{
    use DataModel;

    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const directory = 'directory';
    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public string $directory;

    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const comments = 'comments';
    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $comments;
}