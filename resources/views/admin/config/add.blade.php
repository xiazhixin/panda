<!-- 后台首页 -->
<!-- 样式路径"{{asset('admin/style/xxxxxxxxxxxxx')}}" -->
@section('title', '首页')
@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             添加配置
            </header>
            <div class="panel-body">
                <form method="post" class="form-horizontal tasi-form" action="{{url('admin/config')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="conf_title">
                            <span style="padding:5px;color:red;font-size: 14px">配置项标题必须填写</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="conf_name">
                            <span style="padding:5px;color:red;font-size: 14px">配置项名称必须填写</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="control-label col-lg-2">类型</label>
                        <div class="col-lg-10" >
                            <label class="checkbox-inline">
                                <input type="radio" name="field_type" value="input" id="inlineCheckbox1" checked="checked" onclick="showTr()"> input
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="field_type" value="textarea" id="inlineCheckbox2" onclick="showTr()"> textarea
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="field_type" value="radio" id="inlineCheckbox3" onclick="showTr()"> radio
                            </label>

                        </div>
                    </div>

                    <div class="form-group field_value">
                        <label class="col-sm-2 control-label">类型值</label>
                        <div class="col-sm-10">
                            <input type="text"  id="focusedInput" class="form-control" name="field_value">
                            <span style="padding:5px;color:red;font-size: 14px">类型值只有在radio的情况下才需要配置,格式是 1|开启,0|关闭</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序</label>
                        <div class="col-sm-1">
                            <input type="text"  class="form-control" conf_order>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="control-label col-sm-2">说明</label>
                        <div class="col-sm-10">

                            <textarea class="col-sm-10 form-control" style="height:100px;resize:none" name="conf_tips"></textarea>

                        </div>
                    </div>

                        <div class="form-group">
                            <label for="inputSuccess" class=" col-sm-2"></label>
                            <button class="btn btn-primary col-sm-1"  type="submit">提交</button>
                            <button class="btn btn-default col-sm-1" type="submit" style="margin-left:20px">返回</button>


                        </div>


                </form>
            </div>
        </section>



    </div>
    <script>
        showTr();
        function showTr(){
            var v = $('input[name=field_type]:checked').val();
            if(v == 'radio'){
                $('.field_value').show();
            } else {
                $('.field_value').hide();
            }
        }


    </script>

@endsection










