@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>
            @include('error_card_list') 

            <div class="card-text">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="md-form">
                  <label for="name">ユーザー名</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">パスワード(確認)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <select class="custom-select mb-3" id="gender" name="gender">
                    <option value="女性" selected="selected">女性</option>
                    <option value="男性">男性</option>
                    <option value="トランスジェンダー(女性)">トランスジェンダー(女性)</option>
                    <option value="トランスジェンダー(男性)">トランスジェンダー(男性)</option>
                    <option value="Xジェンダー">Xジェンダー</option>
                    <option value="その他">その他</option>
                </select>
                <div id="birthday" class="md-form md-outline input-with-post-icon">
                    <input type="date" id="birthday" name="birthday" class="form-control">
                    <label for="example">生年月日</label>
                </div>
                <div class="custom-file mb-3">
                  <input type="file" class="custom-file-input" id="icon" name="icon">
                  <label class="custom-file-label" for="icon">プロフィール画像</label>
                </div>
                <button class="btn btn-block mean-fruit-gradient mt-2 mb-2" type="submit">ユーザー登録</button>
              </form>
              <div class="mt-0">
                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
