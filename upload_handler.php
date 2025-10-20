<?php
// ছবি সেভ করার জন্য টার্গেট ফোল্ডার।
// নিশ্চিত করুন যে আপনার সার্ভারে 'uploads' নামের এই ফোল্ডারটি তৈরি করা আছে এবং সেটির রাইট পারমিশন (777) দেওয়া আছে।
$target_dir = "uploads/"; 
$uploadOk = 1; // আপলোড সফল কিনা তার স্ট্যাটাস

// ছবি আপলোড হয়েছে কিনা চেক করা হচ্ছে
if(isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ফাইল কি ছবি কিনা তা চেক করা হচ্ছে
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        // ফাইলটি ছবি
        $uploadOk = 1;
    } else {
        echo "ফাইলটি ছবি নয়।";
        $uploadOk = 0;
    }

    // ফাইলের অস্তিত্ব আছে কিনা তা চেক করা হচ্ছে
    if (file_exists($target_file)) {
        echo "দুঃখিত, এই নামের ছবিটি আগেই আপলোড করা হয়েছে।";
        $uploadOk = 0;
    }

    // ফাইলের সাইজ চেক করা হচ্ছে (এখানে 5MB এর কম হতে হবে)
    if ($_FILES["photo"]["size"] > 5000000) { 
        echo "দুঃখিত, আপনার ফাইলটি খুব বড়। (5MB এর বেশি)।";
        $uploadOk = 0;
    }

    // নির্দিষ্ট ফরম্যাট চেক করা হচ্ছে
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "দুঃখিত, শুধুমাত্র JPG, JPEG, PNG ও GIF ফাইল আপলোড করা যাবে।";
        $uploadOk = 0;
    }

    // যদি কোনো এরর না থাকে, তবে আপলোড শুরু হবে
    if ($uploadOk == 0) {
        echo "দুঃখিত, আপনার ছবিটি আপলোড হয়নি।";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // আপলোড সফল হলে
            header("Location: index.php?upload=success"); // আপলোড সফল হলে index.php তে রিডাইরেক্ট করা হবে
            exit();
        } else {
            echo "দুঃখিত, ফাইল আপলোড করার সময় একটি এরর হয়েছে।";
        }
    }
} else {
    // যদি কেউ সরাসরি এই পেজে আসে
    header("Location: index.php");
    exit();
}
?>
