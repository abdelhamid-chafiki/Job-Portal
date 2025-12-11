<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Update</title>
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
            border-bottom: 3px solid #e74c3c;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #e74c3c;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .badge {
            display: inline-block;
            background-color: #e74c3c;
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
            border-left: 4px solid #e74c3c;
            margin: 25px 0;
            border-radius: 4px;
        }
        
        .job-details h3 {
            color: #e74c3c;
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        .job-details p {
            margin-bottom: 8px;
            font-size: 13px;
        }
        
        .rejection-reason {
            background-color: #fff5f5;
            padding: 20px;
            border-left: 4px solid #e74c3c;
            margin: 25px 0;
            border-radius: 4px;
        }
        
        .rejection-reason h4 {
            color: #e74c3c;
            margin-bottom: 12px;
            font-size: 14px;
        }
        
        .rejection-reason p {
            font-size: 13px;
            line-height: 1.8;
            color: #555;
        }
        
        .recruiter-info {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 4px;
            margin: 25px 0;
        }
        
        .recruiter-info h4 {
            color: #333;
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
        
        .encouragement {
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 4px;
            margin: 25px 0;
            border-left: 4px solid #3498db;
            font-size: 13px;
            line-height: 1.7;
            color: #333;
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
            <div class="badge">APPLICATION UPDATE</div>
            <h1>Thank You for Your Interest</h1>
        </div>
        
        <div class="content">
            <p>Dear <strong>{{ $applicantName }}</strong>,</p>
            
            <p>Thank you for your interest in the position of <strong>{{ $jobTitle }}</strong>. We appreciate the time and effort you put into your application.</p>
            
            <p>After careful consideration, we have decided to move forward with other candidates at this time. This decision was not made lightly, and we appreciate your understanding.</p>
            
            <div class="job-details">
                <h3>📋 Position Details</h3>
                <p><strong>Position:</strong> {{ $jobTitle }}</p>
            </div>
            
            <div class="rejection-reason">
                <h4>💭 Feedback</h4>
                <p>{{ $rejectionReason }}</p>
            </div>
            
            <div class="recruiter-info">
                <h4>👤 For More Information</h4>
                <div class="recruiter-contact">
                    <p><strong>Recruiter:</strong> {{ $recruiterName }}</p>
                    <p><strong>Email:</strong> <a href="mailto:{{ $recruiterEmail }}">{{ $recruiterEmail }}</a></p>
                </div>
            </div>
            
            <div class="encouragement">
                <p><strong>Don't be discouraged!</strong> Every application is a valuable learning experience. We encourage you to continue exploring other opportunities and developing your skills. You may be a great fit for future positions at our organization.</p>
            </div>
            
            <p>Best of luck with your career journey!<br>
            <strong>JobConnect Recruitment Team</strong></p>
        </div>
        
        <div class="footer">
            <p>This is an automated email. Please do not reply directly to this email.</p>
            <p>&copy; {{ date('Y') }} JobConnect. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
