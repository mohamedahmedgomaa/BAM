@extends('admin.index')
@section('content')
@push('js')
<script type="text/javascript">
$(document).ready(function() {

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep(old('parent')) !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : false
    },
    "plugins" : [ "wholerow" ]
  });

});   

$('#jstree').on('changed.jstree', function(e, data){
  var i , j , r = [];
  for (i = 0,j=data.selected.length; i < j; i++) {
    r.push(data.instance.get_node(data.selected[i]).id);
  }
  $('.parent_id').val(r.join(', '));
});

</script>
@endpush

<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    		{!! Form::open(['url'=>aurl('departments'), 'files'=>true]) !!}
          <div class="form-group">
            {!! Form::label('name', trans('admin.name')) !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}       
          </div>
          <div class="clearfix"></div>
            <div id="jstree"></div>
            <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
          <div class="clearfix"></div>  
          
          
          {!! Form::submit(trans('admin.add'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>





@endsection