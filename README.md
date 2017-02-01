Yii2-review
==========
Module fo adding riview for yii2 model

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer require fgh151/yii2-review "*"
```

or add

```
"fgh151/yii2-review": "*",
```

to the require section of your `composer.json` file.

Migrate up

```
php yii migrate --migrationPath=vendor/fgh151/yii2-review/migrations
```

Once the extension is installed, simply add it in your config by  :
Basic ```config/web.php```

Advanced ```[backend|frontend|common]/config/main.php```

```php
    'modules' => [
        'review' => [
            'class' => 'fgh151\review\Module',
        ],
        //...
    ]
```

RBAC
----

You can use RBAC with module. Simply add it in your config:

```
>
        'modules'    => [
             'review' => [
                 'class' => 'fgh151\review\Module',
                 'as access' => [
                     'class' => 'yii\filters\AccessControl',
                     'rules' => [
                         [
                             'allow' => true,
                             'roles' => ['admin'],
                         ]
                     ]
                 ]
             ]
            ...
            ...
        ],
```

Usage
-----
Add widgets to view five

```php
<?php
use fgh151\review\widgets\ReviewList;
use fgh151\review\widgets\ReviewForm;
?>

Review list:
<?=ReviewList::widget(['itemId' => $model->id, 'entity' => $model::className()]);?>

Review form:
<?=ReviewForm::widget(['model' => $model->id, 'entity' => $model::className()]);?>
```

Customize
---------

You can override widgets views. Just add vie folder in widget. For example:

```php
<?=ReviewForm::widget([
    'modelId' => $model->id,
    'entity' => $model::className(),
    'viewFolder' => '@app/widgets/yii2-review/views'
]);?>

<?=ReviewList::widget([
    'itemId' => $model->id,
    'entity' => $model::className(),
    'viewFolder' => '@app/widgets/yii2-review/views'
]);?>

```