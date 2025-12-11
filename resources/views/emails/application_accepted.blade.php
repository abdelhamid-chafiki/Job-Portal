<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Accepted</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #27ae60;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #27ae60;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .badge {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .content {
            margin: 30px 0;
            line-height: 1.6;
        }
        
        .content p {
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .job-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-left: 4px solid #27ae60;
            margin: 25px 0;
            border-radius: 4px;
        }
        
        .job-details h3 {
            color: #27ae60;
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        .job-details p {
            margin-bottom: 8px;
            font-size: 13px;
        }
        
        .recruiter-info {
            background-color: #f0f8f5;
            padding: 20px;
            border-radius: 4px;
            margin: 25px 0;
        }
        
        .recruiter-info h4 {
            color: #27ae60;
            margin-bottom: 12px;
            font-size: 14px;
        }
        
        .recruiter-contact {
            font-size: 13px;
            line-height: 1.8;
        }
        
        .recruiter-contact strong {
            color: #333;
        }
        
        .cta-button {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 25px 0;
            font-size: 14px;
        }
        
        .cta-button:hover {
            background-color: #229954;
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
        }
        
        .footer p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="badge">APPLICATION ACCEPTED</div>
            <h1>Congratulations!</h1>
        </div>
        
        <div class="content">
            <p>Dear <strong>{{ $applicantName }}</strong>,</p>
            
            <p>We are delighted to inform you that your application for the position of <strong>{{ $jobTitle }}</strong> has been <strong style="color: #27ae60;">accepted</strong>!</p>
            
            <p>This is an exciting opportunity, and we look forward to working with you. Please review the job details below and contact the recruiter to discuss next steps.</p>
            
            <div class="job-details">
                <h3>📋 Job Details</h3>
                <p><strong>Position:</strong> {{ $jobTitle }}</p>
            </div>
            
            <div class="recruiter-info">
                <h4>👤 Contact Recruiter</h4>
                <div class="recruiter-contact">
                    <p><strong>Name:</strong> {{ $recruiterName }}</p>
                    <p><strong>Email:</strong> <a href="mailto:{{ $recruiterEmail }}">{{ $recruiterEmail }}</a></p>
                    @if($recruiterPhone)
                        <p><strong>Phone:</strong> {{ $recruiterPhone }}</p>
                    @endif
                </div>
            </div>
            
            <p>If you have any questions about this opportunity or the next steps, please don't hesitate to reach out to the recruiter.</p>
            
            <p>Best regards,<br>
            <strong>JobConnect Recruitment Team</strong></p>
        </div>
        
        <div class="footer">
            <p>This is an automated email. Please do not reply directly to this email.</p>
            <p>&copy; {{ date('Y') }} JobConnect. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
