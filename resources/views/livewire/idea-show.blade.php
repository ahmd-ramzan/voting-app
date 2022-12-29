<div class="idea-and-buttons container">
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    {{ $idea->title }}
                </h4>
                <div class="text-gray-600 mt-3">
                    @admin
                    @if ($idea->spam_reports > 0)
                        <div class="text-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
                    @endif
                    @endadmin
                    {{ $idea->description }}
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">{{ $idea->comments()->count() }} Comments</div>
                    </div>
                    <div
                        x-data="{ isOpen: false }"
                        class="flex items-center space-x-2">
                        <div
                            class="{{ $idea->getStatusClasses() }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">{{ $idea->status->name }}</div>
                        @auth
                            <button
                                @click="isOpen = !isOpen"
                                class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul
                                    x-cloak
                                    x-show="isOpen"
                                    x-transition.duration.500ms
                                    @click.away="isOpen = false"
                                    @keydown.esc.window="isOpen = false"
                                    class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                    @can('update', $idea)
                                        <li>
                                            <a
                                                @click="$dispatch('custom-show-edit-modal')"
                                                href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit
                                                Idea</a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a
                                            href="#"
                                            @click.prevent="
                                                isOpen = false
                                                $dispatch('custom-show-mark-idea-as-spam-modal')
                                            "
                                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                        >
                                            Mark as Spam
                                        </a>
                                    </li>
                                        @admin
                                        @if ($idea->spam_reports > 0)
                                            <li>
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                    isOpen = false
                                                    $dispatch('custom-show-mark-idea-as-not-spam-modal')
                                                "
                                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                                >
                                                    Not Spam
                                                </a>
                                            </li>
                                        @endif
                                        @endadmin
                                    @can('delete', $idea)
                                        <li>
                                            <a
                                                @click="$dispatch('custom-show-delete-modal')"
                                                href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete
                                                Idea
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
            <livewire:add-comment :idea="$idea" />
            @auth
                @if(auth()->user()->isAdmin())
                    <livewire:set-status :idea="$idea"/>
                @endif
            @endauth
        </div>

        <div class="flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            @if ($hasVoted)
                <button wire:click.prevent="vote"
                        class="w-20 bg-blue text-white border border-blue font-bold text-xxs uppercase rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-4 py-3 -mx-5"
                >
                    Voted
                </button>
            @else
                <button wire:click.prevent="vote"
                        class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5"
                >
                    Vote
                </button>
            @endif
        </div>
    </div> <!-- end buttons-container -->
</div> <!-- end ideas and button container -->
