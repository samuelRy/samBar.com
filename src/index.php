<?php $sent = false; ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sage Sam</title>
</head>

<body>
    <nav>
        <a href="#">
            <img src="sage.png" alt="Sage Black Man">
        </a>
    </nav>

    <form method="post" action="home.php" id="email-form">
        <div>
            <div id="add-mail"><span class="speech">Come closer now... let go of that heavy cloak of worry. 
                Your questions have weight, yes, but they also have answers, and we shall find them together in due time.</span></div>
            </div>
            <input type="email" name="email" id="email" placeholder="Email">
            <span style="color:red;font-size: .9em;font-weight: 300;display: none;" id="error">
                The mail you typed is not valid, my Dear...
            </span>
            <button type="submit" id="submit" style="display: none;">Submit</button>
    </form>
    <script>
        const email = document.getElementById("email");
        const submit = document.getElementById("submit");
        const errorMsg = document.getElementById("error");

        email.addEventListener("input", function (event) {
            const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$/;
            if (!pattern.test(event.target.value)) {
                event.preventDefault();
                errorMsg.style.display = "block";
                submit.style.display = "none";
            }
            else
                {
                errorMsg.style.display = "none";
                submit.style.display = "block";
            }
        })
    </script>
    <!-- <script src="test.js"></script> -->
</body>

</html>