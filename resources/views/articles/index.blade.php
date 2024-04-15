@extends('layouts.article')

@section('main')
<h1 style="font-size: 3em;" class="font-thin text-4xl" >My Schedule</h1>
<a id="fading-text" style="font-size: 2em; animation: fade 6s infinite;" href="{{route('articles.create')}}">Add New Schedule!</a>

<style>
    /* 定義淡入淡出動畫 */
    @keyframes fade {
        0% {
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
</style>

@foreach($articles as $article)
    <h2> </h2>
    <div style="border: 2px solid gray; padding: 10px;">
        <h2>日付： {{$article->title}}</h2>
        <h2>内容： {{$article->content}}</h2>
        <p>{{$article->created_at}} by {{$article->user->name}}</p>
        <div style="display: flex;">
            <a href="{{route('articles.edit', ['article' => $article->id])}}">変更する</a>
            <p style="color: white;">ooo</p>
            <form action="{{route('articles.destroy', $article)}}" method="post">
            @csrf
            @method('delete')
            <button style="background-color: red; color: white;">削除</button>
            </form>
        </div>





    </div>


@endforeach


@endsection