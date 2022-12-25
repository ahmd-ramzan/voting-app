<div
    x-data
    @click="const target = $event.target.tagName.toLowerCase();
                const ignores = ['button', 'svg', 'path', 'a']
                if (! ignores.includes(target)) $event.target.closest('.idea-container').querySelector('.idea-link').click()
                "
    class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
    <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
            @if ($hasVoted)
                <button wire:click.prevent="vote" class="w-20 bg-blue text-white border border-blue hover:bg-blue-hover font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Voted</button>
            @else
                <button wire:click.prevent="vote" class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Vote</button>
            @endif
        </div>
    </div>
    <div class="flex px-2 py-6">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="mx-4">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                @admin
                @if ($idea->spam_reports > 0)
                    <div class="text-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
                @endif
                @endadmin
                {{ $idea->description }}
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4 {{ $idea->getStatusClasses() }}">{{ $idea->status->name }}</div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end idea-container -->
