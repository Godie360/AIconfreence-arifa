<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICAFW 2024 Attendee Banner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        .banner-container {
            position: relative;
            width: 800px;
            /* Fixed width */
            height: 450px;
            /* Fixed height */
            background-image: url('{{ asset('assets/images/bg/m2_new_eddited.png') }}');
            background-size: cover;
            background-position: center;
            border: 5px solid #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            color: white;
            overflow: hidden;
            background-clip: border-box;
            /* Ensure background fills the rounded corners */
        }

        .conference-details {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 2;
        }

        .conference-details h1 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .conference-details p {
            font-size: 18px;
            margin: 5px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .iam-attending {
            position: absolute;
            top: 30px;
            right: 30px;
            background: rgba(255, 153, 0, 0.8);
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            z-index: 2;
        }

        .user-image {
            position: absolute;
            bottom: 85px;
            right: 30px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 5px solid #fff;
            object-fit: cover;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .about-conference {
            position: absolute;
            bottom: 120px;
            left: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px;
            border-radius: 8px;
            z-index: 2;
            text-align: left;
        }

        .about-conference h4 {
            margin: 0;
            font-size: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .about-conference p {
            margin: 5px 0;
            font-size: 16px;
        }

        /* Barcode Section */
        .barcode {
            position: absolute;
            bottom: 10px;
            /* Position it below the about section */
            left: 20px;
            z-index: 2;
        }

        /* Sponsors Background */
        .sponsors-background {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 80px;
            /* Adjust height as needed */
            background-color: red;
            clip-path: polygon(0 100%, 100% 100%, 100% 40%, 0 0);
            /* Slanted effect */
            z-index: 1;
            /* Ensure it's behind sponsors */
        }

        /* Sponsors Section */
        .sponsors-container {
            position: absolute;
            bottom: 20px;
            /* Adjusted to sit inside the red strip */
            right: 20px;
            display: flex;
            align-items: center;
            height: 50px;
            /* Fixed height for the sponsor row */
            z-index: 2;
            /* Ensure it's above the background */
        }

        .sponsor {
            margin: 0 5px;
        }

        .sponsor img {
            height: 40px;
            border-radius: 2px;
            /* Fixed height for sponsor logos */
            transition: transform 0.3s;
        }

        .sponsor img:hover {
            transform: scale(1.1);
            /* Slight zoom effect on hover */
        }

        .upload-section {
            margin: 20px 0;
        }

        .upload-section label {
            font-size: 18px;
            margin-right: 10px;
            font-weight: bold;
        }

        .upload-section input {
            padding: 8px;
            font-size: 16px;
        }

        .download-button {
            display: inline-block;
            background-color: #00b3b3;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .download-button:hover {
            background-color: #009999;
        }

        /* Prevent shrinking below a certain width */
        @media (max-width: 800px) {
            .banner-container {
                width: 800px;
                /* Maintain fixed width */
                height: 450px;
                /* Maintain fixed height */
            }
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="banner-container" id="banner">
        <div class="conference-details">
            <h1>ICAFW 2024</h1>
            <p>Bridging AI Horizons for Future of Work</p>
            <p>7<sup>th</sup> December 2024</p>
            <p>Four Points By Sheraton, Dar es Salaam, Tanzania</p>
            <p>8:30 AM - 6:00 PM</p>
        </div>
        <div class="iam-attending" role="alert">
            I Will Attend
        </div>
        <img id="userImage" class="user-image" src="{{ asset('assets/images/bg/default-avatar.png') }}"
            alt="Attendee Photo">

        <!-- Red Strip Background for Sponsors -->
        <div class="sponsors-background" style="clip-path: polygon(0 100%, 100% 100%, 100% 40%, 0 0);"></div>
        <div class="about-conference">
            <h4>About the Conference</h4>
            <p><strong>Email:</strong> <a href="mailto:conference@arifa.org"
                    style="color: #fff;">conference@arifa.org</a></p>
            <p><strong>Phone:</strong> +255 742 372 702</p>
            <p><strong>Website:</strong> https://aiconference.arifa.org</p>
        </div>

        <!-- Barcode Section -->
        <div class="barcode">
            <img src="{{ asset('assets/images/icafw_qr.png') }}" alt="Barcode"
                style="width: 100px; border-radius: 1px;">
        </div>


        <!-- Sponsors Section within Banner -->
        <div class="sponsors-container">
            @foreach ($sponsors as $sponsor)
                <div class="sponsor">
                    <a href="{{ $sponsor->link }}" target="_blank">
                        <img src="{{ asset($sponsor->logo_path) }}" alt="{{ $sponsor->company_name }} Logo">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Upload Section -->
    <div class="upload-section">
        <label for="upload">Upload your photo:</label>
        <input type="file" id="upload" accept="image/*" aria-label="Upload your photo">
    </div>

    <!-- Download Section -->
    <div class="download-button" id="downloadBtn" role="button" tabindex="0" aria-label="Download your banner">
        Download Banner
    </div>

    <script>
        // Handle image upload
        const uploadInput = document.getElementById('upload');
        const userImage = document.getElementById('userImage');

        uploadInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    userImage.src = e.target.result; // Set the uploaded image as the user image
                }
                reader.readAsDataURL(file); // Read the image file
            }
        });

        // Function to download the banner as an image
        function downloadBanner() {
            html2canvas(document.getElementById('banner'), {
                backgroundColor: null, // Capture transparent background
                useCORS: true // Allow cross-origin images to be loaded
            }).then(canvas => {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');
                link.download = 'ICAFW2024-Attending-Banner.png';
                link.click();
            });
        }

        // Trigger the download when the button is clicked
        document.getElementById('downloadBtn').addEventListener('click', downloadBanner);
    </script>

    <!-- Load html2canvas to convert the banner to an image for download -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</body>

</html>
