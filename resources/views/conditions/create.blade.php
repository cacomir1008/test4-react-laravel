@extends('app')

@section('title', 'Condition登録')

@include('nav')

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">Condition登録</h2>
            @include('error_card_list') 

            <div class="card-text">
              <form method="POST" action="{{ route('conditions.store') }}">
                @csrf
                <div class="md-form">
                  <select class="custom-select mb-3" id="conditiondata_id" name="conditiondata_id">
                  <option selected>病名を選ぶ</option>
                    @foreach($conditiondatas as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div id="start" class="md-form md-outline input-with-post-icon">
                    <input type="date" id="start" name="start" class="form-control">
                    <label for="start" class="mt-1">いつから感じたか</label>
                </div>
                <div id="diagnosis" class="md-form md-outline input-with-post-icon">
                    <input type="date" id="diagnosis" name="diagnosis" class="form-control">
                    <label for="diagnosis" class="mt-1">いつ診断されたか</label>
                </div>
                <div class="md-form">
                  <select class="custom-select mb-1" id="hospital" name="hospital">
                  <option selected>今病院に通っているか</option>
                    <option value="通っている">通っている</option>
                    <option value="通っていない">通っていない</option>
                    <option value="通っていないが病気だと感じている">通っていないが病気だと感じている</option>
                    <option value="その他">その他</option>
                  </select>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="others"  name="others" placeholder="その他を選んだ場合はこちらに記入">
                </div>
                <div class="form-group">
                  <div class="checkbox-inline" style="width:40%;">
                    <label class="checkbox" for="icon">
                      <input type="checkbox" data-toggle="checkbox" value="治療完了" id="icon" name="icon"> 治療完了（not 必須事項）
                    </label>
                  </div>
                </div>
                <div class="mb-3">
                  <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="具体的な症状等"></textarea>
                </div>
                <input type="hidden" id="user_id" name="user_id" required value="{{ Auth::user()->id }}">
                <button class="btn btn-block mean-fruit-gradient mt-2 mb-2" type="submit">Condition登録</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection