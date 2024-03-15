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
## Result
![Example result](https://raw.githubusercontent.com/Allespro/php-html-obfuscate/main/example/example.png)

*Emojis and som special symbols not yet supported, be careful.*
