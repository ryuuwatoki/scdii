@extends('layouts.article')

@section('main')
<h1 class="font-thin text-4xl" >My Schedule > 変更</h1>

@if($errors->any())
<div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif

<form action="{{ route('articles.update',$article)}}" method="post" >
@csrf
@meth('patch')
    <div class="field my-2">
        <label for="">日付</label>
        <input type="text" value="{{ $article->title}}" name="title" class="border border-gray-300 p-2">
    </div>

    <div class="field my-2">
        <label for="">内容</label>
        <textarea name="content" cols="30" rows="10" class="border border-gray-300 p-2">{{ $article->content}}</textarea>
    </div>

    <div class="actions">
        <button type="submit" class=" px-3 py-1 rounded bg-gray-200 hover:bg-gray-300" >更新する</button>
    </div>



</form>

@endsection