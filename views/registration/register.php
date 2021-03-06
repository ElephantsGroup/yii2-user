<?php

/**
 *
 * @name : eg-user
 * @Version 1.0.0
 * @Author : Jalal Jaberi
 *
 * based on Dektrium user <http://github.com/dektrium>
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var elephantsGroup\user\models\User $model
 * @var elephantsGroup\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 text-center">
                <div class="row form-login">
					<div class="panel-heading">
						<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
					</div>
					<div class="panel-body">
						<?php $form = ActiveForm::begin([
							'id' => 'registration-form',
							'enableAjaxValidation' => true,
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
            </div>
        </div>
    </div>
</section>  