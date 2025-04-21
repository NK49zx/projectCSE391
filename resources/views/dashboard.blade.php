@extends('layouts.main')

@section('content')
<div class="bg-[#1B1833] text-white font-bold flex min-h-screen flex-col">
    @include('layouts.navigation')
    @include('homePartial', ['questions' => $questions, 'popularQuestions' => $popularQuestions])
</div>
@endsection
