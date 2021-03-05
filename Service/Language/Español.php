<?php

namespace Service\Language;

class Español extends Methods {
    
    const STRINGS = [
        'acronym' => 'es',
        'backupLanguage' => 'Português',
        'authentication' => [
            'usernameOrEmail' => 'Nombre de usuario o Email',
            'username' => 'Nombre de usuario',
            'email' => 'Email',
            'password' => 'Contraseña',
            'login' => 'entrar',
            'signup' => 'crear cuenta',
            'updateInfo' => 'actualizar datos',
            'changePassword' => 'cambiar contraseña',
            'ifYouHaventAnAccount' => 'no posee una cuenta',
            'ifYouHaveAnAccount' => 'ya posee una cuenta'
        ],
        'interface' => [
            'language' => 'Idioma',
            'appName' => 'photosApp',
            'home' => 'Pagina Inicial',
            'profile' => 'Perfil',
            'logout' => 'Salir',
            'about' => 'Acerca',
            'aboutThe' => 'Acerca el',
            'copyLink' => 'copiar link',
            'delete' => 'borrar',
            'deletePost' => 'borrar publicación',
            'addAComment' => 'agregar comentario',
            'post' => 'publicación',
            'posts' => 'publicaciones',
            'edit' => 'editar',
            'follower' => 'seguidor',
            'followers' => 'seguidores',
            'following' => 'seguiendo',
            'follow' => 'seguir',
            'areYouSureYouWantToDeleteThisPost' => 'Estás seguro que deseas borrar esa publicación?',
            'areYouSureYouWantToLogout' => 'Estás seguro que deseas salir?',
            'cancel' => 'cancelar',
            'close' => 'cerrar',
            'yes' => 'sí',
            'selectPicture' => 'Seleccionar imagen',
            'changePicture' => 'cambiar imagen',
            'caption' => 'Subtítulo',
            'seeMore' => 'ver mas',
            'search' => 'buscar',
            'noPostsToShow' => 'Ninguna publicación disponible',
            'searchForPeopleToFollow' => 'Busque por personas para seguir'
        ],
        'toasts' => [
            'infoUpdated' => 'datos actualizados',
            'invalidCredentials' => 'Credenciales inválidas',
            'usernameIsEmpty' => 'Nombre de usuario vacio',
            'usernameIsTooLong' => 'Nombre de usuario muy largo / max: 16 caracteres',
            'usernameCannotHaveSpecialCharacters' => 'Nombre de usuario no puede tener caracteres especiales / solamente letras, números y guion bajo',
            'usernameMustBeginsWithALetter' => 'Nombre de usuario debe empezar con una letra',
            'isAReservedWord' => 'es una palabra reservada',
            'usernameAlreadyTaken' => 'Nombre de usuario ya está siendo usado',
            'emailIsEmpty' => 'Email vacio',
            'emailIsTooLong' => 'Email muy largo / max: 128 caracteres',
            'itMustBeAnEmail' => 'Usted debe usar un email',
            'emailAlreadyBeingUsed' => 'Email ya está siendo usado',
            'passwordIsEmpty' => 'Contraseña vacia',
            'passwordIsTooLong' => 'Contraseña muy larga / max: 16 caracteres',
            'PasswordIsTooShort' => 'Contraseña muy corta / min: 4 caracteres',
            'yourCommentIsEmpty' => 'Su comentario está vacio',
            'yourCommentIsTooLong' => 'Su comentario es demasiado largo / max: 255 caracteres',
            'yourCommentCannotStartOrEndWithASpace' => 'Su comentario no puede comenzar o terminar comn espacio',
            'profilePictureChanged' => 'Foto de perfil cambiada!',
            'youShouldBeLoggedInToSeeThatPage' => 'Usted debe estar logueado para ver esa página',
            'noFileWasSent' => 'Ningun archivo fue enviado',
            'yourFileIsNotAPNGJPGorJPEG' => 'Su archivo no es un PNG, JPG o JPEG',
            'yourFIleIsTooLarge' => 'Su archivo es demasiado grande',
            'yourImageIsNotASquare' => 'Su imagen no es cuadrada',
            'somethingGoneWrong' => 'Algo salió mal',
            'yourPictureWasPosted' => 'Su imagen fue publicada!',
            'copiedToTheClipboard' => 'copiado al portapapeles',
            'yourPostHasBeenDeleted' => 'su publicación fue borrada'
        ],
        'posts' => [
            'like' => 'me gusta',
            'likes' => 'me gustas',
            'comment' => 'comentario',
            'comments' => 'comentarios'
        ]
    ];

}
