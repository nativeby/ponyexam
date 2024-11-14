<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:93:"/Users/jiangbo/zeng/php-prj/ponyexam/pc/public/../application/admin/view/exam/paper/edit.html";i:1731470758;s:82:"/Users/jiangbo/zeng/php-prj/ponyexam/pc/application/admin/view/layout/default.html";i:1731470758;s:79:"/Users/jiangbo/zeng/php-prj/ponyexam/pc/application/admin/view/common/meta.html";i:1731470758;s:81:"/Users/jiangbo/zeng/php-prj/ponyexam/pc/application/admin/view/common/script.html";i:1731470758;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">
    <input id="id" name="row[id]" type="hidden" value="<?php echo htmlentities($row['id']); ?>" />
	<div class="form-group">
       <label for="c-grade_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Grade_id'); ?>:</label>
       <div class="col-xs-12 col-sm-8">
           <?php echo $gradeList; ?>
       </div>
    </div>
    <div class="form-group">
       <label for="c-subject_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Subject_id'); ?>:</label>
       <div class="col-xs-12 col-sm-8">
           <?php echo $subjectList; ?>
       </div>
    </div>
    <div class="form-group">
       <label for="c-section_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Section_id'); ?>:</label>
       <div class="col-xs-12 col-sm-8">
           <?php echo $sectionList; ?>
       </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-name" data-rule="required" class="form-control" name="row[name]" type="text" value="<?php echo htmlentities($row['name']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Times'); ?>:</label>	
        <div class="col-xs-12 col-sm-8">
          <div class="input-group input-groupp-md">
			<input id="c-times" data-rule="required" class="form-control" name="row[times]" type="number" value="<?php echo htmlentities($row['times']); ?>">
            <a href="javascript:;" class=" input-group-addon"><?php echo __('Minute'); ?></a>
          </div>        
        </div>
    </div>
	<div class="form-group">
		        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Setting'); ?>:</label>
		        <div class="col-xs-12 col-sm-8">
		            
		            <dl class="fieldlist" data-template="setting" data-name="row[setting]">
		                <dd>
		                    <ins><?php echo __('Setting Type'); ?></ins>
							<ins><?php echo __('Setting Name'); ?></ins>
		                    <ins><?php echo __('Setting Quantity'); ?></ins>
		                    <ins><?php echo __('Setting Score'); ?></ins>
							<ins><?php echo __('Setting Questions'); ?></ins>
		                </dd>
		                <dd><a href="javascript:;" class="btn btn-sm btn-success btn-append"><i class="fa fa-plus"></i> 追加</a>
						<span><button type="button" id="fachoose-images" class="btn btn-primary btn-success btn-choose" data-input-id="<%=name%><%=index%>questions"  data-multiple="true" ref="type111"><i class="fa fa-list"></i> 查题</button></span>
						</dd>
		                <!--请注意 dd和textarea间不能存在其它任何元素，实际开发中textarea应该添加个hidden进行隐藏-->
		                <textarea name="row[setting]" class="form-control hide" cols="30" rows="5"><?php echo htmlentities($row['setting']); ?></textarea>
		            </dl>
		            <script id="setting" type="text/html">
		                <dd class="form-inline setting-row">
		                    <ins>
		                        <select name="<%=name%>[<%=index%>][type]" id="" class="form-control selectpicker ">
		                            <option value="1" <%if(row.type==1){%>selected<%}%>><?php echo __('Single'); ?></option>
		                            <option value="2" <%if(row.type==2){%>selected<%}%>><?php echo __('Multiple'); ?></option>
		                            <option value="3" <%if(row.type==3){%>selected<%}%>><?php echo __('Judge'); ?></option>
									<option value="4" <%if(row.type==4){%>selected<%}%>><?php echo __('Fill'); ?></option>
									<option value="9" <%if(row.type==9){%>selected<%}%>><?php echo __('Other'); ?></option>
		                        </select>
		                    </ins>
							<ins><input type="text"  name="<%=name%>[<%=index%>][title]" class="form-control " value="<%=row.title%>" placeholder="名称"/></ins>
							
		                    <ins><input type="number" step="1" min='1' name="<%=name%>[<%=index%>][quantity]" class="form-control quantity scoreset" value="<%=row.quantity%>" placeholder="数量"/></ins>
		                    <ins><input type="number" step="1" min='1' name="<%=name%>[<%=index%>][score]" class="form-control score scoreset" value="<%=row.score%>" placeholder="分值"/></ins>
		                    <ins><input type="text"  name="<%=name%>[<%=index%>][questions]" class="form-control " value="<%=row.questions%>" placeholder="多题ID逗号分开"/></ins>
		                   
							<!--下面的两个按钮务必保留-->
		                    <span class="btn btn-sm btn-danger btn-remove"><i class="fa fa-times"></i></span>
		                    <span class="btn btn-sm btn-primary btn-dragsort"><i class="fa fa-arrows"></i></span>
		                </dd>
		            </script>
		        </div>
	</div>
	
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Totalscore'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-totalscore" data-rule="required" class="form-control" name="row[totalscore]" type="number" value="<?php echo htmlentities($row['totalscore']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Passscore'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-passscore" data-rule="required" class="form-control" name="row[passscore]" type="number" value="<?php echo htmlentities($row['passscore']); ?>">
        </div>
    </div>
	<div class="form-group">
	    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Compose'); ?>:</label>
	    <div class="col-xs-12 col-sm-8">
		    <input  id="c-ismade" name="row[ismade]" type="hidden" value="1">
		    <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c-ismade" data-yes="1" data-no="0" >
			<i class="fa fa-toggle-on text-success fa-2x"></i>   
		   </a>
	    </div>
	</div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>