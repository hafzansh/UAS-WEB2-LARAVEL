<div class="btn-group" role="group">
    {!! Form::model($model,['url' => $form_url,'method' => 'put','class'=>'form-inline js-confirm','data-confirm' => $confirm_message])!!}
    <button type="submit" onclick="return confirm('Apakah buku sudah benar kembali?')" class="btn btn-info" style="height: 25px;width:120px;margin-top:-5px"><span style="margin-top:-13px;margin-left:-50px;position: absolute;">Pengembalian</span></button>
    {!!Form::close()!!}
</div>