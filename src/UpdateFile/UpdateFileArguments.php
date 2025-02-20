<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateFile;

use Zerotoprod\DataModel\DataModel;

/**
 * @internal
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateFileArguments
{
    use DataModel;

    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const file = 'file';
    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public string $file;

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