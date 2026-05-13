<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([__DIR__.'/src', __DIR__.'/tests'])
    ->exclude(['var', 'vendor', 'config/secrets'])
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setCacheFile('var/.php-cs-fixer.cache')
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'declare_strict_types' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'array_syntax' => ['syntax' => 'short'],
        'trailing_comma_in_multiline' => true,
        'phpdoc_align' => false,
        'phpdoc_to_comment' => false,
        'yoda_style' => false,
        'native_function_invocation' => ['include' => ['@compiler_optimized'], 'scope' => 'namespaced'],
        'void_return' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'modernize_strpos' => true,
        'concat_space' => ['spacing' => 'one'],
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
