<div class="btn-group" role="group">
    {!! Form::model($model,['url' => $form_url,'method' => 'delete','class'=>'form-inline js-confirm','data-confirm' => $confirm_message])!!}
    <button type="submit" onclick="return confirm('Hapus Data?')" class="btn btn-danger" style="height: 25px;width:100px;margin-top:-5px"><span style="margin-top:-13px;margin-left:-41px;position: absolute;">Hapus Data</span></button>
    {!!Form::close()!!}
</div>