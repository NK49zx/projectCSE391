@extends('layouts.main')

@section('content')
<div class="bg-[#1B1833] text-white font-bold flex min-h-screen flex-col">
    @include('layouts.navigation')

    <main class="p-10 mb-6 flex flex-col lg:flex-row gap-8">
        <div class="flex flex-col gap-4 border border-white rounded-lg p-4 w-full lg:w-4/5">
            <h1 class="text-3xl mb-6">Ask a Question</h1>
            
            <form method="POST" action="{{ route('question.store') }}" class="space-y-6">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-white">Title</span>
                    </label>
                    <input type="text" name="title" placeholder="Question title" class="input input-bordered w-full text-black" required />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-white">Context</span>
                    </label> <br>
                    <textarea name="context" class="textarea textarea-bordered h-32 text-black w-full" placeholder="Describe your question in detail" required></textarea>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-white">Code</span>
                    </label> <br>
                    <textarea name="alt_content" class="textarea textarea-bordered h-32 text-black w-full" placeholder="Provide your code/psuedocode here"></textarea>
                </div>
                
                <!-- <div class="form-control">
                    <label class="label">
                        <span class="label-text text-white">Tags</span>
                    </label> 
                    <input type="text" name="tags" placeholder="Add tags (comma separated)" class="input input-bordered w-full text-black" />
                </div> -->
                
                <div class="flex justify-end gap-4">
                    <a href="{{ route('dashboard') }}" class="btn">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit Question</button>
                </div>
            </form>
        </div>

        <div class="flex flex-col gap-4 w-full lg:w-1/5">
            <div class="text-black w-full bg-base-100 rounded-lg shadow-lg p-4 h-fit">
                <h3 class="text-lg font-bold mb-4">Tips for a Good Question</h3>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Be specific and clear in your title</li>
                    <li>Provide context and background information</li>
                    <li>Include code examples if relevant</li>
                    <li>Explain what you've already tried</li>
                </ul>
            </div>

            <div class="text-black w-80 bg-base-100 rounded-lg shadow-lg p-4 h-fit sticky top-4">
                <h3 class="text-lg font-bold mb-4">Popular Threads</h3>
                <ul class="list bg-base-100 rounded-box w-full">
                    @if($popularQuestions->count() > 0)
                        @foreach($popularQuestions as $question)
                            <li class="list-row hover:bg-base-200 p-2 rounded-lg transition-colors">
                                <div>
                                    <img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/>
                                </div>
                                <div>
                                    <div>{{ $question->user->name }}</div>
                                    <div class="text-xs uppercase font-semibold opacity-60">{{ Str::limit($question->title, 30) }}</div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="p-2">
                            <div class="text-sm text-gray-500">No popular questions yet</div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </main>
</div>
@endsection


