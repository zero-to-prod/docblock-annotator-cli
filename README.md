# Zerotoprod\DocblockAnnotatorCli

![](art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/docblock-annotator-cli)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/docblock-annotator-cli/test.yml?label=test)](https://github.com/zero-to-prod/docblock-annotator-cli/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/docblock-annotator-cli/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/docblock-annotator-cli/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/docblock-annotator-cli/build_docker_image.yml?label=build_docker_image)](https://github.com/zero-to-prod/docblock-annotator-cli/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/docblock-annotator-cli?color=blue)](https://packagist.org/packages/zero-to-prod/docblock-annotator-cli/stats)
[![php](https://img.shields.io/packagist/php-v/zero-to-prod/docblock-annotator-cli.svg?color=purple)](https://packagist.org/packages/zero-to-prod/docblock-annotator-cli/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/docblock-annotator-cli?color=f28d1a)](https://packagist.org/packages/zero-to-prod/docblock-annotator-cli)
[![License](https://img.shields.io/packagist/l/zero-to-prod/docblock-annotator-cli?color=pink)](https://github.com/zero-to-prod/docblock-annotator-cli/blob/main/LICENSE.md)
[![wakatime](https://wakatime.com/badge/github/zero-to-prod/docblock-annotator-cli.svg)](https://wakatime.com/badge/github/zero-to-prod/docblock-annotator-cli)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/docblock-annotator-cli?branch=main)](https://hitsofcode.com/github/zero-to-prod/docblock-annotator-cli/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation Publishing](#documentation-publishing)
    - [Automatic Documentation Publishing](#automatic-documentation-publishing)
- [Usage](#usage)
    - [Available Commands](#available-commands)
        - [`docblock-annotator-cli:src`](#docblock-annotator-clisrc)
        - [`docblock-annotator-cli:update-file`](#docblock-annotator-clipdate-file)
        - [`docblock-annotator-cli:update-directory`](#docblock-annotator-clipdate-directory)
- [Docker Image](#docker-image)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Image Development](./IMAGE_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

A cli for annotating Docblocks.

## Requirements

- PHP 8.1 or higher.

## Installation

Install `Zerotoprod\DocblockAnnotatorCli` via [Composer](https://getcomposer.org/):

```bash
composer require zero-to-prod/docblock-annotator-cli
```

This will add the package to your project's dependencies and create an autoloader entry for it.

## Documentation Publishing

You can publish this README to your local documentation directory.

This can be useful for providing documentation for AI agents.

This can be done using the included script:

```bash
# Publish to default location (./docs/zero-to-prod/docblock-annotator-cli)
vendor/bin/zero-to-prod-docblock-annotator-cli

# Publish to custom directory
vendor/bin/zero-to-prod-docblock-annotator-cli /path/to/your/docs
```

### Automatic Documentation Publishing

You can automatically publish documentation by adding the following to your `composer.json`:

```json
{
    "scripts": {
        "post-install-cmd": [
            "zero-to-prod-docblock-annotator-cli"
        ],
        "post-update-cmd": [
            "zero-to-prod-docblock-annotator-cli"
        ]
    }
}
```

## Usage

Run this command to see the available commands:

```shell
vendor/bin/docblock-annotator-cli list
```

### Available Commands

#### `docblock-annotator-cli:src`

Displays the project's GitHub repository URL.

**Usage:**
```shell
vendor/bin/docblock-annotator-cli docblock-annotator-cli:src
```

**Example:**
```shell
$ vendor/bin/docblock-annotator-cli docblock-annotator-cli:src
https://github.com/zero-to-prod/docblock-annotator-cli
```

#### `docblock-annotator-cli:update-file`

Adds lines to a PHP docblock in a specific file.

**Usage:**
```shell
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-file [options] <file> [<comments>...]
```

**Arguments:**
- `file` (required) - The PHP file to update
- `comments` (optional) - The comments to add to the docblock

**Options:**
- `--modifiers` - The modifier of the member: public, private, protected (default: public)
- `--statements` - The statements to annotate: class_method, const, class, class_const, enum_case, enum, function, trait, property, interface (default: all)

**Examples:**
```shell
# Add comments to all public methods in a file
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-file src/MyClass.php "Added by CLI" "Updated on $(date)"

# Update only private methods with custom comments
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-file --modifiers=private src/MyClass.php "Private method updated"

# Update only class methods and properties
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-file --statements=class_method --statements=property src/MyClass.php "Method and property updated"
```

#### `docblock-annotator-cli:update-directory`

Adds lines to PHP docblocks in all files within a directory.

**Usage:**
```shell
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-directory [options] <directory> [<comments>...]
```

**Alias:** `docblock-annotator-cli:update`

**Arguments:**
- `directory` (required) - The directory to update PHP files in
- `comments` (optional) - The comments to add to the docblock

**Options:**
- `--modifiers` - The modifier of the member: public, private, protected (default: public)
- `--statements` - The statements to annotate: class_method, const, class, class_const, enum_case, enum, function, trait, property, interface (default: all)
- `--recursive` / `--no-recursive` - Recursively search for files (default: recursive)

**Examples:**
```shell
# Update all PHP files in src directory with comments
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-directory src/ "Bulk updated" "$(date)"

# Update only public methods in src directory (non-recursive)
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-directory --no-recursive --statements=class_method src/ "Public methods updated"

# Use the shorter alias command
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update src/ "Updated via alias"

# Update all statement types with specific modifiers
vendor/bin/docblock-annotator-cli docblock-annotator-cli:update-directory --modifiers=public --modifiers=protected src/ "Updated public and protected members"
```

## Docker Image

You can also run the cli using the [docker image](https://hub.docker.com/repository/docker/davidsmith3/docblock-annotator-cli/general):

```shell
docker run --rm davidsmith3/docblock-annotator-cli
```

## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/docblock-annotator-cli/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.
