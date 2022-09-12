<div class="file-upload">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add File</button>
  <div class="image-upload-wrap">
    <?=$this->Form->create('Post',["enctype"=>"multipart/form-data"],['action'=>'import'])?>
    <?= $this->Form->control('',['type'=>'file', 'class'=>'file-upload-input','name'=>'file','onchange'=>'readURL(this)'])?>
  </div>
  <div class="file-upload-content">
      <?= $this->Form->input(__('Sumbit '),['type'=>'submit','value'=>'Submit','class'=>'remove-image']) ?>
      <?=$this->Form->end()?>
  </div>
</div>