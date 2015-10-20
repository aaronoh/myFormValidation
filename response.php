<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        div.container {
            margin: auto;
            
        }
        
        div.row {
            display: block;
            margin-top: 10px;
        }
        
        div.label {
            display: inline-block;
            width: 160px;
            text-align: right;
            padding-right: 5px;
        }
        
        div.control {
            display: inline-block;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Thank you for submitting your data.</h3>
        </div>
        <div class="row">
            <div class="label">
                <label>Name</label>
            </div>
            <div class="control">
                <?php echo $formdata['name']; ?>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label>Password</label>
            </div>
            <div class="control">
                <?php echo $formdata['password']; ?>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label>Email</label>
            </div>
            <div class="control">
                <?php echo $formdata['email']; ?>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label>Date of birth</label>
            </div>
            <div class="control">
                <?php echo $formdata['dob']; ?>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label>Platform</label>
            </div>
        </div>
        <div class="control">
            <?php
                    if ($formdata['platform'] != NULL) {
						foreach ($formdata['platform'] as $platform) {//as
							echo $platform . ' ' ;
						}
					}
                    ?>
        </div>

        <div class="row">
            <div class="label">
                <label>Newsletter? </label>
            </div>
            <div class="control">
                <?php echo $formdata['newsletter']; ?>
            </div>
        </div>

        <div class="row">
            <div class="label">
                <label>Avatar: </label>
            </div>
            <div class="control">
                <?php echo $formdata['avatar']; ?>
            </div>
        </div>
    </div>


</body>

</html>