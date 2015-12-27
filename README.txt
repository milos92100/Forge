####################### PHP UNIT #############

phpunit --bootstrap vendor/autoload.php tests/

===================== PHP DOC=================
php phpDocumentor.phar -d ./src -t ./docs/src