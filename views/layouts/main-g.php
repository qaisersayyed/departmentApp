<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php 

?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Department System',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(!Yii::$app->user->isGuest){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                /* ['label' => 'Home', 'url' => ['/site/index']], */
                
                ['label' => 'Student', 'url' => ['/program-student/index']],
                ['label' => 'Alumni', 'url' => ['/student-organization/index']],
                ['label' => 'Organization', 'url' => ['/organization/index']],
                [
                    'label' => 'Settings',
                    'items' => [
                        ['label' => 'Program', 'url' => ['/program/index']],
                        ['label' => 'Academic Year', 'url' => ['/academic-year/index']],
                        ['label' => 'Department', 'url' => ['/department/index']],
                        ['label' => 'Assign Papers', 'url' => ['/paper-faculty/index']],
                        ['label' => 'Revision', 'url' => ['/revision/index']],
                        ['label' => 'Agency', 'url' => ['/agency/index']],
    
                    ],
                ],
                [
                    'label' => 'Activities',
                    'items' => [
                        ['label' => 'Seminar', 'url' => ['/seminar/index']],
                        ['label' => 'Subject Expert', 'url' => ['/subject-expert/index']],
                        ['label' => 'Workshop', 'url' => ['/workshop/index']],
                        ['label' => 'Examiner', 'url' => ['/examiner/index']],
                        ['label' => 'Event', 'url' => ['/event/index']],
                        ['label' => 'BOS', 'url' => ['/bos/index']],
                        ['label' => 'Auditing Member', 'url' => ['/auditing-member/index']],
                        ['label' => 'Student Activity', 'url' => ['/student-activity/index']],
                        ['label' => 'Project', 'url' => ['/project/index']],
    
                    ],
                ],
                [
                    'label' => 'Course',
                    'items' => [
                        
                        ['label' => 'Type', 'url' => ['/type/index']],
                        ['label' => 'Course', 'url' => ['/paper-type/index']],
    
                    ],
                ],
                [
                    'label' => 'Faculty',
                    'items' => [
                        ['label' => 'faculty', 'url' => ['/faculty/index']],
                        ['label' => 'Appointments', 'url' => ['/appointment/index']],
                    ],
                ],
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }else{
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
              
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; FO$$ <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


