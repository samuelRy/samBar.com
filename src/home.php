<?php
session_start();
if (!isset($_POST["email"]) && !isset($_SESSION["email"])) {
    header("Location: index.php");
}
if (isset($_POST["email"])) {
    $_SESSION["email"] = $_POST["email"];
}
$sent = isset($_SESSION["sent"]) ? $_SESSION["sent"] : false;

?>
<!DOCTYPE html>
<html lang="en">

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
    <?php
    if (!isset($sent) || $sent == false) {
        echo "
<form action='db.php' method='post'id='main'>
    
    <textarea type='text' id='problem' name='message' placeholder='Tell me what bothers you my Dear and fear not, for I shall help you find a way to your light'></textarea>

    <button type='submit' id='ask' disabled>Ask for advice</button>
</form>
    ";
    } else {
        echo "<div id='main-sent'>
        <div>
            <div id='sent'>Your advice has been sent to the sage</div>
            <div id='info'>Click the light to ask more</div>
        </div>
        <div id='add-num'>
            <label for='number'>Add your number here to get your advice on WhatsApp
            </label>
            <input type='tel' id='number'>
        </div>
        <button type='button' id='send-num'>Send number</button>
    </div>";
    }
    $_SESSION["sent"] = false ?>
    <?php include("flame.php") ?>
    <script>
        let ask = document.querySelector("#ask");
        let problem = document.querySelector("#problem");

        window.onload = function () {
            console.log("enlight");
            let a = document.querySelector("#ellipse3");
            if (!("enlight" in a.classList)) {
                a.classList.add("enlight");
            };
            let b = document.querySelector("#ellipse2");
            if (!("enlight" in b.classList)) {
                b.classList.add("enlight");
            };
            let c = document.querySelector("#ellipse1");
            if (!("enlight" in c.classList)) {
                c.classList.add("enlight");
            };
        };

        if (problem != null) {
            problem.addEventListener("input", () => {
                if (problem.value.length > 2) {
                    ask.disabled = false;
                }
                else {
                    ask.disabled = true;
                    console.log(problem.value);
                }
                problem.style.height = 'auto';
                problem.style.height = problem.scrollHeight - 40 + "px";
            })
        }
        if (document.querySelector("#send-num")) {
            
            document.querySelector("#send-num").onclick = function () {
    
                window.location.href = "sent.php?number=" + document.querySelector("#number").value;
            };
        }
        if (document.querySelector("#main-sent")) {
            document.querySelector("#flame").onclick = function () {

            window.location.href = "sent.php?number=" + "<?php echo $_SESSION['email'] ?>";
        };
        }
    </script>
</body>

</html>