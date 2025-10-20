<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ফটোগ্রাফি গ্যালারি</title>
    <style>
        /*
         * CSS দিয়ে ডিজাইন করা হচ্ছে (আগের মতোই সুন্দর)
         */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        /* আপলোড ফর্ম ডিজাইন */
        .upload-section {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            text-align: center;
        }

        .upload-section input[type="file"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 15px;
        }

        .upload-section button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .upload-section button:hover {
            background-color: #218838;
        }

        /* ছবি গ্যালারি ডিজাইন */
        .gallery-heading {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            min-height: 200px; /* খালি থাকলে দেখতে ভালো লাগবে */
        }

        /* ছবি না থাকলে দেখানোর জন্য মেসেজ */
        .empty-gallery-message {
            grid-column: 1 / -1; /* সম্পূর্ণ জায়গা নেবে */
            text-align: center;
            padding: 50px;
            background-color: #e9ecef;
            border-radius: 8px;
            color: #6c757d;
        }

        /* এই ক্লাসের অধীনেই আপনার আপলোড করা ছবিগুলি বসবে */
        .photo-item {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .photo-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }
    </style>
</head>
<body>

    <header>
        <h1>আমার অনলাইন ফটো অ্যালবাম</h1>
        <p>আপনার ছবি আপলোড করুন এবং গ্যালারিতে দেখুন</p>
    </header>

    <div class="container">
        
        <section class="upload-section">
            <h2>ছবি আপলোড করুন</h2>
            <form action="upload_handler.php" method="POST" enctype="multipart/form-data">
                <input type="file" id="photoFile" name="photo" accept="image/*" required>
                <button type="submit">আপলোড শুরু করুন</button>
            </form>
            <p style="color: #dc3545; font-size: 0.9em; margin-top: 15px;">
                **ছবি সেভ ও গ্যালারিতে দেখানোর জন্য হোস্টিং এবং ব্যাকএন্ড কোড (PHP/Node.js) প্রয়োজন।**
            </p>
        </section>

        <section>
            <h2 class="gallery-heading">আপলোড করা ছবি সমূহ</h2>
            <div class="photo-gallery">

                <div class="empty-gallery-message">
                    ছবি আপলোড করার জন্য অপেক্ষা করছে... <br>
                    আপনার আপলোড করা ছবিগুলি এখানে দেখা যাবে।
                </div>

            </div>
        </section>

    </div>

</body>
</html>
