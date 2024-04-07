<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Appreciation Certificate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: #f0f2f5; */
            font-family: 'Arial', sans-serif;
        }
        .certificate-card {
            max-width: 800px;
            margin: 2rem auto;
            background: #ffffff;
            border: none;
            border-radius: .5rem;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
        }
        .certificate-header {
            /* background-color: #3498db; */
            /* color: #fff; */
            padding: 1rem;
            border-radius: .5rem .5rem 0 0;
            text-align: center;
        }
        .certificate-body {
            padding: 2rem;
        }
        .certificate-footer {
            text-align: center;
            padding: 1rem;
            background-color: #f8f9fa;
            color: #777;
            border-radius: 0 0 .5rem .5rem;
            font-style: italic;
        }
        .certificate-footer p {
            margin: 0;
        }
        .highlight {
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="certificate-card">
    <div class="certificate-header">
        <h1>Volunteer Appreciation Certificate</h1>
        
    </div>
    <div class="certificate-body">
        <p>This is to certify that:</p>
        <p class="highlight">{{ $user->name }}</p>

        <p>has volunteered the following number of hours at Give A Hand:</p>
        <ul class="list-unstyled">
            @if($attendedOpportunities && count($attendedOpportunities) > 0)
                @foreach($attendedOpportunities as $attendedOpportunity)
                    <li class="mb-2">
                        <span class="highlight">{{ $attendedOpportunity->event_name }}</span> - 
                        Hours: {{ $attendedOpportunity->volunteer_hours }} - 
                        Date: {{ $attendedOpportunity->created_at->toDateString() }}
                    </li>
                @endforeach
            @else
                <li>No attended opportunities available.</li>
            @endif
        </ul>

        <p>We express our sincere gratitude for their valuable contribution and dedication.</p>
        <p>Thank you for making a difference!</p>
    </div>
    <div class="certificate-footer">
        This certification was generated based on your request from the Give A Hand website. Certificates are usually processed upon user request.
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

