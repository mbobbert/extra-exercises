<?php
var_dump($_POST);
if (count($_POST) > 0) {
    $first_name = filter_input(INPUT_POST,‘first-name’);
    $last_name = filter_input(INPUT_POST,‘last-name’);
    $address = filter_input(INPUT_POST,'address');
    $address2 = filter_input(INPUT_POST,'address-2');
    $dateofbirth = filter_input(INPUT_POST,'date-of-birth');
    $gender = filter_input(INPUT_POST,'gender');
    $email = filter_input(INPUT_POST,‘email’, FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST,‘phone’, FILTER_VALIDATE_INT);

    if ($first_name = "" || $last_name = "" || $address = "" | !$dateofbirth || $gender = "" || $email = "" || !$phone)
    {
       header('Location: ?success=no');
   } else {

       header('Location: ?success=yes');
   }
}

$success = filter_input(INPUT_GET, 'success');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
</head>

<body>

<?php if ($success =='no') echo '<p style="color: red">FAIL</p>'; ?>
<?php if ($success =='yes') echo '<p style="color: green">SUCCESS</p>'; ?>

    <form method="post">
        <label>First name
            <input type="text" name="first-name"/>
        </label>

        <label>Last name
            <input type="text" name="last-name"/>
        </label>

        <br/>

        <label>Address
            <input type="text" name="address"/>
        </label>

        <br/>

        <label>Address line 2
            <input type="text" name="address-2"/>
        </label>

        <br/>

        <label>Date of birth
            <input type="date" name="date-of-birth"/>
        </label>

        <br/>

        <label>Gender
            <input type="radio" name="gender" value="male" />
            <input type="radio" name="gender" value="female"/>
        </label>

        <br/>

        <label>Email
            <input type="text" name="email" />
        </label>

        <br/>

        <label>Phone
            <input type="text" name="phone" />
        </label>

        <br/>

        <input type="submit" value="submit"/>

    </form>
</body>
</html>


