@extends('layouts.blog')
@section('title','数据库操作')
@section('content')

    <table class="table table-bordered" style="width:60%;margin-left:20%;">
        <center><h3>laravel数据库操作</h3></center>
        <div style="width:60%;margin-left:20%;margin-bottom:5px;"> <button type="button" class="btn btn-success btn-sm btn-modal">返回列表</button></div>
        <form role="form" class="form" >
            <div class="form-group" style="width:60%;margin-left:20%;">
                <label for="name">名字</label>
                <input type="text" class="form-control" value="{{$detail->code}}" name="code">
                <input type="hidden" class="form-control" value="{{$detail->code}}" name="old_code">
            </div>
            <div class="form-group" style="width:60%;margin-left:20%;">
                <label for="name">城市</label>
                <input type="text" class="form-control" value="{{$detail->name}}" name="name">
            </div>
            <div class="form-group" style="width:60%;margin-left:20%;">
                <label for="name">人口</label>
                <input type="text" class="form-control" value="{{$detail->population}}" name="population">
            </div>
            <div class="form-group" style="width:60%;margin-left:20%;text-align: right">
                <button class="btn btn-info btn-update">更改</button>
            </div>

        </form>

    </table>

    <script>
        $('.btn-modal').click(function(){
           location.href="{{route('curd')}}";
        })
       //修改操作
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn-update').click(function(){
                var data=$('.form').serializeArray();
               // alert(data);
                $.ajax({
                    url:"{{route('act_update')}}",
                    type:'post',
                    data:data,
                    success:function(msg){
                        if(msg=='{{Config::get('constants.WELL')}}'){
                            alert('修改成功');
                            location.href="{{route('curd')}}";
                        }
                        if(msg=='{{Config::get('constants.NONE')}}'){
                            alert('修改失败');
                        }
                    }
                })
            })
        })
    </script>


@stop

