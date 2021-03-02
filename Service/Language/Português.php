<?php

namespace Service\Language;

class Português {
    
    const STRINGS = [
        'acronym' => 'pt',
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
            'home' => 'Pagina Inicial',
            'profile' => 'Perfil',
            'logout' => 'Deslogar',
            'copyLink' => 'copiar link',
            'delete' => 'apagar',
            'deletePost' => 'apagar postagem',
            'addAComment' => 'Adicionar comentário',
            'edit' => 'editar',
            'following' => 'seguindo',
            'follow' => 'seguir',
            'areYouSureYouWantToDeleteThisPost' => 'Você tem certeza de que deseja apagar essa postagem?',
            'areYouSureYouWantToLogout' => 'Você tem certeza de que quer deslogar?',
            'cancel' => 'cancelar',
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
        ]
    ];

    static function get(string $key) {
        $keys = explode('.', $key);
        $strings = self::STRINGS;
        foreach ($keys as $key) {
            $strings = $strings[$key];
        }
        return $strings;
    }

    static function getAll() {
        return self::STRINGS;
    }

}