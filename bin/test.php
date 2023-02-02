<?php

require __DIR__.'/../vendor/autoload.php';

// Generate proxy
$proxy = \Symfony\Component\VarExporter\ProxyHelper::generateLazyProxy(new ReflectionClass(\App\ClassToProxy::class));
file_put_contents('src/Proxy.php', "<?php\n\nnamespace App;\n\nclass Proxy " . $proxy);

// Test main class with function with argument by referrence
$value = 0;
$test = new \App\ClassToProxy();
$test->methodWithArgumentbyReference($value);

echo sprintf("Value after call without proxy: %d", $value);

echo "\n";

// Test the proxy
$value = 0;
$test = new \App\Proxy();
$test->methodWithArgumentbyReference($value);

echo sprintf("Value after call with proxy: %d", $value);
