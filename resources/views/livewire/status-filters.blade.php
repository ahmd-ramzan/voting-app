<nav class="flex items-center justify-between text-gray-400 text-xs">
    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="border-b-4 pb-3 @if($status === 'All') border-blue text-gray-900  @endif">All Ideas ({{ $statusCount['all_statuses'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#" class="@if($status === 'Considering') border-blue text-gray-900  @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering
                ({{ $statusCount['considering'] }})</a></li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#" class="@if($status === 'In Progress') border-blue text-gray-900  @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">in
                progress ({{ $statusCount['in_progress'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Implemented')" href="#" class="@if($status === 'Implemented') border-blue text-gray-900  @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">implemented
                (10)</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#" class="@if($status === 'Closed') border-blue text-gray-900  @endif transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">closed
                ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>
