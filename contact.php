<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="my_style.css"/>
    <title>Nous contacter</title>
</head>

<?php 
include_once('form.php'); 
?> 
<body> 
        <?php include('header.html') ?>  
    <div id="bloc_page">


        <?php  
        if( $mailSent === true )  
        {  
            ?>  
            <p>Votre message a bien été envoyé.</p>  
            <p>Adresse mail :<br /><?php echo( $from ); ?></p>  
            <p>Objet :<br /><?php echo( $object ); ?></p>  
            <p>Message :<br /><?php echo( htmlspecialchars( $message ) ) ; ?></p>
            <a href ="blog.php"> Acccueil </a>  
            <?php  
        }  
        else 
        {  
            if( count( $errors ) !== 0 )  
            {  

                foreach( $errors as $error )  
                {  
                    echo( "<li>$error</li>\n" );  
                }  
                echo( "</ul>\n" );  
            }
                    ?>   
                    <form method="post" action="<?php echo( $_SERVER['REQUEST_URI'] ); ?>">  

                        <label for="from"> Adresse mail *</label>  
                        <input type="text" name="from" value="<?php echo( $from ); ?>" id = "from" />  
                        
                        <label for="object"> Objet *</label>  
                        <input type="text" name="object"  value="<?php echo( $object ); ?>" id= "object" />  
                        
                        <label for="message"> Message *</label>  
                        <textarea name="message" id="message" rows="20" cols="50"><?php echo( $message ); ?></textarea>  

                        <p>* Champs obligatoires</p>

                        <input type="submit" name="send" value="Envoyer" />


                    </form>  
                    <?php  
                }  
                ?>
            </div>  
</body>  
</html>