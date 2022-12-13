<?php

declare(strict_types = 1);

use Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector;
use Rector\CodeQuality\Rector\If_\ShortenElseIfRector;
use Rector\CodeQuality\Rector\Include_\AbsolutizeRequireAndIncludePathRector;
use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void
{
    $rectorConfig->paths([
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_74);
    $rectorConfig->importNames(true, false);
    // $rectorConfig->symfonyContainerXml(__DIR__.'/var/cache/dev/App_KernelDevDebugContainer.xml');

    $rectorConfig->import(SetList::DEAD_CODE);
    $rectorConfig->import(SetList::CODE_QUALITY);
    $rectorConfig->import(SetList::PHP_74);
    $rectorConfig->import(SetList::PHP_80);
    $rectorConfig->import(SetList::PHP_81);
    $rectorConfig->import(SetList::PHP_82);

    // -- Symfony Framework
    $rectorConfig->import(SymfonySetList::SYMFONY_40);
    $rectorConfig->import(SymfonySetList::SYMFONY_41);
    $rectorConfig->import(SymfonySetList::SYMFONY_42);
    $rectorConfig->import(SymfonySetList::SYMFONY_43);
    $rectorConfig->import(SymfonySetList::SYMFONY_44);
    $rectorConfig->import(SymfonySetList::SYMFONY_CODE_QUALITY);
    //-- Skip some rules/files ...
    $rectorConfig->skip([
        ShortenElseIfRector::class,
        CallableThisArrayToAnonymousFunctionRector::class,
        AbsolutizeRequireAndIncludePathRector::class,
    ]);
};
