@extends('layouts.app')

@section('content')

<div class="container">
    @include('common.error_card_list')

		<div class="text-center mt-3">
				<h3>お客様登録情報</h3>
		</div>

		{!! Form::open(['route' => 'signup.post']) !!}
		<div class="row justify-content-center">
				<div class="col-sm-7">
						氏名
						<div class="row justify-content-center">
								<div class="form-group col-sm-12 form-inline">
										<label class="col-sm-1">{!! Form::label('last_name','氏') !!}</label>
										{!! Form::text('last_name', old('last_name'), ['class' => 'form-control col-sm-5']) !!}

										<label class="col-sm-1">{!! Form::label('first_name','名') !!}</label>
										{!! Form::text('first_name', old('first_name'), ['class' => 'form-control col-sm-5']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
						{!! Form::label('zipcode','郵便番号') !!}
						<div class="row">
								<div class="form-group col-sm-6 form-inline">
										{!! Form::text('zipcode', old('zipcode'), ['class' => 'form-control offset-sm-1 col-sm-12']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
						住所
						<div class="row justify-content-center">
								<div class="form-group col-sm-12 form-inline">
										{!! Form::label('prefecture','都道府県',['class' => 'col-sm-3']) !!}
										{!! Form::text('prefecture', old('prefecture'), ['class' => 'form-control col-sm-9']) !!}
								</div>
								<div class="form-group col-sm-12 form-inline">
								{!! Form::label('municipality','市区町村',['class' => 'col-sm-3']) !!}
										{!! Form::text('municipality', old('municipality'), ['class' => 'form-control col-sm-9']) !!}
								</div>

								<div class="form-group col-sm-12 form-inline">
										{!! Form::label('address','番地',['class' => 'col-sm-3']) !!}
										{!! Form::text('address', old('address'), ['class' => 'form-control col-sm-9']) !!}
								</div>

								<div class="form-group col-sm-12">
										{!! Form::label('apartments','マンション名・部屋番号',['class' => 'ml-4']) !!}
										{!! Form::text('apartments', old('apartments'), ['class' => 'form-control offset-sm-3 col-sm-9']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
						会社名
						<div class="row">
								<div class="form-group col-sm-12 form-inline">
										{!! Form::text('company_name', old('company_name'), ['class' => 'form-control offset-sm-1 col-sm-11']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
						メールアドレス
						<div class="row">
								<div class="form-group col-sm-12 form-inline">
										{!! Form::email('email', old('email'), ['class' => 'form-control offset-sm-1 col-sm-11']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
						電話番号
						<div class="row">
								<div class="form-group col-sm-12 form-inline">
										{!! Form::text('phone_number',old('phone_number'), ['class' => 'form-control offset-sm-1 col-sm-11']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
						{!! Form::label('password','パスワード') !!}
						<div class="row">
								<div class="form-group col-sm-12 form-inline">
										{!! Form::password('password',['class' => 'form-control offset-sm-1 col-sm-9']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="row justify-content-center">
				<div class="col-sm-7">
				{!! Form::label('password_confirmation','パスワード確認') !!}
						<div class="row">
								<div class="form-group col-sm-12 form-inline">
										{!! Form::password('password_confirmation',['class' => 'form-control offset-sm-1 col-sm-9']) !!}
								</div>
						</div>
				</div>
		</div>

		<div class="text-center">
				{!! Form::submit('登録',['class' => 'btn btn-primary mt-3']) !!}
				{!! Form::close() !!}
		</div>

		<div class="text-center">
				<a href="{{ route('auth.login') }}">ログインはこちらから</a>
		</div>
</div>


@endsection

