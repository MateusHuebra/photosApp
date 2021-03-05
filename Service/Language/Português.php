<?php

namespace Service\Language;

class Português extends Methods {
    
    const STRINGS = [
        'acronym' => 'pt',
        'backupLanguage' => 'Español',
        'authentication' => [
            'usernameOrEmail' => 'Nome de usuário ou Email',
            'username' => 'Nome de usuário',
            'email' => 'Email',
            'password' => 'Senha',
            'login' => 'logar',
            'signup' => 'criar conta',
            'updateInfo' => 'atualizar dados',
            'changePassword' => 'mudar senha',
            'ifYouHaventAnAccount' => 'não tem uma conta',
            'ifYouHaveAnAccount' => 'já tem uma conta'
        ],
        'interface' => [
            'language' => 'Idioma',
            'appName' => 'photosApp',
            'home' => 'Pagina Inicial',
            'profile' => 'Perfil',
            'logout' => 'Deslogar',
            'about' => 'Sobre',
            'aboutThe' => 'Sobre o',
            'copyLink' => 'copiar link',
            'delete' => 'apagar',
            'deletePost' => 'apagar postagem',
            'addAComment' => 'Adicionar comentário',
            'post' => 'postagem',
            'posts' => 'postagens',
            'edit' => 'editar',
            'follower' => 'seguidor',
            'followers' => 'seguidores',
            'following' => 'seguindo',
            'follow' => 'seguir',
            'areYouSureYouWantToDeleteThisPost' => 'Você tem certeza de que deseja apagar essa postagem?',
            'areYouSureYouWantToLogout' => 'Você tem certeza de que quer deslogar?',
            'cancel' => 'cancelar',
            'close' => 'fechar',
            'yes' => 'sim',
            'selectPicture' => 'Selecionar imagem',
            'changePicture' => 'mudar imagem',
            'caption' => 'Legenda',
            'seeMore' => 'ver mais',
            'search' => 'buscar',
            'noPostsToShow' => 'Nenhuma postagem a ser mostrada',
            'searchForPeopleToFollow' => 'Busque por pessoas para seguir'
        ],
        'toasts' => [
            'infoUpdated' => 'dados atualizados',
            'invalidCredentials' => 'Credenciais inválidas',
            'usernameIsEmpty' => 'Nome de usuário vazio',
            'usernameIsTooLong' => 'Nome de usuário muito longo / max: 16 caracteres',
            'usernameCannotHaveSpecialCharacters' => 'Nome de usuário não pode ter caracteres especiais / apenas letras, números e underline',
            'usernameMustBeginsWithALetter' => 'Nome de usuário deve começar com uma letra',
            'isAReservedWord' => 'é uma palavra reservada',
            'usernameAlreadyTaken' => 'Nome de usuário já está sendo usado',
            'emailIsEmpty' => 'Email vazio',
            'emailIsTooLong' => 'Email muito longo / max: 128 caracteres',
            'itMustBeAnEmail' => 'Você deve usar um email',
            'emailAlreadyBeingUsed' => 'Email já está sendo usado',
            'passwordIsEmpty' => 'Senha vazia',
            'passwordIsTooLong' => 'Senha muito longa / max: 16 caracteres',
            'PasswordIsTooShort' => 'Senha muito curta / min: 4 caracteres',
            'yourCommentIsEmpty' => 'Seu comentário está vazio',
            'yourCommentIsTooLong' => 'Seu comentário é longo demais / max: 255 caracteres',
            'yourCommentCannotStartOrEndWithASpace' => 'Seu comentário não pode começar ou terminar com espaço',
            'profilePictureChanged' => 'Foto de perfil alterada!',
            'youShouldBeLoggedInToSeeThatPage' => 'Você deve estar logado para ver essa página',
            'noFileWasSent' => 'Nenhum arquivo foi enviado',
            'yourFileIsNotAPNGJPGorJPEG' => 'Seu arquivo não é um PNG, JPG ou JPEG',
            'yourFIleIsTooLarge' => 'Seu arquivo é grande demais',
            'yourImageIsNotASquare' => 'Sua imagem não é quadrada',
            'somethingGoneWrong' => 'Algo deu errado',
            'yourPictureWasPosted' => 'Sua imagem foi postada!',
            'copiedToTheClipboard' => 'copiado para a área de transferência',
            'yourPostHasBeenDeleted' => 'sua postagem foi apagada'
        ],
        'posts' => [
            'like' => 'curtida',
            'likes' => 'curtidas',
            'comment' => 'comentário',
            'comments' => 'comentários'
        ],
        'about' => [
            'introduction' => '<font class="color-black-bold">PhotosApp</font> é uma aplicação para web desenvolvida com o intuito na aprendizagem e prática na programação para web, com foco no modelo MVC (model - view - controller).',
            'developer' => 'Aplicação desenvolvida inteiramente por <a href="/MateusHuebra" class="color-black-bold">Mateus Huebra</a>. Me encontre no <a href="https://www.linkedin.com/in/mateushuebra/" class="color-black-bold">LinkedIn</a>.',
            'coding' => 'A aplicação foi construída com base em:</br>• PHP (backend)</br>• jQuery (frontend)</br>• MySQL (banco de dados)</br>• Materialize (framework CSS)',
            'github' => 'O código fonte está disponível no <a href="https://github.com/MateusHuebra/photosApp" class="color-black-bold">GitHub</a>.'
        ]
    ];

}