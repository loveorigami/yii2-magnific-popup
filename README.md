# Yii2-magnific-popup

This widget is wrapper for awesome jQuery plugin Magnific Popup By Dmitry Semenov http://dimsemenov.com/plugins/magnific-popup/

Magnific Popup is a responsive lightbox & dialog script with focus on performance and providing best experience for user with any device
(for jQuery or Zepto.js).

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```sh
$ php composer.phar require --prefer-dist loveorigami/yii2-magnific-popup "@dev"
```
or add
```
"loveorigami/yii2-magnific-popup": "@dev"
```
to the require section of your composer.json file.


## Simple usage
in view file 
```html
	<a href="original.jpg" title="Caption text"><img  src="/thumb_img.jpg" alt="Alt"></a>
```
```php
use lo\widgets\magnific\MagnificPopup;

echo MagnificPopup::widget(
	[
		'target' => '#mpup',
		'options' => [
			'delegate'=> 'a',
		]
	]
);
```

for gallery
```html
<div class="col-md-6" id="mpup">
	<a href="original.jpg" title="Caption for first"><img  src="/thumb_img.jpg" alt="Alt"></a>
	<a href="original2.jpg" title="Caption for second"><img  src="/thumb_img2.jpg" alt="Alt"></a>
</div>
```

```php
echo MagnificPopup::widget(
	[
		'target' => '#mpup',
		'options' => [
			'delegate'=> 'a',
		],
		'effect' => 'with-zoom' //for zoom effect
	]
);
```
