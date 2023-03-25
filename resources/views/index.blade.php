<table>
    <thead>
        <tr>
            <th>Country</th>
            <th>Total Cases</th>
            <th>New Cases</th>
            <th>Total Deaths</th>
            <th>New Deaths</th>
            <th>Total Recovered</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row['Country'] }}</td>
                <td>{{ $row['Total Cases'] }}</td>
                <td>{{ $row['New Cases'] }}</td>
                <td>{{ $row['Total Deaths'] }}</td>
                <td>{{ $row['New Deaths'] }}</td>
                <td>{{ $row['Total Recovered'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
