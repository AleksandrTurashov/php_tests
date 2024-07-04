<?php

    if(isset($_GET['request']) && isset($_GET['status'])){
        $request = json_decode($_GET['request']);
        if($_GET['status'] === "error") $error = "warning";
        print_r($_GET['request']);
    }
    $grade = 10;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>форма</title>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-8">
                <?php if(!empty($_GET['status']) && $_GET['status'] === "error"):?>
                    <div class="alert alert-<?php echo $error; ?> alert-dismissible fade show" role="alert">
                        <strong>You should check in on some of those fields below.</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?php if(!empty($_GET['status']) && $_GET['status'] === "success"):?>
                    <div class="alert alert-<?php echo $_GET['status']; ?> alert-dismissible fade show" role="alert">
                        <strong>Data was added to the file</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
               
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="obr.php" method="post">
                    <?php if(!isset($_GET['request']) || isset($_GET['request']) && !empty($_GET['request']) && $request->email === "error" || isset($_GET['status']) && $_GET['status'] === "success"):?>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                        </div>
                    <?php endif?>
                    <?php if(!empty($_GET['request']) && $request->email !== "error"):?>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="<?php echo $request->email ?>">
                        </div>
                    <?php endif?>
                    <?php if(!isset($_GET['request']) || isset($_GET['request']) && !empty($_GET['request']) && $request->name === "error" || isset($_GET['status']) && $_GET['status'] === "success"):?>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">имя(не более 20 символов)</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="имя до 20 символов">
                        </div>
                    <?php endif?>
                    <?php if(!empty($_GET['request']) && $request->name !== "error"):?>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">имя(не более 20 символов)</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="имя до 20 символов" value="<?php echo $request->name ?>">
                        </div>
                    <?php endif?>

                    <p>Оцененка страницы</p>

                    <?php if(!isset($_GET['request']) || isset($_GET['request']) && !empty($_GET['request']) && $request->grade === "error" || isset($_GET['status']) && $_GET['status'] === "success"):?>
                        <?php for($i=1; $i <= $grade; $i++):?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="grade" id="inlineRadio1" value="<?php echo $i ?>">
                                <label class="form-check-label" for="inlineRadio1"><?php echo $i ?></label>
                            </div>
                        <?php endfor ?>
                    <?php endif?>

                    <?php if(!empty($_GET['request']) && $request->grade !== "error"):?>
                        <?php for($i=1; $i <= $grade; $i++):?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="grade" id="inlineRadio1" value="<?php echo $i ?>" <?php if($i == $request->grade) echo "checked" ?>>
                                <label class="form-check-label" for="inlineRadio1"><?php echo $i ?></label>
                            </div>
                        <?php endfor ?>
                    <?php endif?>

                    <?php if(!isset($_GET['request']) || isset($_GET['request']) && !empty($_GET['request']) && $request->comments === "error" || isset($_GET['status']) && $_GET['status'] === "success"):?>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" >Коментарий(не болеее 500символов)</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
                        </div>
                    <?php endif?>
                    <?php if(!empty($_GET['request']) && $request->comments !== "error"):?>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" >Коментарий(не болеее 500символов)</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"><?php echo $request->comments ?></textarea>
                        </div>
                    <?php endif?>

                    <button type="submit" class="btn btn-secondary">Отправить</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
