<x-app-layout>
    <div>
        <a href="{{ url()->previous() }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votes-count="$votesCount" />
    <livewire:idea-comments :idea="$idea" />
    <x-notification-success />
    <x-modals-container :idea="$idea" />

     <!-- end comments-container -->
</x-app-layout>
