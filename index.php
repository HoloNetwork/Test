<?php

$headers = [
    "User-Agent: Example REST API Client",
    "Authorization: token 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"
];

$ch = curl_init("https://api.github.com/user/repos");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

//foreach ($data as $repository) {
//    echo $repository["full_name"], " ",
//         $repository["name"], " ",
//        $repository["description"], "<br>";
//}


// var_dump($var); similar to print funciton 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example REST API Client</title>
</head>
<body>

    <h1>Repositories</h1>

    <table>
        <thread>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thread>
        <tbody>

            <?php foreach ($data as $repository): ?>

                <tr>
                    <td><?= $repository["name"] ?></td>
                    <td><?= htmlspecialchars($repository["description"]) ?></td>
                </tr>
            
            <?php endforeach; ?> 

        </tbody>
    </table>
    
</body>
</html>
