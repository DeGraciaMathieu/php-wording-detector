<div>
    <table>
        <thead>
        <tr>
            <th>total words</th>
            <th>total distincts words</th>
            <th>average use</th>
        </tr>
        </thead>
        <tr>
            <td>{{ number_format(array_sum($words), 0, ".", "'") }}</td>
            <td>{{ count($words) }}</td>
            <td>{{ number_format(array_sum($words) / count($words)) }}</td>
        </tr>
    </table>
    <table>
        <thead>
        <tr>
            <th>words</th>
            <th>usage</th>
            <th>pourcentage</th>
        </tr>
        </thead>
        @foreach(array_slice($words, 0, 30) as $name => $usage)
        <tr>
            <td>{{ $name }}</td>
            <td>{{ $usage }}</td>
            <td>
                @php
                    $percentage = $usage * 100 / array_sum($words);
                @endphp
                @if($percentage < 1)
                    under 1%
                @else
                    {{ number_format($percentage) }}%
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
