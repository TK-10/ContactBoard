@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    連絡事項追加
                </div>

                <div class="panel-body">
                    <!-- Validation -->
                    @include('common.errors')

                    <!-- 新規連絡事項登録 -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- 連絡事項と宛先項目 -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label"></label>

                            <div class="col-sm-6">
                            <STRONG>連絡事項 : </STRONG><input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                                <br>
                                <STRONG>TO : </STRONG><input type="text" name="to" id="task-to" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <!-- 追加ボタン -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>追加
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 連絡事項一覧 -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        上から最新順
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>一覧</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
    
                                        <td class="table-text"><div><STRONG>TO :    </STRONG>{{ $task->to }}</div></td>

                                        <!-- Task Delete(Done) Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>完了
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection