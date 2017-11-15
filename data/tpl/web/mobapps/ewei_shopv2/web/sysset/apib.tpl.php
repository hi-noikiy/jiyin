<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> <h2>商城请求API配置</h2> </div>
 
    <form action="" method="post" class="form-horizontal  form-validate" enctype="multipart/form-data" >
      <div class='form-group-title'>商城请求第三方的参数:</div>
      
            <div class="form-group">
                <label class="col-sm-2 control-label">host</label>
                <div class="col-sm-9 col-xs-12">

                    	<input type="text" name="data[hostb]" class="form-control" value="<?php  echo $data['hostb'];?>" />

                </div>
            </div>      
      
      
      
      
      
            <div class="form-group">
                <label class="col-sm-2 control-label">apikey</label>
                <div class="col-sm-9 col-xs-12">

                    	<input type="text" name="data[apikeyb]" class="form-control" value="<?php  echo $data['apikeyb'];?>" />

                </div>
            </div>
                
            <div class="form-group">
                <label class="col-sm-2 control-label">apipassword</label>
                <div class="col-sm-9 col-xs-12">

                    	<input type="text" name="data[apipasswordb]" class="form-control" value="<?php  echo $data['apipasswordb'];?>" />

                </div>
            </div>


        <div class="form-group"></div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                          
                            <input type="submit"  value="提交" class="btn btn-primary"  />
                          
                     </div>
            </div>
 
    </form>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>     