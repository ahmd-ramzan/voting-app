<div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full border-none rounded-xl px-4 py-2">
                <option value="Category1">Category1</option>
                <option value="Category1">Category1</option>
                <option value="Category1">Category1</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full border-none rounded-xl px-4 py-2">
                <option value="Category1">Category1</option>
                <option value="Category1">Category1</option>
                <option value="Category1">Category1</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none">
            <div class="absolute top-0 flex-items-center h-full ml-2 mt-3">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div> {{-- end filters --}}

    <div class="ideas-container space-y-6 my-6">
        @foreach($ideas as $idea)
            <livewire:idea-index :key="$idea->id" :idea="$idea" :votes-count="$idea->votes_count" />
        @endforeach
    </div> <!-- end ideas-container -->

    <div class="my-8">
        {{--{{ $ideas->links() }}--}}
        {{ $ideas->appends(request()->query())->links() }}
    </div>

</div>
