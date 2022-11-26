<?php

declare(strict_types=1);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'yoda_style' => false,
        'is_null' => false,
        'concat_space' => ['spacing' => 'one'],
        'header_comment' => false,
        'heredoc_indentation' => false,
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
        ],
        'phpdoc_annotation_without_dot' => false,
        'single_line_comment_style' => false,
//        'phpdoc_no_alias_tag' => [
//            'replacements' => [
//                'property-read' => 'property',
//                'property-write' => 'property',
//                'type' => 'var',
//                'link' => 'see',
//            ],
//        ],
        'phpdoc_no_alias_tag' => false,
        'phpdoc_align' => false,
        'align_multiline_comment' => false,
        'fully_qualified_strict_types' => true,
        'static_lambda' => false,
        'lambda_not_used_import' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
        'no_leading_import_slash' => true,
        'no_unused_imports' => true,
        'single_import_per_statement' => true,
        'single_line_after_imports' => true,
        'strict_comparison' => true,
        'echo_tag_syntax' => ['format' => 'short'],
        'no_unneeded_curly_braces' => true,
        'blank_line_after_namespace' => true,
        'blank_line_before_statement' => [
            'statements' => [
                'case',
                // 'break',
                'continue',
                'declare',
                'default',
                'do',
                'exit',
                'for',
                'foreach',
                'goto',
                'if',
                'include',
                'include_once',
                'phpdoc',
                'require',
                'require_once',
                'return',
                'switch',
                'throw',
                'try',
                'while',
                'yield',
            ],
        ],
        'php_unit_set_up_tear_down_visibility' => false,
        'php_unit_test_case_static_method_calls' => [
            'call_type' => 'this',
        ],
        'native_constant_invocation' => false,
        'native_function_casing' => true,
        'native_function_invocation' => false,
        'native_function_type_declaration_casing' => true,
        'fopen_flags' => ['b_mode' => true],
        'get_class_to_class_keyword' => false, // TODO: as of php 8.0
        'phpdoc_to_return_type' => false, // TODO: as of php 8.0
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->files()
            ->name('*.php')
            ->in(__DIR__ . '/src')
    );
