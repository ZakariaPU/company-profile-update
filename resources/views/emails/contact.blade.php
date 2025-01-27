<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        body { 
            font-family: 'Poppins', sans-serif !important; 
            background-color: #FFE4E1; 
            margin: 0;
            padding: 0;
            color: #7F1D1D;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #FFF5F5;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(127,29,29,0.1);
            overflow: hidden;
            font-family: 'Poppins', sans-serif !important;
        }
        .email-header {
            background: linear-gradient(135deg, #7F1D1D 0%, #991B1B 100%);
            color: white;
            padding: 20px;
            text-align: center;
            font-family: 'Poppins', sans-serif !important;
        }
        .logo {
            max-height: 60px;
            margin-bottom: 10px;
        }
        .email-body {
            padding: 30px;
            font-family: 'Poppins', sans-serif !important;
        }
        .message-section {
            background-color: #FEE2E2;
            border-left: 4px solid #7F1D1D;
            padding: 15px;
            margin-top: 20px;
            font-family: 'Poppins', sans-serif !important;
        }
        .label {
            font-weight: 600;
            color: #7F1D1D;
            display: block;
            margin-bottom: 5px;
            font-family: 'Poppins', sans-serif !important;
        }
        .detail {
            color: #992525;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="" alt="Company Logo" class="logo">
            <h1>New Contact Message</h1>
        </div>
        <div class="email-body">
            <div class="detail">
                <span class="label">Name</span>
                {{ $data['name'] }}
            </div>
            <div class="detail">
                <span class="label">Email</span>
                {{ $data['email'] }}
            </div>
            <div class="detail">
                <span class="label">Subject</span>
                {{ $data['subject'] }}
            </div>
            <div class="message-section">
                <span class="label">Message</span>
                {{ $data['message'] }}
            </div>
        </div>
    </div>
</body>
</html>