{{--模板布局  继承--}}
@extends('layouts.app')
@section('title','laravel模板布局')
@section('sidebar')
    <p>这是追加句@{{ hello }}</p>
@endsection

@section('content')
    <p>这是主体内容{{$name}}</p>
    {{--isset语句--}}
    @isset($name)
    <p>这是一个已经被定义的变量</p>
    @endisset
    {{--switch语句--}}
    @switch($number)
    @case(1)
    <p>这是数字1</p>
    @break
    @case(2)
    <p>这是数字2</p>
    @break
    @case(3)
    <p>这是数字3</p>
    @break
    @endswitch

    {{--循环--}}
    @for ($i = 0; $i < 10; $i++)
        目前的值为 {{ $i }}<br/>
    @endfor

    {{-- @foreach ($users as $user)
        <p>此用户为 {{ $user->id }}</p>
    @endforeach

    @forelse ($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>没有用户</p>
    @endforelse
--}}
    @while (false)
        <p>死循环了。</p>
    @endwhile
@endsection
