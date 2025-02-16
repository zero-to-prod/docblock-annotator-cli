<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\DocblockAnnotatorCli\Update\UpdateArguments;
use Zerotoprod\DocblockAnnotatorCli\Update\UpdateCommand;

class UpdateCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $Application = new Application();
        $Application->add(new UpdateCommand());
        $Command = $Application->find(UpdateCommand::signature);
        $CommandTester = new CommandTester($Command);

        $CommandTester->execute([
            UpdateArguments::directory => 'bin',
            UpdateArguments::comments => ['comment'],
        ]);

        $CommandTester->assertCommandIsSuccessful();
    }
}