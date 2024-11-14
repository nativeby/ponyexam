<?php
// +----------------------------------------------------------------------
// | Pony Exam
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2020 https://gitee.com/ponyedu All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Pony <3421518028@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller\question;

use app\common\controller\Backend;

/**
 * 单选题管理
 *
 * @icon fa fa-question
 */
class Single extends Question
{
 	public function _initialize()
    {
        parent::_initialize();
 	    $this->type=1;
    }
}
