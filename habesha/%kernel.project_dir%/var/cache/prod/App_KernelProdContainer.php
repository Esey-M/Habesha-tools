<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQZGZx3P\App_KernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQZGZx3P/App_KernelProdContainer.php') {
    touch(__DIR__.'/ContainerQZGZx3P.legacy');

    return;
}

if (!\class_exists(App_KernelProdContainer::class, false)) {
    \class_alias(\ContainerQZGZx3P\App_KernelProdContainer::class, App_KernelProdContainer::class, false);
}

return new \ContainerQZGZx3P\App_KernelProdContainer([
    'container.build_hash' => 'QZGZx3P',
    'container.build_id' => '1c91e474',
    'container.build_time' => 1743375614,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQZGZx3P');
