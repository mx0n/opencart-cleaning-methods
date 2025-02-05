<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-cleaning_db" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-cogs"></i> <?php echo $heading_title; ?></h3>
      </div>
      <div class="panel-body">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-cleaning_db" class="form-horizontal">
    </form>

		<form action="<?php echo $clean_products; ?>" method="post" enctype="multipart/form-data" id="clean-products" class="form-horizontal col-sm-3">
      <input type="submit" class="btn btn-danger" name="delete_products" value="Delete all products" />
    </form>
    <form action="<?php echo $clean_categories; ?>" method="post" enctype="multipart/form-data" id="clean-categories" class="form-horizontal col-sm-3">
    <input type="submit" class="btn btn-danger" name="delete_categories" value="Delete all categories" />
    </form>

      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>