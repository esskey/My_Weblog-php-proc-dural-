<?php
include_once('pdo_connect.php');
  
    define( 'MAIL_TO', 'manel.benhamouda@epitech.eu');   
    define( 'MAIL_FROM', 'utilisateur@hotmail.fr' );   
    define( 'MAIL_OBJECT', 'objet du message' );  
    define( 'MAIL_MESSAGE', 'Veuillez saisir votre message' );   

    $mailSent = false; 
    $errors = array(); // tableau des erreurs de saisie  
      
    if( filter_has_var( INPUT_POST, 'send' ) ) 
    {  
        $from = filter_input( INPUT_POST, 'from', FILTER_VALIDATE_EMAIL ); //verification que c'est une adresse mail   
        if( $from === NULL ) // si le mail est vide  
        {  
            $errors[] = 'Veuillez renseigner une adresse mail.';  
        }  
        elseif( $from === false ) // si le mail n'est pas valide 
        {  
            $errors[] = 'L\'adresse mail n\'est pas valide.';  
        }  

        $object = filter_input( INPUT_POST, 'object'); 

        if( $object === NULL OR $object === false OR empty( $object ) OR $object === MAIL_OBJECT ) // si l'objet est vide
        {    
            $errors[] = 'Vous devez renseigner l\'objet.';  
        }  
 
        $message = filter_input( INPUT_POST, 'message' );  
        if( $message === NULL OR $message === false OR empty( $message ) OR $message === MAIL_MESSAGE ) // si le message est vide 
        {  
            $errors[] = 'Vous devez écrire un message.';  
        }  

        if( count( $errors ) === 0 ) // si le formulaire est bien rempli sans erreurs  
        {  
            if( mail( MAIL_TO, $object, $message, "From: $from\nReply-to: $from\n" ) ) // envoie du message 
            {  
                $mailSent = true;  
            }  
            else // échec de l'envoi  
            {  
                $errors[] = 'Votre message n\'a pas été envoyé.';  
            }  
        }  
    }  
    else 
    {  
        $from = MAIL_FROM;  
        $object = MAIL_OBJECT;  
        $message = MAIL_MESSAGE;  
    }  
?> 