<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>DMS <small>(v1.0)</small></span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <!-- <div class="profile">
                    <div class="profile_pic">
                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div> -->
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <?php if (!Yii::$app->user->isGuest) { ?>

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>General</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    [
                                        'label' => 'Student Details',
                                        "icon" => "child",
                                        "url" => "#",
                                        'items' => [
                                            ['label' => 'Student', 'url' => ['/program-student/index']],
                                            ['label' => 'Internship', 'url' => ['/internship/index']],
                                            ['label' => 'Student Activity', 'url' => ['/student-activity/index']],
                                        ],
                                    ],
                                    // ['label' => 'Student', 'icon' => 'child', 'url' => ['/program-student/index']],
                                //    ['label' => 'Alumni', 'icon' => 'send', 'url' => ['/student/alumni']],
                                   
                                    
                                    
                                    // [
                                    //     'label' => 'Course',
                                    //     "icon" => "book",
                                    //     "url" => "#",
                                    //     'items' => [
                                           
                        
                                    //     ],
                                    // ],
                                    
                                    [
                                        'label' => 'Department',
                                        "icon" => "th",
                                        "url" => "#",
                                        'items' => [
                                            ['label' => 'Seminars/Workshop/Conferences Organized', 'url' => ['/seminar/index']],
                                            // ['label' => 'Workshop Conducted', 'url' => ['/workshop/index']],
                                            ['label' => 'Extension Activities', 'url' => ['/extension-activities/index']],
                                            ['label' => 'Event', 'url' => ['/event/index']],
                                            ['label' => 'BOS', 'url' => ['/bos/index']],
                                            ['label' => 'Revision', 'url' => ['/revision/index']],
                                            ['label' => 'Project', 'url' => ['/project/index']],
                                        ],
                                    ],
                                    [
                                        'label' => 'Faculty',
                                        "icon" => "user",
                                        "url" => "#",
                                        'items' => [
                                            //['label' => 'Type', 'url' => ['/type/index']],
                                           // ['label' => 'Course', 'url' => ['/paper-type/index']],
                                            ////['label' => 'Assign Course', 'url' => ['/paper-faculty/index']],
                                            ['label' => 'Faculty', 'url' => ['/appointment/index']],
                                            ['label' => 'Subject Expert', 'url' => ['/subject-expert/index']],
                                            ['label' => 'Auditing Member', 'url' => ['/auditing-member/index']],
                                            ['label' => 'Examiner', 'url' => ['/examiner/index']],
                                            ['label' => 'Book Published', 'url' => ['/book-published/index']],
                                            ['label' => 'Paper Published', 'url' => ['/paper-published/index']],
                                            ['label' => 'Paper Presented', 'url' => ['/paper-presented/index']],
                                            ['label' => 'Events Attended', 'url' => ['/events-attended/index']],
                                            // ['label' => 'Workshop Attended', 'url' => ['/workshop-attended/index']],
                                            ['label' => 'Seminars/Workshop/Conferences Attended', 'url' => ['/seminar-attended/index']],
                                        ],
                                    ],
                                    [
                                        'label' => 'Settings',
                                        "icon" => "gear",
                                        "url" => "#",
                                        'items' => [
                                            ['label' => 'Program', 'url' => ['/program/index']],
                                            ['label' => 'Academic Year', 'url' => ['/academic-year/index']],
                                            ['label' => 'Organization', 'url' => ['/organization/index']],
                                            // ['label' => 'Department', 'url' => ['/department/index']],
                                            
                                            ['label' => 'Agency', 'url' => ['/agency/index']],
                                            ['label' => 'Users', 'url' => ['/users/index']],
                        
                                        ],
                                    ],
                                    // ['label' => 'Faculty','icon' => 'user', 'url' => ['/appointment/index']],
                                    //['label' => 'Backup Data', 'icon' => 'arrow-circle-down', 'url' => ['/site/backup']],
                                    /* [
                                        'label' => 'Faculty',
                                        "icon" => "th",
                                        "url" => "#",
                                        'items' => [
                                            ['label' => 'faculty', 'url' => ['/faculty/index']],
                                            ['label' => 'Appointments', 'url' => ['/appointment/index']],
                                        ],
                                    ], */
                                    /* [
                                        "label" => "Widgets",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Menu", "url" => ["site/menu"]],
                                            ["label" => "Panel", "url" => ["site/panel"]],
                                        ],
                                    ], */
                                   /*  [
                                        "label" => "Badges",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Default",
                                                "url" => "#",
                                                "badge" => "123",
                                            ],
                                            [
                                                "label" => "Success",
                                                "url" => "#",
                                                "badge" => "new",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Danger",
                                                "url" => "#",
                                                "badge" => "!",
                                                "badgeOptions" => ["class" => "label-danger"],
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Multilevel",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Second level 1",
                                                "url" => "#",
                                            ],
                                            [
                                                "label" => "Second level 2",
                                                "url" => "#",
                                                "items" => [
                                                    [
                                                        "label" => "Third level 1",
                                                        "url" => "#",
                                                    ],
                                                    [
                                                        "label" => "Third level 2",
                                                        "url" => "#",
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ], */
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <?php } ?>

                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!-- <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div> -->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <?php if (!Yii::$app->user->isGuest) { ?>
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Hey <?= Yii::$app->user->identity->department_name ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <!-- <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li> -->
                                <li><a href="index.php?r=site/logout" data-method="POST"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                      

                    </ul>
                </nav>
            </div>

        </div>
        <?php } ?>
       
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
              <a href="http://www.fossclubgoa.com/chowgulefossclub/"> Designed and Developed by Chowgule FOSS Club</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
