<?php

use App\Models\Task;
use Illuminate\Http\Request;

/*
 * ダッシュボード表示
 */
Route::get('/', function () {
    /*ソート済み(作成日順)のタスクをデータベースから取得 最新タスクが上にくる*/
    $tasks = Task::orderBy('created_at', 'desc')->get();

    return view('tasks', [
        'tasks' => $tasks,
    ]);
});

/*
 * 連絡事項追加
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    /*もしエラーだったら*/
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // タスク作成処理…連絡事項と宛先
    $task = new Task();
    $task->name = $request->name;
    $task->to = $request->to;
    $task->save();

    return redirect('/');
});

/*
 * 削除
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});
