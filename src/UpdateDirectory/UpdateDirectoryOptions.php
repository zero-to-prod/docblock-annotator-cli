<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use Zerotoprod\DataModel\DataModel;
use Zerotoprod\DocblockAnnotator\Modifier;
use Zerotoprod\DocblockAnnotator\Statement;

/**
 * @internal
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateDirectoryOptions
{
    use DataModel;

    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const modifiers = 'modifiers';
    /**
     * @var Modifier[]
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $modifiers = [];

    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const statements = 'statements';
    /**
     * @var Statement[]
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $statements = [];

    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const recursive = 'recursive';
    /**
     * @internal
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public bool $recursive = true;
}