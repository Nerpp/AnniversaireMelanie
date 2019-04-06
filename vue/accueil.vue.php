<html>

<head>
    <meta charset="UTF-8">
    <title>Lully La Mafia</title>
    <!-- admin mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- appel au style css -->
    <link rel="stylesheet" href="public/css/style.accueil.css" />
    <!-- bootstrapcdn -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <form>
        <div class="form-group" method="post" action="index.php">
            <input type="text" class="form-control" id="reponse" aria-describedby="reponse" placeholder="Ecris ta solution" name="tentativeReponse">
            <small id="reponseHelp" class="form-text text-muted">Je risque mes puces si tu te trompe</small>
            <span class="error"> <?php echo isset($routeur['valeurs']['EnigmeErr']) ? $routeur['valeurs']['EnigmeErr'] : null; ?></span>
        </div>
        <input type="submit" class="btn btn-primary" value='Es tu Sûre de ta réponse ?'>
        <input type="hidden" name="page" id="page" value="verificationReponse">
    </form>

</body>

</html>