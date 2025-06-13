<div class="overflow-x-auto relative shadow-lg sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach($headers as $header)
                <th scope="col" class="py-3 px-6">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($data as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach($headers as $header)
                    @if($header !== 'Aksi')
                        <td class="py-4 px-6 text-gray-900 dark:text-white">
                            @if($header === 'Status')
                                {!! $row[strtolower(str_replace(' ', '_', $header))] !!}
                            @else
                                {{ $row[strtolower(str_replace(' ', '_', $header))] ?? '' }}
                            @endif
                        </td>
                    @endif
                @endforeach
                <td class="py-4 px-6 flex gap-2">
                    {!! $actions($row) !!}
                </td>
            </tr>
            @empty
            <tr class="bg-white dark:bg-gray-800">
                <td colspan="{{ count($headers) }}" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">No data found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
