# php-html-obfuscate
Hide html text in DOM

## Usage

```php
<?php
include __DIR__ . "/HtmlObf.php";
$obf = new HidedHtml\Obfuscator();
?>

<p><?= $obf->obf('I\'m hidden') ?></p>

```
Result:
