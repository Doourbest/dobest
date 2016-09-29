@extends('demo/layout')

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
@endsection
