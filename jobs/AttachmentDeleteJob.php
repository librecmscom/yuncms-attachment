<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\attachment\jobs;

use yii\base\BaseObject;
use yii\queue\RetryableJob;
use yii\base\Exception;

/**
 * Class AttachmentDeleteJob.
 */
class AttachmentDeleteJob extends BaseObject implements RetryableJob
{
    /**
     * @var string 文件路径
     */
    public $path;

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        if (!unlink($this->path)) {
            throw new Exception('File deletion failed.');
        }
    }

    /**
     * @inheritdoc
     */
    public function getTtr()
    {
        return 60;
    }

    /**
     * @inheritdoc
     */
    public function canRetry($attempt, $error)
    {
        return $attempt < 3;
    }
}