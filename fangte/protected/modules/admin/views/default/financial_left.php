<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <meta name="Author" content="58haojie Team">
                <meta name="Copyright" content="58haojie">
                    <link rel="icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
                        <link rel="shortcut icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
                            <link href="<?= Yii::app()->request->baseUrl ?>/css/base.css" rel="stylesheet" type="text/css">
                                <link href="<?= Yii::app()->request->baseUrl ?>/css/admin.css" rel="stylesheet" type="text/css">
                                    </head>
                                    <body class="menu">
                                        <div class="menuContent">
                                            <dl>
                                                <dt>
                                                    <span>方特娱乐设施管理</span>

                                                </dt>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/list'); ?>" target="mainFrame">娱乐设施列表</a>
                                                </dd>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/add'); ?>" target="mainFrame">添加娱乐设施</a>
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>
                                                    <span>其他景点管理</span>

                                                </dt>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/other'); ?>" target="mainFrame">景点列表</a>
                                                </dd>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/addother'); ?>" target="mainFrame">添加景点</a>
                                                </dd>
                                            </dl>
                                        </div>
                                    </body>
                                    </html>
