<div class="lg:grow">
    <main class="p-10 mb-6 flex flex-col lg:flex-row gap-8">
        <div class="flex flex-col gap-4 border border-white rounded-lg p-4 w-full lg:w-4/5">
            <div class="flex justify-between">
                <h1 class="text-3xl">Questions of the day</h1>
                @auth
                    <a href="{{ route('question.create') }}" class="btn btn-warning text-xl">Ask Question</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning text-xl">Ask Question</a>
                @endauth
            </div>
            
            @if($questions->count() > 0)
                @foreach($questions as $question)
                    <div class="card card-border bg-base-100 w-full">
                        <div class="card-body">
                            <h2 class="card-title text-black">{{ $question->title }}</h2>
                            <p class="text-black">{{ Str::limit($question->context, 150) }}</p>
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-gray-500">
                                    Posted by <span class="font-semibold">{{ $question->user->username }}</span>
                                </div>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card card-border bg-base-100 w-full">
                    <div class="card-body">
                        <h2 class="card-title text-black">No questions yet</h2>
                        <p class="text-black">Be the first to ask a question!</p>
                    </div>
                </div>
            @endif
        </div>

        @include('components.sidebar')
    </main>
</div>