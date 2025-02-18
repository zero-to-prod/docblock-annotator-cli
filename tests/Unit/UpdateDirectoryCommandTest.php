<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\DocblockAnnotatorCli\UpdateDirectory\UpdateDirectoryArguments;
use Zerotoprod\DocblockAnnotatorCli\UpdateDirectory\UpdateDirectoryCommand;

class UpdateDirectoryCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new UpdateDirectoryCommand());
        $Command = $Application->find(UpdateDirectoryCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            UpdateDirectoryArguments::directory => 'bin',
            UpdateDirectoryArguments::comments => ['comment'],
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}