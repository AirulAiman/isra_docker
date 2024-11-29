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
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Risk Treatment Plan</h1>
    <h2>ID: {{ $riskTreatmentPlan->id }}</h2>

    <table>
        <tr>
            <th>Risk Level</th>
            <td>{{ $riskTreatmentPlan->risk_level }}</td>
        </tr>
        <tr>
            <th>Risk Owner</th>
            <td>{{ $riskTreatmentPlan->risk_owner }}</td>
        </tr>
        <tr>
            <th>Treatment Option</th>
            <td>{{ $riskTreatmentPlan->treatment_option }}</td>
        </tr>
        <tr>
            <th>Residual Risk</th>
            <td>{{ $riskTreatmentPlan->residual_risk }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $riskTreatmentPlan->status }}</td>
        </tr>
        <tr>
            <th>Planned Safeguard</th>
            <td>{{ $riskTreatmentPlan->planned_safeguard ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $riskTreatmentPlan->start_date ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>End Date</th>
            <td>{{ $riskTreatmentPlan->end_date ?? 'N/A' }}</td>
        </tr>
    </table>

    <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
</body>
</html>
