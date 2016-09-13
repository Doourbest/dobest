@extends('bladedemo_layout')

@section('title')
{{$title}}
@endsection

@section('content')
  <div>
    <h1>{{$title}}</h1>
    <div>
      use id: {{$User['id']}}, UserName:{{$User['name']}}
      <br/>
    </div>
  </div>
  <h3>表单验证结果：</h3>
  <ul>
    @foreach ($errors as $error)
        <li>{{$error}}</li>
    @endforeach
  </ul>
@endsection
