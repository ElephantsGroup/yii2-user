# Frequently Asked Questions

## How to change controller's layout?

You can change controller's layout using `controllerMap` module's property:

```php
'modules' => [
    'user' => [
        'class' => 'elephantsGroup\user\Module',
        'controllerMap' => [
            'admin' => [
                'class'  => 'elephantsGroup\user\controllers\AdminController',
                'layout' => '//admin-layout',
            ],
        ],
    ],
],
```

## How to get user's avatar url?

```php
\Yii::$app->user->identity->profile->getAvatarUrl();
// or you can specify size of avatar
\Yii::$app->user->identity->profile->getAvatarUrl(150);
```

## How to make one view for registration and login?

You can use Login widget to achieve this:

```php
<?php

use elephantsGroup\user\widgets\Login;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var elephantsGroup\user\models\User $user
 * @var elephantsGroup\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::t('user', 'Sign in') ?></h3>
            </div>
            <div class="panel-body">
                <?= Login::widget() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?php endif ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>
```