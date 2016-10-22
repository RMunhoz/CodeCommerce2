
<div class="form-group">
    {!! Form::label('id', 'Código Order:') !!}
    {!! Form::text('id', null,['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $order->user->name,['class'=>'form-control', 'readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['', 'Pedido Efetuado', 'Pagamento Confirmado', 'Pedido Postado', 'Finalizado'], $order->status,['class'=>'form-control']) !!}
</div>