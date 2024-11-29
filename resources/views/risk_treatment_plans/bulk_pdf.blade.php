<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Risk Treatment Plans</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Risk Level</th>
                <th>Risk Owner</th>
                <th>Treatment Option</th>
                <th>Residual Risk</th>
                <th>Status</th>
                <th>Planned Safeguard</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riskTreatmentPlans as $plan)
            <tr>
                <td>{{ $plan->id }}</td>
                <td>{{ $plan->risk_level }}</td>
                <td>{{ $plan->risk_owner }}</td>
                <td>{{ $plan->treatment_option }}</td>
                <td>{{ $plan->residual_risk }}</td>
                <td>{{ $plan->status }}</td>
                <td>{{ $plan->planned_safeguard ?? 'N/A' }}</td>
                <td>{{ $plan->start_date ?? 'N/A' }}</td>
                <td>{{ $plan->end_date ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
</body>
</html>
