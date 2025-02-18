<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\DocblockAnnotatorCli\UpdateFile\UpdateFileArguments;
use Zerotoprod\DocblockAnnotatorCli\UpdateFile\UpdateFileCommand;

class UpdateFileCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new UpdateFileCommand());
        $Command = $Application->find(UpdateFileCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            UpdateFileArguments::file => 'bin/docblock-annotator-cli',
            UpdateFileArguments::comments => ['comment'],
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}