<div class="row">
    <div class="col-xs-6">
        <div class="form-group {{ $errors->has('task_name') ? 'has-error':'' }}">
            <label class="required" for="task_name">Task Name</label>
            <input type="text" name="task_name" class="form-control" value="{{old('task_name') ?? $task->task_name}}" placeholder="">
            @error('task_name')
             <span class="help-block">{{ $errors->first('task_name') }}</span>
            @enderror
          </div>
    </div>

    <div class="col-xs-6">
        <div class="form-group {{ $errors->has('details') ? 'has-error':'' }}">
            <label class="required" for="name">Task details</label>
            <input type="text" name="details" class="form-control" value="{{old('details') ?? $task->details}}" placeholder="">
            @error('details')
             <span class="help-block">{{ $errors->first('details') }}</span>
            @enderror
          </div>
    </div>

</div>
