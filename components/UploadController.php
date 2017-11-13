<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\attachment\components;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Class UploadController
 * @package yuncms\attachment\controllers
 *
 * @property \yuncms\attachment\Module $module
 */
class UploadController extends Controller
{
    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'upload', 'um-upload', 'editor-md', 'dialog', 'multiple-upload',
                            'file-upload', 'files-upload', 'image-upload', 'images-upload',
                        ],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function actions()
    {
        return [
            'um-upload' => [
                'class' => 'xutl\umeditor\UMeditorAction',
            ],
            'editor-md' => [
                'class' => 'xutl\editormd\MarkdownAction',
            ],
            'file-upload' => [
                'class' => 'xutl\fileupload\UploadAction',
                'multiple' => false,
                'onlyImage' => false,
            ],
            'files-upload' => [
                'class' => 'xutl\fileupload\UploadAction',
                'multiple' => true,
                'onlyImage' => false,
            ],
            'image-upload' => [
                'class' => 'xutl\fileupload\UploadAction',
                'multiple' => false,
                'onlyImage' => true,
            ],
            'images-upload' => [
                'class' => 'xutl\fileupload\UploadAction',
                'multiple' => true,
                'onlyImage' => true,
            ],
        ];
    }
}