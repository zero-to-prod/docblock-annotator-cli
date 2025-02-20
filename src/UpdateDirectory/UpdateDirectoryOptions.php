<?php

namespace Zerotoprod\DocblockAnnotatorCli\UpdateDirectory;

use Zerotoprod\DataModel\DataModel;
use Zerotoprod\DocblockAnnotator\Modifier;
use Zerotoprod\DocblockAnnotator\Statement;

/**
 * @link https://github.com/zero-to-prod/docblock-annotator-cli
 */
class UpdateDirectoryOptions
{
    use DataModel;

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const modifiers = 'modifiers';
    /**
     * @var Modifier[]
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $modifiers = [];

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const statements = 'statements';
    /**
     * @var Statement[]
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public array $statements = [];

    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public const recursive = 'recursive';
    /**
     * @link https://github.com/zero-to-prod/docblock-annotator-cli
     */
    public bool $recursive = true;
}